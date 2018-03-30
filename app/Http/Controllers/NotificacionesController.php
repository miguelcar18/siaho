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

        $notificaciones = \DB::select('SELECT notificaciones.id, notificaciones.fecha, notificaciones.lugar, notificaciones.trabajador, trabajadores.cedula, trabajadores.nombre, trabajadores.apellido,  (SELECT TIMESTAMPDIFF(YEAR,notificaciones.fecha,CURDATE()))  AS anios, (SELECT (TIMESTAMPDIFF(MONTH,notificaciones.fecha,CURDATE())) - (TIMESTAMPDIFF(YEAR,notificaciones.fecha,CURDATE()) * 12)) AS meses FROM notificaciones INNER JOIN trabajadores ON trabajadores.id= notificaciones.trabajador');

        $contadorAdvertencias = 0;

        foreach($notificaciones as $notificacion){
            if($notificacion->meses >= 6 || $notificacion->anios > 0)
                $contadorAdvertencias++;
        }


        return view('notificaciones.index', compact('notificaciones', 'contadorAdvertencias'));
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
                'nombre'        => $request['nombre'],
                'horas'         => $request['horas'],
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
                'nombre'        => $request['nombre'],
                'horas'         => $request['horas'],
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
                'msg'     => 'Inducción en "' . $nombreCompleto .'" eliminada satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Inducción en "'. $nombreCompleto .'" eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('notificaciones.index');
        }
    }
}
