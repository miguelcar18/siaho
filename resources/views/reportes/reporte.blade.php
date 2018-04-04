<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Gestión HSI - {{ $anio }}</title>
        <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
        <style>
            @page { margin: 180px 50px; }
            #header {
                position: fixed; 
                left: 0px; 
                top: -180px; 
                right: 0px; 
                height: 150px; 
                text-align: center;
            }
            #footer {
                position: fixed; 
                left: 0px; 
                bottom: -180px; 
                right: 0px; 
                height: 150px; 
            }
            #footer .page:after {
                content: counter(page, upper-roman);
            }
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body marginwidth="0" marginheight="0">
        <div id="header">
            <div style="float:left;">
                <table name="tabla" id="tabla" cellpadding="6" cellspacing="0">
                    <tr>
                        <td>
                            <img src="{{ asset('assets/images/logo.png') }}" width="100px" height="auto" style="margin: 0.5em;">
                        </td>
                        <td>
                            <p>
                                <b>SERVCIO SALUD Y SEGURIDAD<br>INDICADORES DE GESTION EN SALUD</b>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div style="padding-top: 65px; text-align:center">
                <h3><b><u>{{ strtoupper($modulo) }}</u></b></h3>
                <p style="padding-top: -10px;"><b>(Año: {{ $anio }})</b></p>
            </div>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        @if($modulo == "Cursos" || $modulo == "Formación CSSL" || $modulo == "Inducciones")
        <table cellpadding="0" cellspacing="0" id="cabecera" border="1" width="100%" style="padding-top: 10px;">
            <thead>
                <tr style="text-transform: uppercase">
                    <th colspan="4" align="center"><b>Plan</b></th>
                    <th colspan="12" align="center"><b>Mes de realización</b></th>
                </tr>
                <tr style="text-transform: uppercase">
                    <th style="background-color:#fdcd3a;" align="center"><b>Participante</b></th>
                    <th style="background-color:#fdcd3a;" align="center"><b>Cédula</b></th>
                    <th style="background-color:#fdcd3a;" align="center"><b>Instrucción</b></th>
                    <th style="background-color:#fdcd3a;" align="center"><b>Horas</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>E</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>F</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>M</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>A</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>M</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>J</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>J</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>A</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>S</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>O</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>N</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>D</b></th>
                </tr>
            </thead>
            <tbody style="padding-top: 100px">
                @php ($totalEnero = $totalFebrero = $totalMarzo = $totalAbril = $totalMayo = $totalJunio = $totalJulio = $totalAgosto = $totalSeptiembre = $totalOctubre = $totalNoviembre = $totalDiciembre = $totalHoras = 0)
                @foreach($datos as $dato)
                @php ($totalHoras = $totalHoras + $dato->horas)
                <tr>
                    <td>{{ $dato->nombreTrabajador->nombre.' '.$dato->nombreTrabajador->apellido }}</td>
                    <td>{{ number_format($dato->nombreTrabajador->cedula, 0, '', '.') }}</td>
                    <td>{{ $dato->nombre }}</td>
                    <td align="right">{{ $dato->horas }}</td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 1)
                        @php ($totalEnero++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 2)
                        @php ($totalFebrero++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 3)
                        @php ($totalMarzo++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 4)
                        @php ($totalAbril++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 5)
                        @php ($totalMayo++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 6)
                        @php ($totalJunio++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 7)
                        @php ($totalJulio++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 8)
                        @php ($totalAgosto++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 9)
                        @php ($totalSeptiembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 10)
                        @php ($totalOctubre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 11)
                        @php ($totalNoviembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 12)
                        @php ($totalDiciembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="4" align="right" style="background-color:#fdcd3a;"><b>TOTAL NUMERO DE CURSOS POR MES</b></td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalEnero }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalFebrero }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalMarzo }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalAbril }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalMayo }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalJunio }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalJulio }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalAgosto }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalSeptiembre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalOctubre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalNoviembre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalDiciembre }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right" style="background-color:#fdcd3a;"><b>TOTAL HORAS / HOMBRE INDUCCION</b></td>
                        <td align="center" colspan="12">{{ $totalHoras }}</td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        @elseif($modulo == "Inspecciones Principal" || $modulo == "Inspecciones CADETEC" || $modulo == "Inspecciones Anexo I" || $modulo == "Inspecciones Juncal")
        <table cellpadding="1" cellspacing="0" id="cabecera" border="1" width="100%" style="padding-top: 10px;">
            <thead>
                <tr style="text-transform: uppercase">
                    <th colspan="2" align="center"><b>Registro de inspecciones</b></th>
                    <th colspan="12" align="center"><b>Mes de realización</b></th>
                </tr>
                <tr style="text-transform: uppercase">
                    <th style="background-color:#fdcd3a;" align="center"><b>Inspección</b></th>
                    <th style="background-color:#fdcd3a;" align="center"><b>Lugar</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>E</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>F</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>M</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>A</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>M</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>J</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>J</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>A</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>S</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>O</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>N</b></th>
                    <th style="background-color:#ccccfd;" align="center"><b>D</b></th>
                </tr>
            </thead>
            <tbody style="padding-top: 100px">
                @php ($totalEnero = $totalFebrero = $totalMarzo = $totalAbril = $totalMayo = $totalJunio = $totalJulio = $totalAgosto = $totalSeptiembre = $totalOctubre = $totalNoviembre = $totalDiciembre = $totalHoras = 0)
                @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato->tipo }}</td>
                    <td>{{ $dato->lugar }}</td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 1)
                        @php ($totalEnero++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 2)
                        @php ($totalFebrero++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 3)
                        @php ($totalMarzo++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 4)
                        @php ($totalAbril++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 5)
                        @php ($totalMayo++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 6)
                        @php ($totalJunio++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 7)
                        @php ($totalJulio++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 8)
                        @php ($totalAgosto++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 9)
                        @php ($totalSeptiembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 10)
                        @php ($totalOctubre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 11)
                        @php ($totalNoviembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                    <td align="center">
                        @if(date_format(date_create($dato->fecha), 'm') == 12)
                        @php ($totalDiciembre++)
                        1
                        @else
                        0
                        @endif
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="2" align="right" style="background-color:#fdcd3a;"><b>NUMERO DE INSPECCIONES POR MES</b></td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalEnero }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalFebrero }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalMarzo }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalAbril }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalMayo }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalJunio }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalJulio }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalAgosto }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalSeptiembre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalOctubre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalNoviembre }}</td>
                        <td align="center" style="background-color: #cbfcfe">{{ $totalDiciembre }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" style="background-color:#fdcd3a;"><b>TOTAL HORAS / HOMBRE INDUCCION</b></td>
                        <td align="center" colspan="12">
                            @php ($totalInspecciones = $totalEnero + $totalFebrero + $totalMarzo + $totalAbril + $totalMayo + $totalJunio + $totalJulio + $totalAgosto + $totalSeptiembre + $totalOctubre + $totalNoviembre + $totalDiciembre)
                            {{ $totalInspecciones }}
                        </td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        @endif
    </body>
</html>