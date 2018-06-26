<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Planilla de Haberes</title>

        <style>
            table {
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th {
                background-color: lightgray;
            }
        </style>

    </head>

    <body>
        <h1>PLANILLA DE LA MUSERPOL</h1>

        <table>
            <thead>
                <th>C.I.</th>
                <th>TRABAJADOR</th>
                <th>CUENTA BANCO UNIÓN</th>
                <th>FECHA NACIMIENTO</th>
                <th>SEXO</th>
                <th>CARGO</th>
                <th>PUESTO</th>
                <th>AREA</th>
                <th>FECHA DE INGRESO</th>
                <th>FECHA VENCIMIENTO CONTRATO</th>
                <th>DIAS TRABAJADOS</th>
                <th>HABER BÁSICO</th>
                <th>TOTAL GANADO</th>
                <th>AFP</th>
                <th>Renta vejez {{ $procedure->discount_old }}%</th>
                <th>Riesgo común {{ $procedure->discount_common_risk }}%</th>
                <th>Comisión {{ $procedure->discount_commission }}%</th>
                <th>Aporte solidario del asegurado {{ $procedure->discount_solidary }}%</th>
                <th>Aporte Nacional solidario 1%, 5%, 10%</th>
                <th>TOTAL DESCUENTOS DE LEY</th>
                <th>SUELDO NETO</th>
                <th>RC IVA {{ $procedure->discount_rc_iva }}%</th>
                <th>Desc Atrasos, Faltas y Licencia S/G Haberes</th>
                <th>TOTAL DESCUENTOS</th>
                <th>LIQUIDO PAGABLE</th>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->ci_ext }}</td>
                    <td>{{ $employee->full_name }}</td>
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
                <tr>
                    <td colspan="10">TOTAL</td>
                    <td>{{ $totals->base_wage }}</td>
                    <td>{{ $totals->quotable }}</td>
                    <td></td>
                    <td>{{ $totals->discount_old }}</td>
                    <td>{{ $totals->discount_common_risk }}</td>
                    <td>{{ $totals->discount_commission }}</td>
                    <td>{{ $totals->discount_solidary }}</td>
                    <td>{{ $totals->discount_national }}</td>
                    <td>{{ $totals->total_amount_discount_law }}</td>
                    <td>{{ $totals->net_salary }}</td>
                    <td>{{ $totals->discount_rc_iva }}</td>
                    <td>{{ $totals->total_amount_discount_institution }}</td>
                    <td>{{ $totals->total_discounts }}</td>
                    <td>{{ $totals->payable_liquid }}</td>
                </tr>
            </tbody>
        </table>
    </body>

</html>