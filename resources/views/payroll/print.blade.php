<?php
  use \App\Helpers\Util;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title->name }} {{ $title->year }}</title>
        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}"></link> -->
        <style>
            <?php include public_path('css/all.css') ?>
        </style>
    </head>

    <body>
        <div class="header-left">
            <p>{{ $company->name }}</p>
            <p>NIT {{ $company->tax_id_number }}</p>
            <p>{{ $company->address }}</p>
        </div>

        <div class="header-right">
            <span>No. Patronal CNS: {{ $company->employer_number }}</span>
            <span style="padding-left: 5em;"></span>
            <span>{{ implode('-', str_split($title->type)) }}</span>
        </div>

        <div class="header-center">
            <h2>{{ $title->name }}</h2>
            <h3>PERSONAL EVENTUAL - MES {{ $title->month }} DE {{ $title->year }}</h3>
            <h3>(EXPRESADO EN BOLIVIANOS)</h3>
        </div>

        <div class="header-left">
            <img src="{{ $title->logo }}" id="header-image">
        </div>

        <table align="center">
            <thead>
                <tr>
                @switch ($title->type)
                    @case ('A1')
                        @php ($table_header_space1 = 15)
                        @php ($table_header_space2 = 6)
                        @break
                    @case ('A2')
                        @php ($table_header_space1 = 8)
                        @php ($table_header_space2 = 5)
                        @break
                @endswitch
                @if ($title->name == 'PLANILLA DE HABERES')
                    @php ($discount_name = 'DESCUENTOS DEL SISTEMA DE PENSIONES')
                @elseif ($title->name == 'PLANILLA PATRONAL')
                    @php ($discount_name = 'APORTES PATRONALES')
                @endif
                    <th colspan="{{ $table_header_space1 }}" style="border-left: 1px solid white; border-top: 1px solid white; background-color: white;"></th>
                    <th colspan="{{ $table_header_space2 }}">{{ $discount_name }}</th>
                </tr>
                <tr>
                    <th width="1%">N°</th>
                    <th width="2%">C.I.</th>
                    <th width="10%">TRABAJADOR</th>
                @if ($title->type == 'A1')
                    <th width="1%">CUENTA BANCO UNIÓN</th>
                @endif
                @if ($title->type == 'A1')
                    <th width="1%">FECHA NACIMIENTO</th>
                @endif
                @if ($title->type == 'A1')
                    <th width="1%">SEXO</th>
                @endif
                @if ($title->type == 'A1')
                    <th width="1%">CARGO</th>
                @endif
                    <th width="3%">PUESTO</th>
                @if ($title->type == 'A1')
                    <th width="3%">AREA</th>
                @endif
                    <th width="1%">FECHA DE INGRESO</th>
                @if ($title->type == 'A1')
                    <th width="1%">FECHA VENCIMIENTO CONTRATO</th>
                @endif
                    <th width="1%">DIAS TRABAJADOS</th>
                @if ($title->type == 'A1')
                    <th width="2%">HABER BÁSICO</th>
                @endif
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
                @if ($title->type == 'A1')
                    <td>{{ $employee->account_number }}</td>
                @endif
                @if ($title->type == 'A1')
                    <td>{{ $employee->birth_date }}</td>
                @endif
                @if ($title->type == 'A1')
                    <td>{{ $employee->gender }}</td>
                @endif
                @if ($title->type == 'A1')
                    <td>{{ $employee->charge }}</td>
                @endif
                    <td>{{ $employee->position }}</td>
                @if ($title->type == 'A1')
                    <td>{{ $employee->position_group }}</td>
                @endif
                    <td>{{ $employee->date_start }}</td>
                @if ($title->type == 'A1')
                    <td>{{ $employee->date_end }}</td>
                @endif
                    <td>{{ $employee->worked_days }}</td>
                @if ($title->type == 'A1')
                    <td>{{ Util::format_number($employee->base_wage) }}</td>
                @endif
                    <td>{{ Util::format_number($employee->quotable) }}</td>
                    <td>{{ $employee->management_entity }}</td>
                    <td>{{ Util::format_number($employee->discount_old) }}</td>
                    <td>{{ Util::format_number($employee->discount_common_risk) }}</td>
                    <td>{{ Util::format_number($employee->discount_commission) }}</td>
                    <td>{{ Util::format_number($employee->discount_solidary) }}</td>
                    <td>{{ Util::format_number($employee->discount_national) }}</td>
                    <td>{{ Util::format_number($employee->total_amount_discount_law) }}</td>
                    <td>{{ Util::format_number($employee->net_salary) }}</td>
                    <td>{{ Util::format_number($employee->discount_rc_iva) }}</td>
                    <td>{{ Util::format_number($employee->total_amount_discount_institution) }}</td>
                    <td>{{ Util::format_number($employee->total_discounts) }}</td>
                    <td>{{ Util::format_number($employee->payable_liquid) }}</td>
                </tr>
            @endforeach
                <tr class="total">
                @switch ($title->type)
                    @case ('A1')
                        @php ($table_footer_space1 = 12)
                        @break
                    @case ('A2')
                        @php ($table_footer_space1 = 5)
                        @break
                @endswitch
                    <td class="footer" colspan="{{ $table_footer_space1 }}">TOTAL PLANILLA</td>
                    <td class="footer">{{ Util::format_number($totals->base_wage) }}</td>
                    <td class="footer">{{ Util::format_number($totals->quotable) }}</td>
                    <td class="footer"></td>
                    <td class="footer">{{ Util::format_number($totals->discount_old) }}</td>
                    <td class="footer">{{ Util::format_number($totals->discount_common_risk) }}</td>
                    <td class="footer">{{ Util::format_number($totals->discount_commission) }}</td>
                    <td class="footer">{{ Util::format_number($totals->discount_solidary) }}</td>
                    <td class="footer">{{ Util::format_number($totals->discount_national) }}</td>
                    <td class="footer">{{ Util::format_number($totals->total_amount_discount_law) }}</td>
                    <td class="footer">{{ Util::format_number($totals->net_salary) }}</td>
                    <td class="footer">{{ Util::format_number($totals->discount_rc_iva) }}</td>
                    <td class="footer">{{ Util::format_number($totals->total_amount_discount_institution) }}</td>
                    <td class="footer">{{ Util::format_number($totals->total_discounts) }}</td>
                    <td class="footer">{{ Util::format_number($totals->payable_liquid) }}</td>
                </tr>
            </tbody>
        </table>
    </body>

</html>