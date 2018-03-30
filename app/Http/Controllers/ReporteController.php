<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Inspeccion;
use App\Notificacion;
use App\Formacion;

class ReporteController extends Controller
{
    public function consultar()
    {
        $anios = [];
        $anioActual = date('Y');
        for($i = -3; $i< 4; $i++){
            $anios[$anioActual + $i] = $anioActual + $i;
        }
        $anios = array('' => "Seleccione") + $anios;
        return view('reportes.consultar', compact('anios'));
    }

    public function resultados(Request $request)
    {
        $anio = $request['anio'];
        $modulo = $request['modulo'];
        $fechaInicio = $request['anio']."-01-01";
        $fechaFin = $request['anio']."-12-31";
        switch ($modulo) {
            case ("Cursos"):{
                $datos = Curso::whereBetween('fecha', [$fechaInicio, $fechaFin])->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inspecciones Principal"):{
                $datos = Inspeccion::whereBetween('fecha', [$fechaInicio, $fechaFin])->where("sede", "Principal")->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inspecciones CADETEC"):{
                $datos = Inspeccion::whereBetween('fecha', [$fechaInicio, $fechaFin])->where("sede", "CADETEC")->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inspecciones Anexo I"):{
                $datos = Inspeccion::whereBetween('fecha', [$fechaInicio, $fechaFin])->where("sede", "Anexo I")->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inspecciones Juncal"):{
                $datos = Inspeccion::whereBetween('fecha', [$fechaInicio, $fechaFin])->where("sede", "Juncal")->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inspecciones Condor"):{
                $datos = Inspeccion::whereBetween('fecha', [$fechaInicio, $fechaFin])->where("sede", "Condor")->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Inducciones"):{
                $datos = Notificacion::whereBetween('fecha', [$fechaInicio, $fechaFin])->orderBy('fecha','ASC')->get();
                break;
            }
            case ("Formación CSSL"):{
                $datos = Formacion::whereBetween('fecha', [$fechaInicio, $fechaFin])->orderBy('fecha','ASC')->get();
                break;
            }
        }
        //$atletas = \DB::select("SELECT afiliados.cedula, afiliados.nombre, afiliados.apellido FROM afiliados");
        $pdf = \PDF::loadView('reportes.reporte', compact('anio', 'modulo', 'datos'));
        return $pdf->stream('gestionSiaho'.$request['anio'].'.pdf');
    }

    public function resultadosAtm(Request $request)
    {
        $anio       = $request['anioAtm'];
        $total = [];
        $total[0] = 0;
        $totalGeneral = 0;

        for($i = 1; $i <= 12; $i++){
            $total[$i] = 0;
            $datos1 = Curso::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos2 = Inspeccion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos3 = Inspeccion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos4 = Inspeccion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos5 = Inspeccion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos6 = Inspeccion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos7 = Notificacion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos8 = Formacion::whereMonth('fecha', '=', $i)->whereYear('fecha', '=', $anio)->orderBy('fecha','ASC')->count();
            $datos = $datos1 + $datos2 + $datos3 + $datos4 + $datos5 + $datos6 + $datos7 + $datos8;
            $total[$i] = $datos;
            $totalGeneral = $totalGeneral +$datos;

        }

        $pdf = \PDF::loadView('reportes.reporteAtm', compact('anio', 'total', 'totalGeneral'))->setPaper('letter', 'landscape');;
        return $pdf->stream('gestionSiaho'.$request['anioAtm'].'.pdf');
    }
}
