<?php

namespace App\Http\Controllers;

use App\Politica;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\PoliticasRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class PoliticasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politicas = \DB::select('SELECT politicas.id, politicas.fecha, politicas.trabajador, trabajadores.cedula, trabajadores.nombre, trabajadores.apellido,  (SELECT TIMESTAMPDIFF(YEAR,politicas.fecha,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,politicas.fecha,CURDATE())) - (TIMESTAMPDIFF(YEAR,politicas.fecha,CURDATE()) * 12)) AS meses FROM politicas INNER JOIN trabajadores ON trabajadores.id= politicas.trabajador');

        $contadorAdvertencias = 0;

        foreach($politicas as $politica){
            if($politica->meses >= 6 || $politica->anios > 0)
                $contadorAdvertencias++;
        }

        return view('politicas.index', compact('politicas', 'contadorAdvertencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('politicas.new', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoliticasRequest $request)
    {
        if($request->ajax()){
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'trabajador' 	=> $request['trabajador']
            ];
            Politica::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function show(Politica $politica)
    {
        return view('politicas.show', ['politica' => $politica]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function edit(Politica $politica)
    {
        $trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('politicas.edit', ['politica' => $politica, 'trabajadores' => $trabajadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function update(PoliticasRequest $request, Politica $politica)
    {
        if($request->ajax())
        {
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'trabajador' 	=> $request['trabajador']
            ];
            $politica->fill($campos);
            $politica->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Politica  $politica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Politica $politica)
    {
        if (is_null ($politica))
            \App::abort(404);
        $nombreCompleto = $politica->nombreTrabajador->nombre.' '.$politica->nombreTrabajador->apellido;
        $id = $politica->id;
        $politica->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Política dada a"' . $nombreCompleto .'" eliminada satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Política dada a"'. $nombreCompleto .'" eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('politicas.index');
        }
    }
}
