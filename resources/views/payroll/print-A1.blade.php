<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Planilla de Haberes</title>

        <style>
            table {
                border-collapse: collapse;
                table-layout: fixed;
                /* width: 100%; */
                clear: both;
            }

            table, th, td {
                border: 1px solid black;
                text-align: center;
            }

            .total {
                font-weight: bold;
            }

            .header-left {
                float: left;
            }

            .header-right {
                float: right;
            }

            .header-center {
                padding-top: 1%;
                margin-bottom: 1%;
                text-align: center;
                align-content: center;
                float: center;
                clear: both;
            }

            #header-image {
                float: left;
                clear: both;
                margin-top: -35% !important;
                margin-left: 15%;
                width: 20em;
                height: 6em;
            }

            body {
                font-size: 0.5em;
                font-family: sans-serif;
            }

            td {
                height: 5.5em;
                display: table-cell;
            }

            th {
                word-wrap: break-word;
                background-color: lightgray;
            }

            .footer {
                border-left: 1px solid white;
                border-right: 1px solid white;
                border-bottom: 1px solid white;
            }

            h1, h2, h3 {
                text-transform: uppercase;
            }

            p, h1, h2, h3 {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
                margin: 0 !important;
            }

            .name {
                text-align: left;
                padding-left: 0.5%;
            }

            /* Fix snappy header */
            thead { display: table-header-group }
            tfoot { display: table-row-group }
            tr { page-break-inside: avoid }
        </style>

    </head>

    <body>
        <div class="header-left">
            <p>MUTUAL DE SERVICIOS AL POLICIA</p>
            <p>NIT {{ $title->nit }}</p>
            <p>{{ $title->address }}</p>
        </div>

        <div class="header-right">
            <span>No. Patronal CNS: {{ $title->employer_number }}</span>
            <span style="padding-left:10em;">&nbsp;</span>
            <span>{{ $title->type }}</span>
        </div>

        <div class="header-center">
            <h2>PLANILLA DE LA HABERES</h2>
            <h3>PERSONAL EVENTUAL - MES {{ $title->month }} DE {{ $title->year }}</h3>
            <h3>(EXPRESADO EN BOLIVIANOS)</h3>
        </div>

        <div class="header-left">
            <img src="{{ $title->logo }}" id="header-image">
        </div>

        <table align="center">
            <thead>
                <tr>
                    <th colspan="15" style="border-left: 1px solid white; border-top: 1px solid white; background-color: white;"></th>
                    <th colspan="6">DESCUENTOS DEL SISTEMA DE PENSIONES</th>
                    <th colspan="5" style="border-right: 1px solid white; border-top: 1px solid white; background-color: white;"></th>
                </tr>
                <tr>
                    <th width="1%">N°</th>
                    <th width="2%">C.I.</th>
                    <th width="10%">TRABAJADOR</th>
                    <th width="1%">CUENTA BANCO UNIÓN</th>
                    <th width="1%">FECHA NACIMIENTO</th>
                    <th width="1%">SEXO</th>
                    <th width="1%">CARGO</th>
                    <th width="3%">PUESTO</th>
                    <th width="3%">AREA</th>
                    <th width="1%">FECHA DE INGRESO</th>
                    <th width="1%">FECHA VENCIMIENTO CONTRATO</th>
                    <th width="1%">DIAS TRABAJADOS</th>
                    <th width="2%">HABER BÁSICO</th>
                    <th width="2%">TOTAL GANADO</th>
                    <th width="1%">AFP</th>
                    <th width="1%">Renta vejez {{ $procedure->discount_old }}%</th>
                    <th width="1%">Riesgo común {{ $procedure->discount_common_risk }}%</th>
                    <th width="1%">Comisión {{ $procedure->discount_commission }}%</th>
                    <th width="1%">Aporte solidario del asegurado {{ $procedure->discount_solidary }}%</th>
                    <th width="1%">Aporte Nacional solidario 1%, 5%, 10%</th>
                    <th width="3%">TOTAL DESCUENTOS DE LEY</th>
                    <th width="3%">SUELDO NETO</th>
                    <th width="3%">RC IVA {{ $procedure->discount_rc_iva }}%</th>
                    <th width="3%">Desc Atrasos, Faltas y Licencia S/G Haberes</th>
                    <th width="3%">TOTAL DESCUENTOS</th>
                    <th width="3%">LIQUIDO PAGABLE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $i => $employee)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $employee->ci_ext }}</td>
                    <td class="name">{{ $employee->full_name }}</td>
                    <td>{{ $employee->account_number }}</td>
                    <td>{{ $employee->birth_date }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->charge }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->position_group }}</td>
                    <td>{{ $employee->date_start }}</td>
                    <td>{{ $employee->date_end }}</td>
                    <td>{{ $employee->worked_days }}</td>
                    <td>{{ $employee->base_wage }}</td>
                    <td>{{ $employee->quotable }}</td>
                    <td>{{ $employee->management_entity }}</td>
                    <td>{{ $employee->discount_old }}</td>
                    <td>{{ $employee->discount_common_risk }}</td>
                    <td>{{ $employee->discount_commission }}</td>
                    <td>{{ $employee->discount_solidary }}</td>
                    <td>{{ $employee->discount_national }}</td>
                    <td>{{ $employee->total_amount_discount_law }}</td>
                    <td>{{ $employee->net_salary }}</td>
                    <td>{{ $employee->discount_rc_iva }}</td>
                    <td>{{ $employee->total_amount_discount_institution }}</td>
                    <td>{{ $employee->total_discounts }}</td>
                    <td>{{ $employee->payable_liquid }}</td>
                </tr>
            @endforeach
                <tr class="total">
                    <td class="footer" colspan="12">TOTAL PLANILLA</td>
                    <td class="footer">{{ $totals->base_wage }}</td>
                    <td class="footer">{{ $totals->quotable }}</td>
                    <td class="footer"></td>
                    <td class="footer">{{ $totals->discount_old }}</td>
                    <td class="footer">{{ $totals->discount_common_risk }}</td>
                    <td class="footer">{{ $totals->discount_commission }}</td>
                    <td class="footer">{{ $totals->discount_solidary }}</td>
                    <td class="footer">{{ $totals->discount_national }}</td>
                    <td class="footer">{{ $totals->total_amount_discount_law }}</td>
                    <td class="footer">{{ $totals->net_salary }}</td>
                    <td class="footer">{{ $totals->discount_rc_iva }}</td>
                    <td class="footer">{{ $totals->total_amount_discount_institution }}</td>
                    <td class="footer">{{ $totals->total_discounts }}</td>
                    <td class="footer">{{ $totals->payable_liquid }}</td>
                </tr>
            </tbody>
        </table>
    </body>

</html>