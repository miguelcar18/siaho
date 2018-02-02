<?php

namespace App\Http\Controllers;

use App\Notificacion;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\NotificacionesRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class NotificacionesController extends Controller
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
        $notificaciones = Notificacion::All();
        return view('notificaciones.index', compact('notificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('notificaciones.new', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificacionesRequest $request)
    {
        if($request->ajax()){
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'lugar'      	=> $request['lugar'],
                'trabajador' 	=> $request['trabajador']
            ];
            Notificacion::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Notificacion $notificacion, $id)
    {
        $notificacion = Notificacion::find($id);
        return view('notificaciones.show', ['notificacion' => $notificacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Notificacion $notificacion, $id)
    {
        $notificacion = Notificacion::find($id);
        $trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('notificaciones.edit', ['notificacion' => $notificacion, 'trabajadores' => $trabajadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function update(NotificacionesRequest $request, Notificacion $notificacion, $id)
    {
        $notificacion = Notificacion::find($id);
        if($request->ajax())
        {
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 		=> $fechaSql, 
                'lugar'      	=> $request['lugar'],
                'trabajador' 	=> $request['trabajador']
            ];
            $notificacion->fill($campos);
            $notificacion->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notificacion $notificacion, $id)
    {
        $notificacion = Notificacion::find($id);
        if (is_null ($notificacion))
            \App::abort(404);
        $nombreCompleto = $notificacion->lugar;
        $id = $notificacion->id;
        $notificacion->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Notificación en "' . $nombreCompleto .'" eliminada satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Notificación en "'. $nombreCompleto .'" eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('notificaciones.index');
        }
    }
}
