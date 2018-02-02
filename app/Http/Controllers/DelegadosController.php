<?php

namespace App\Http\Controllers;

use App\Delegado;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\DelegadosRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class DelegadosController extends Controller
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
        $delegados = \DB::select('SELECT delegados.id, delegados.fecha, delegados.tipo, delegados.trabajador, trabajadores.cedula, trabajadores.nombre, trabajadores.apellido,  (SELECT TIMESTAMPDIFF(YEAR,delegados.fecha,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,delegados.fecha,CURDATE())) - (TIMESTAMPDIFF(YEAR,delegados.fecha,CURDATE()) * 12)) AS meses FROM delegados INNER JOIN trabajadores ON trabajadores.id= delegados.trabajador');
        return view('delegados.index', compact('delegados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('delegados.new', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DelegadosRequest $request)
    {
        if($request->ajax()){
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'tipo'      	=> $request['tipo'],
                'trabajador' 	=> $request['trabajador']
            ];
            Delegado::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delegado  $delegado
     * @return \Illuminate\Http\Response
     */
    public function show(Delegado $delegado)
    {
        return view('delegados.show', ['delegado' => $delegado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delegado  $delegado
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegado $delegado)
    {
        $trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('delegados.edit', ['delegado' => $delegado, 'trabajadores' => $trabajadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delegado  $delegado
     * @return \Illuminate\Http\Response
     */
    public function update(DelegadosRequest $request, Delegado $delegado)
    {
        if($request->ajax())
        {
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'tipo'      	=> $request['tipo'],
                'trabajador' 	=> $request['trabajador']
            ];
            $delegado->fill($campos);
            $delegado->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delegado  $delegado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegado $delegado)
    {
        if (is_null ($delegado))
            \App::abort(404);
        $nombreCompleto = $delegado->nombreTrabajador->nombre.' '.$delegado->nombreTrabajador->apellido;
        $id = $delegado->id;
        $delegado->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Delegado "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Delegado "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('delegados.index');
        }
    }
}
