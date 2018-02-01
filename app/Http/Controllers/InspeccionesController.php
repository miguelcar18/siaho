<?php

namespace App\Http\Controllers;

use App\Inspeccion;
use Illuminate\Http\Request;
use App\Http\Requests\InspeccionesRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class InspeccionesController extends Controller
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
        $inspecciones = Inspeccion::All();
        return view('inspecciones.index', compact('inspecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inspecciones.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InspeccionesRequest $request)
    {
        if($request->ajax()){
        	$separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 	=> $r$fechaSql, 
                'tipo' 		=> $request['tipo'],
                'realizado' => $request['realizado']
            ];
            Inspeccion::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function show(Inspeccion $inspeccion, $id)
    {
        $inspeccion = Inspeccion::find($id);
        return view('inspecciones.show', ['inspeccion' => $inspeccion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspeccion $inspeccion, $id)
    {
        $inspeccion = Inspeccion::find($id);
        return view('inspecciones.edit', ['inspeccion' => $inspeccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function update(InspeccionesRequest $request, Inspeccion $inspeccion, $id)
    {
        $inspeccion = Inspeccion::find($id);
        if($request->ajax())
        {
            $separarFecha 	= explode('/', $request['fecha']);
            $fechaSql 		= $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha' 	=> $r$fechaSql, 
                'tipo' 		=> $request['tipo'],
                'realizado' => $request['realizado']
            ];
            $inspeccion->fill($campos);
            $inspeccion->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inspeccion  $inspeccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspeccion $inspeccion, $id)
    {
        $inspeccion = Inspeccion::find($id);
        if (is_null ($inspeccion))
            \App::abort(404);
        $nombreCompleto = $inspeccion->nombre.' '.$inspeccion->apellido;
        $id = $inspeccion->id;
        $inspeccion->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Inspección "' . $nombreCompleto .'" eliminada satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Inspección "'. $nombreCompleto .'" eliminada satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('inspecciones.index');
        }
    }
}
