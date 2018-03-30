<?php

namespace App\Http\Controllers;

use App\Formacion;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\FormacionesRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class FormacionesController extends Controller
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
        $formaciones = Formacion::All();
        return view('formaciones.index', compact('formaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('formaciones.new', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormacionesRequest $request)
    {
        if($request->ajax()){
            $separarFecha   = explode('/', $request['fecha']);
            $fechaSql       = $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha'         => $fechaSql, 
                'nombre' 		=> $request['nombre'], 
                'horas'      	=> $request['horas'],
                'trabajador' 	=> $request['trabajador']
            ];
            Formacion::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formacion  $formacion
     * @return \Illuminate\Http\Response
     */
    public function show(Formacion $formacion, $id)
    {
        $formacion = Formacion::find($id);
        return view('formaciones.show', ['formacion' => $formacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formacion  $formacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Formacion $formacion, $id)
    {
        $formacion = Formacion::find($id);
        $trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('formaciones.edit', ['formacion' => $formacion, 'trabajadores' => $trabajadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formacion  $formacion
     * @return \Illuminate\Http\Response
     */
    public function update(FormacionesRequest $request, Formacion $formacion, $id)
    {
        if($request->ajax())
        {
            $formacion = Formacion::find($id);
            $separarFecha   = explode('/', $request['fecha']);
            $fechaSql       = $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha'         => $fechaSql, 
                'nombre' 		=> $request['nombre'], 
                'horas'      	=> $request['horas'],
                'trabajador' 	=> $request['trabajador']
            ];
            $formacion->fill($campos);
            $formacion->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formacion  $formacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formacion $formacion, $id)
    {
        $formacion = Formacion::find($id);
        if (is_null ($formacion))
            \App::abort(404);
        $nombreCompleto = $formacion->nombre;
        $id = $formacion->id;
        $formacion->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Formación "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Formación "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('formaciones.index');
        }
    }

    public function horasTotales($id){
        $datos = Formacion::where('trabajador', $id)->get();
        $total = 0;
        foreach ($datos as $dato) {
            $total  = $total + $dato->horas;
        }
        return $total;
    }

    public function horasTotalesMensual($id, $mes, $anio){
        $datos = \DB::select('SELECT * FROM formaciones WHERE trabajador = '.$id.' AND MONTH(fecha) = '.$mes.' AND YEAR (fecha) = '.$anio.'');
        $total = 0;
        foreach ($datos as $dato) {
            $total  = $total + $dato->horas;
        }
        return $total;
    }

    public function horasTrimestres($id, $mes, $anio){
        switch ($mes) {
            case ($mes >= 1 && $mes <= 3):{
                $datos = \DB::select('SELECT * FROM formaciones WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-01-01" AND "'.$anio.'-03-31")');
                break;
            }
            case ($mes >= 4 && $mes <= 6):{
                $datos = \DB::select('SELECT * FROM formaciones WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-04-01" AND "'.$anio.'-06-30")');
                break;
            }
            case ($mes >= 7 && $mes <= 9):{
                $datos = \DB::select('SELECT * FROM formaciones WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-07-01" AND "'.$anio.'-09-30")');
                break;
            }
            case ($mes >= 10 && $mes <= 12):{
                $datos = \DB::select('SELECT * FROM formaciones WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-10-01" AND "'.$anio.'-12-31")');
                break;
            }
        }
        $total = 0;
        foreach ($datos as $dato) {
            $total  = $total + $dato->horas;
        }
        return $total;
    }
}
