<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Monitoreo y Vigilancia Epidemiologica de la Salud de los Trabajadores y Trabajadoras - {{ $anio }}</title>
        <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
        <link rel="stylesheet" href="{{ asset('assets/css/pdf.css') }}">
        <style>
            @page { margin: 180px 15px; }
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
                        <td align="center">
                            <p>
                                <b>MONITOREO Y VIGILANCIA EPIDEMIOLOGICA DE LA SALUD DE LOS TRABAJADORES Y TRABAJADORAS</b>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            <div style="padding-top: 65px; text-align:center">
                <h3><b><u>(Año: {{ $anio }})</u></b></h3>
            </div>
        </div>
        <div id="footer">
            <div class="page-number"></div>
        </div>
        <table cellpadding="0" cellspacing="0" id="cabecera" border="1" width="100%" style="padding-top: 10px; font-size: 12.5px">
            <thead>
                <tr style="text-transform: uppercase">
                    <th style="background-color:#fdcd3a; font-weight: bold;" align="center"><b>Indicacor</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Ene</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Feb</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Mar</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>1. Trim</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Abr</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>May</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Jun</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>2. Trim</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Jul</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Ago</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Sep</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>3. Trim</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Oct</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Nov</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>Dic</b></th>
                    <th style="background-color:#ccccfd; font-weight: bold;" align="center"><b>4. Trim</b></th>
                    <th style="background-color:#fdcd3a; font-weight: bold;" align="center"><b>Acumulado</b></th>
                </tr>
            </thead>
            <tbody style="padding-top: 100px">
                <tr>
                    <td>#. IDENTIF RIESGOS POR PUESTOS TRAB</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                </tr>
                <tr>
                    <td># NOTIFICACIÓN RIESGOS PUESTOS TRAB</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td align="center">0</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">0</td>
                    <td align="center">0</td>
                </tr>
                <tr>
                    <td>TAREAS DE SEGURIDAD LABORAL</td>
                    <td align="center">{{ $total['1'] }}</td>
                    <td align="center">{{ $total['2'] }}</td>
                    <td align="center">{{ $total['3'] }}</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">{{ $total['1'] + $total['2'] + $total['3'] }}</td>
                    <td align="center">{{ $total['4'] }}</td>
                    <td align="center">{{ $total['5'] }}</td>
                    <td align="center">{{ $total['6'] }}</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">{{ $total['4'] + $total['5'] + $total['6'] }}</td>
                    <td align="center">{{ $total['7'] }}</td>
                    <td align="center">{{ $total['8'] }}</td>
                    <td align="center">{{ $total['9'] }}</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">{{ $total['7'] + $total['8'] + $total['9'] }}</td>
                    <td align="center">{{ $total['10'] }}</td>
                    <td align="center">{{ $total['11'] }}</td>
                    <td align="center">{{ $total['12'] }}</td>
                    <td style="background-color:#ccccfd; font-weight: bold;" align="center">{{ $total['10'] + $total['11'] + $total['12'] }}</td>
                    <td align="center">{{ $totalGeneral }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>