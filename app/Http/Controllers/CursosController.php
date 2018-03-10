<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Trabajador;
use Illuminate\Http\Request;
use App\Http\Requests\CursosRequest;
use Session;
use App;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Input;
use Redirect;
use Response;

class CursosController extends Controller
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
        $cursos = Curso::All();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('cursos.new', compact('trabajadores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursosRequest $request)
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
            Curso::create($campos);
            return response()->json([
                'validations' => true
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view('cursos.show', ['curso' => $curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $trabajadores = array('' => "Seleccione") + Trabajador::orderBy('id','ASC')->get()->pluck('cedula_nombre', 'id')->toArray();
        return view('cursos.edit', ['curso' => $curso, 'trabajadores' => $trabajadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(CursosRequest $request, Curso $curso)
    {
        if($request->ajax())
        {
            $separarFecha   = explode('/', $request['fecha']);
            $fechaSql       = $separarFecha[2].'-'.$separarFecha[1].'-'.$separarFecha[0];
            $campos = [
                'fecha'         => $fechaSql, 
                'nombre' 		=> $request['nombre'], 
                'horas'      	=> $request['horas'],
                'trabajador' 	=> $request['trabajador']
            ];
            $curso->fill($campos);
            $curso->save();
            return response()->json([
                'validations'       => true,
                'nuevoContenido'    => $campos           
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        if (is_null ($curso))
            \App::abort(404);
        $nombreCompleto = $curso->nombre;
        $id = $curso->id;
        $curso->delete();
        if (\Request::ajax()) {
            return Response::json(array (
                'success' => true,
                'msg'     => 'Curso "' . $nombreCompleto .'" eliminado satisfactoriamente',
                'id'      => $id
            ));
        } else {
            $mensaje = 'Curso "'. $nombreCompleto .'" eliminado satisfactoriamente';
            Session::flash('message', $mensaje);
            return Redirect::route('cursos.index');
        }
    }

    public function horasTotales($id){
        $datos = Curso::where('trabajador', $id)->get();
        $total = 0;
        foreach ($datos as $dato) {
            $total  = $total + $dato->horas;
        }
        return $total;
    }

    public function horasTotalesMensual($id, $mes, $anio){
        $datos = \DB::select('SELECT * FROM cursos WHERE trabajador = '.$id.' AND MONTH(fecha) = '.$mes.' AND YEAR (fecha) = '.$anio.'');
        $total = 0;
        foreach ($datos as $dato) {
            $total  = $total + $dato->horas;
        }
        return $total;
    }

    public function horasTrimestres($id, $mes, $anio){
        switch ($mes) {
            case ($mes >= 1 && $mes <= 3):{
                $datos = \DB::select('SELECT * FROM cursos WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-01-01" AND "'.$anio.'-03-31")');
                break;
            }
            case ($mes >= 4 && $mes <= 6):{
                $datos = \DB::select('SELECT * FROM cursos WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-04-01" AND "'.$anio.'-06-30")');
                break;
            }
            case ($mes >= 7 && $mes <= 9):{
                $datos = \DB::select('SELECT * FROM cursos WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-07-01" AND "'.$anio.'-09-30")');
                break;
            }
            case ($mes >= 10 && $mes <= 12):{
                $datos = \DB::select('SELECT * FROM cursos WHERE trabajador = '.$id.' AND (fecha BETWEEN "'.$anio.'-10-01" AND "'.$anio.'-12-31")');
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
