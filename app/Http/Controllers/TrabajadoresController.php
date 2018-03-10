<?php

namespace App\Http\Controllers;

use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\TrabajadorRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class TrabajadoresController extends Controller
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
        $trabajadores = Trabajador::All();
        return view('trabajadores.index', compact('trabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadores.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajadorRequest $request)
    {
        if($request->ajax()){
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'cargo' 		=> $request['cargo'], 
                'departamento'  => $request['departamento']
            ];
            Trabajador::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trabajador  $Trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador, $id)
    {
        $trabajador = Trabajador::find($id);
        return view('trabajadores.show', ['trabajador' => $trabajador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trabajador  $Trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador, $id)
    {
        $trabajador = Trabajador::find($id);
        return view('trabajadores.edit', ['trabajador' => $trabajador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trabajador  $Trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajadorRequest $request, Trabajador $trabajador, $id)
    {
        $trabajador = Trabajador::find($id);
        if($request->ajax())
        {
            $campos = [
                'nombre'        => $request['nombre'], 
                'apellido'      => $request['apellido'],
                'cedula' 		=> $request['cedula'], 
                'cargo' 		=> $request['cargo'], 
                'departamento'  => $request['departamento']
            ];
            $trabajador->fill($campos);
            $trabajador->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trabajador  $Trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajador, $id)
    {
        $trabajador = Trabajador::find($id);
        if (is_null ($trabajador))
            \App::abort(404);
        $nombreCompleto = $trabajador->nombre.' '.$trabajador->apellido;
        $id = $trabajador->id;
        $trabajador->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Trabajador "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Trabajador "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('trabajadores.index');
        }
    }
}
