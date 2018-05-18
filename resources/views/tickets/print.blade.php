<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,
        body {
            /* height: 1345px; */
            height: 1560px;
            /* background: #3b5998; */
            margin: 0;
            padding: 5px 0px;
            font-family: sans-serif;
        }
        .ticket{
            vertical-align: top;
            height: 33%;
            width: 100%;
            background: rgba(255,255,255,.4);
            margin: 0;padding: 0;
        }

        .main-left{
            vertical-align: top;
            height: 100%;
            width: 600px;
            /* background:red; */
            border-right: 2px dashed #3c3c3c;
            display: inline-block;
            margin-right: 5px;
            padding: 2px;
        }
        .main-right{
            vertical-align: top;
            height: 100%;
            margin:0;
            width: 355px;
            display: inline-block;
            /* background:green; */
        }

         table { width: 100%; }
         .table-striped tr:nth-child(even){background:#F1F5F8}

        .table-info{ border-radius:.75em; overflow: hidden; border-spacing: 0;}

        .table-info thead tr td:first-child { border-radius:1em
            0 0 0; border-left: 1px solid #5D6975; }

        .table-info thead tr td{ border-left: 1px solid #5D6975; border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975; }

        .table-info thead tr td:last-child { border-radius:0 0.75em 0 0 ; border-right: 1px solid
            #5D6975; }

        .table-info thead tr td:only-child { border-radius:0.75em 0.75em 0 0 ; }

        .table-info table thead tr td:last-child
            { border-left: none; }

            .table-info tbody tr td {
                 border-left: 1px solid #5D6975;
                  
                   
            padding: 1px 10px;
            }
        .courier{
            font-family: 'Courier New'}
        
        .border-bottom{border-bottom: 1px solid #5D6975;}
        .border-top{border-top: 1px solid #5D6975;}
        .table-info tbody tr:last-child td {
            border-bottom: 1px solid #5D6975;
            border-top: 1px solid #5D6975;
        }
        .table-info tbody tr td:last-child {
            border-right: 1px solid #5D6975;
        }
        .table-info tbody tr:last-child td:last-child {
            border-right: 1px solid #5D6975;
            border-bottom:1px solid #5D6975;
            }
        .table-info tbody tr:last-child td:first-child {
            border-radius: 0 0 0 0.75em;
            border-bottom:1px solid #5D6975;
             }
        .table-info tbody tr:last-child
        td:last-child { border-radius: 0 0 0.75em 0;
        border-bottom:1px solid #5D6975; }
        .table-info tbody tr:last-child td:only-child {border-bottom:1px solid #5D6975;
            border-radius: 0 0 1em 1em;
        } 
        /* .table-code{ border-radius: .75em; border-spacing: 0;  } .table-code tbody tr:first-child td:last-child{ border-top-right-radius: .75em; border-top:
        1px solid #5D6975; border-right: 1px solid #5D6975; } .table-code tbody tr td:last-child{ border-right: 1px solid #5D6975;
        } .table-code tbody tr td:only-child{ border-right: 1px solid #5D6975; border-left: 1px solid #5D6975; } .table-code tbody
        tr:first-child td:first-child{ border-top-left-radius: .75em; } .table-code tbody tr:last-child td:first-child{ border-bottom-left-radius:
        .75em; } .table-code tbody tr td:first-child{ border-bottom:1px solid #fff; } .table-code tbody tr:last-child td:first-child{
        border-bottom:none; } .table-code tbody tr td:last-child{ border-bottom:1px solid #5D6975; } .table-code tbody tr:last-child
        td:last-child{ border-bottom-right-radius: .75em; border-right: 1px solid #5D6975; } .table-code tbody tr:last-child td:only-child{
        border-bottom-right-radius: .75em; border-bottom-left-radius: .75em; border-right: 1px solid #5D6975; border-left: 1px solid
        #5D6975; border-bottom: 1px solid #5D6975; }  */
        .table-collapse{ border-collapse: collapse; } .border-grey-darker{ border-color:
        #5D6975; border-style: solid; border-width: 1px; } .border{ border-color: #5D6975; border-style: solid; border-width: 1px;
        } .border-b{ border-bottom: 1px solid #fff; } .border-b{ border-color: #22292f; border-style: solid; border-bottom-width:
        1px, } .border-t{ border-color: #22292f; border-style: solid; border-top-width: 1px, } .border-r{ border-color: #22292f;
        border-style: solid; border-right-width: 1px, } .border-l{ border-color: #22292f; border-style: solid; border-left-width:
        1px; } .inline{ display: inline; } .inline-block{ display: inline-block; } .block{ display: block; } .table{ display: table;
        } .table-row{ display: table-row; } 
        .text-left{
            text-align: left;
            }
         .text-center {text-align: center;} .text-right {text-align:
        right;} .text-justify {text-align: justify;} .w-10{ width: 10%; } .w-15{ width: 15%; } .w-20{ width: 20%; } .w-25{ width:
        25%; } .w-30{ width: 30%; } .w-33{ width: 33%; } .w-35{ width: 35%; } .w-38{ width: 38%; } .w-39{ width: 39.5%; } .w-40{
        width: 40%; } .w-45{ width: 45%; } .w-50{ width: 50%; } .w-60{ width: 60%; } .w-75{ width: 75%; } .w-100{ width: 100%; }
        .mw-100{ max-width: 100%; } .p-10{ padding: 10px; } .p-5{ padding: 5px; } .py-4 { padding-top: 4px; padding-bottom: 4px;
        } .py-3 { padding-top: 3px; padding-bottom: 3px; } .py-2 { padding-top: 2px; padding-bottom: 2px; } .px-15 { padding-left:
        15px; padding-right: 15px; } .px-10 { padding-left: 10px; padding-right: 10px; } .px-5 { padding-left: 5px; padding-right:
        5px; } .px-4 { padding-left: 4px; padding-right: 4px; } .px-3 { padding-left: 3px; padding-right: 3px; } .px-2 { padding-left:
        2px; padding-right: 2px; } .mx-10{ margin-top: 10px; margin-bottom: 10px; } .mx-5{ margin-top: 5px; margin-bottom: 5px; }
        .m-b-5{ margin-bottom: 5px; }
        .m-b-6{
            margin-bottom: 10px;
        }
        .m-b-10{ margin-bottom: 10px; } 
        .m-b-15{ margin-bottom: 15px; }
        .m-b-20{ margin-bottom: 20px; }
        .m-b-25{ margin-bottom: 25px; }
        .m-b-50{ margin-bottom: 50px; }
        .m-t-5{ margin-top: 5px; }
        .m-t-10{ margin-top: 10px; }
        .m-t-15{ margin-top: 15px; }
        .m-t-20{ margin-top: 20px; }
        .m-t-25{ margin-top: 25px; }
        .m-t-30{ margin-top: 30px; }
        .m-t-35{ margin-top: 35px; }
        .m-t-50{ margin-top: 50px; }
        .m-l-5{ margin-left: 5px; }
        .m-l-10{ margin-left: 10px; }
        .m-l-15{ margin-left: 15px; }
        .m-l-20{ margin-left: 20px; }
        .m-l-25{ margin-left: 25px; }
        .m-l-30{ margin-left: 30px; }
        .m-l-35{ margin-left: 35px; }
        .m-l-50{ margin-left: 50px; }
        
        .m-r-5{ margin-right: 5px; }
        .m-r-10{ margin-right: 10px; }
        .m-r-15{ margin-right: 15px; }
        .m-r-20{ margin-right: 20px; }
        .m-r-25{ margin-right: 25px; }
        .m-r-30{ margin-right: 30px; }
        .m-r-35{ margin-right: 35px; }
        .m-r-50{ margin-right: 50px; }

        .pin-t{top: 0;} .pin-r{right: 0;} .pin-b{bottom: 0;} .pin-l{left: 0;} .pin-y{
        top: 0; bottom: 0; } .pin-x{ right: 0; left: 0; } .pin{ top: 0; right: 0; bottom: 0; left: 0; } .pin-none{ top: auto; right:
        auto; bottom: auto; left: auto; } .bg-grey-darker{background-color: #5D6975;} .bg-grey-lightest {background-color: #dae1e7;}
        .font-hairline { font-weight: 100; } .font-thin { font-weight: 200; } .font-light { font-weight: 300; } .font-normal { font-weight:
        400; } .font-medium { font-weight: 500; } .font-semibold { font-weight: 600; } .font-bold { font-weight: 700; } .font-extrabold
        { font-weight: 800; } .font-black { font-weight: 900; } .uppercase { text-transform: uppercase; } .lowercase { text-transform:
        lowercase; } .capitalize { text-transform: capitalize; } .normal-case { text-transform: none; } .underline { text-decoration:
        underline; } .line-through { text-decoration: line-through; } .no-underline { text-decoration: none; } .text-black{color:
        #22292f;} .text-white{color: #ffffff;}
        .text-xxxs {font-size: 8px;}
        .text-xxs {font-size: 10px;}
        .text-xs {font-size: 12px;}
        .text-sm {font-size: 14px;}
        .text-smm {font-size: 15px;}
        .text-base {font-size: 16px;}
        .text-lg {font-size: 18px;}
        .text-xl {font-size: 20px;}
        .text-2xl{font-size: 24px;}
        .text-3xl {font-size: 30px;}
        .text-4xl {font-size: 36px;}
        .text-5xl {font-size: 3rem;}
        .rounded { border-top-left-radius:
        .7rem; border-top-right-radius: .7rem; border-bottom-right-radius: .7rem; border-bottom-left-radius: .7rem; } .rounded-t
        { border-top-left-radius: .7rem; border-top-right-radius: .7rem; } .rounded-tl{ border-top-left-radius: .7rem; } .rounded-tr{
        border-top-right-radius: .7rem; }
        .leading-none {
             line-height: 1;
        }

        .leading-tight {line-height: 1.25;}
        .leading-normal {line-height: 1.5;}
        .leading-loose {line-height: 2; border: 0px;padding-top:10px}

         .list-roman{ list-style-type:upper-roman; } .align-baseline{
        vertical-align: baseline;} .align-top{ vertical-align: top;} .align-middle{ vertical-align: middle;} .align-bottom{ vertical-align:
        bottom;} .align-text-top{ vertical-align: text-top;} .align-text-bottom{ vertical-align: text-bottom;}
        .float-left{
            float: left;
        }
        .float-right{
            float: right;
        }
        .absolute{
            position: absolute;
        }


        .table-ticket-1 {
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 10px;
        }
        .table-ticket-1 tr, .table-ticket-1 tr td{
            margin:0;padding: 0
        } 
    </style>

</head>

<body>

    @foreach ($payrolls as $payroll)
        
    

    <div class="m-b-10 ticket">
        <div class="main-left">
            <table>
                <tr>
                    <th class="w-20 text-left no-padding no-margins align-top">
                        <div class="text-center">
                            <img src="{{ asset('images/logo.jpg') }}" class="w-100">
                        </div>
                    </th>
                    <th class="w-50 align-top leading-none text-uppercase text-xs align-middle">
                                    {{ $institution ?? 'MUTUAL DE SERVICIOS AL POLICÍA "MUSERPOL"' }} <br>
                                    {{ $direction ?? 'DIRECCIÓN DE BENEFICIOS ECONÓMICOS' }} <br>

                    </th>
                    <th class="w-20 no-padding no-margins align-top">
                        {{-- <table class="table-code no-padding no-margins">
                            <tbody>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Nº de Trámite</td>
                                    <td class="text-bold ">{!! $number ?? 'ERROR' !!}</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Fecha de Emisión</td>
                                    <td class="">{!! $date ?? 'dsfsd' !!}</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Usuario</td>
                                    <td class="">{!! $username ?? 'nuddf' !!}</td>
                                </tr>
                            </tbody>
                        </table> --}}
                    </th>
                </tr>
            </table>
            {{-- /header --}}
            {{-- personal-info --}}
            <table class="table-dticket-1">
                <tr>
                    <td>
                        <span class="text-xxs">Año/mes: </span>
                    </td>
                    <td>
                        <span class="uppercase courier text-xs"> {{ $procedure->year }}/{{ $procedure->month->name }} </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs">Nro Días Trab.: </span>
                    </td>
                    <td>
                        <span class="uppercase courier text-xs">{{ $payroll->worked_days }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="text-xxs">Concepto de Pago: </span>
                    </td>
                    <td colspan="2">
                        <span class="uppercase courier text-xs">PAGO DE HABERES {{ $procedure->month->shortened}} {{ $procedure->year }}</span>
                    </td>
                </tr>
                <tr>
                    <td  class="no-border">
                        <span class="text-xxs">Carnet de Identidad: </span>
                    </td>
                    <td class="w-25">
                        <span class="uppercase courier text-xs">{{ $payroll->ci_ext }}</span>
                    </td>
                    <td  class="no-border" colspan="2">
                        <span class="text-xxs">Nombre: </span>
                    </td>
                    <td colspan="2">
                    <span class="uppercase courier text-xs">{{ $payroll->full_name }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="no-border text-xxs">
                        A.F.P.:
                    </td>
                    <td class="no-border uppercase courier text-xs">
                        {{ $payroll->management_entity }}
                    </td>
                    <td colspan="4" class="no-border text-xxs">
                        <div class="float-left">
                            <span class="m-r-10">N.U.A.:</span>
                            <span class="uppercase courier text-xs">
                                {{-- {{ $payroll->nua }} --}}
                                8465181568
                            </span>
                        </div>
                        <div class="float-right m-r-10">
                            <span class="m-r-10">Nro. de Item:</span>
                            <span class="uppercase courier text-xs">
                                8465181568
                                {{-- {{ $payroll->nua }} --}}
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            {{-- /personal-info --}}

            {{-- amounts --}}
            <table class="table-info">
                <thead>
                    <tr class="text-xs text-center">
                        <td colspan="2">
                            INGRESOS
                        </td>
                        <td colspan="3">
                            DESCUENTOS
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-xs text-center border-bottom">
                        <td class="border-bottom">Detalle</td>
                        <td class="border-bottom">Importe Bs.</td>
                        <td class="border-bottom">Acreedor</td>
                        <td class="border-bottom">Importe Bs.</td>
                    </tr>
                    <tr class="courier">
                        <td class="text-left">SUELDOS</td>
                        <td class="text-right">{{ $payroll->quotable }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    {{-- discounts --}}
                    
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        {{-- <td class="text-left">Renta vejez 10%</td> --}}
                        <td class="text-left">AFP.RV.10%</td>
                        <td class="text-right"> {{ $payroll->discount_old }} </td>
                    </tr>
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        <td class="text-left">AFP..RC.1,71%</td>
                        <td class="text-right"> {{ $payroll->discount_common_risk }} </td>
                    </tr>
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        <td class="text-left">AFP.CM.0,5%</td>
                        <td class="text-right"> {{ $payroll->discount_commission }} </td>
                    </tr>
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        <td class="text-left">AFP.SOL.ASE.0,5%</td>
                        <td class="text-right"> {{ $payroll->discount_solidary }} </td>
                    </tr>
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        <td class="text-left">AFP.APS.1%, 5%, 10%</td>
                        <td class="text-right"> {{ $payroll->discount_national }} </td>
                    </tr>
                    <tr class="courier">
                        <td></td>
                        <td></td>
                        <td class="text-left">Atrasos</td>
                        <td class="text-right"> {{ $payroll->discount_faults }} </td>
                    </tr>
                    {{-- /discounts --}}
                    <tr>
                        <td class="text-xs text-left border-top">
                            Total Ingresos:
                        </td>
                        <td class="text-right courier border-top">{{ $payroll->quotable }}</td>
                        <td class="text-xs text-left border-top">
                            Total Descuentos:
                        </td>
                        <td class="text-right courier border-top">{{ $payroll->total_discounts}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-sm text-left courier">
                            Liquido Pagable:
                        </td>
                        <td class="text-lg text-right courier" colspan="3">
                            {{ $payroll->payable_liquid }}
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- /amounts --}}


        </div>
        <div class="main-right">
            <table>
                <tr>
                    <th class="w-20 text-left no-padding no-margins align-middle">
                        <div class="text-center">
                            <img src="{{ asset('images/logo.jpg') }}" class="w-100">
                        </div>
                    </th>
                    <th class="w-50 align-top leading-none text-uppercase text-xs align-middle">
                        {{ $institution ?? 'MUTUAL DE SERVICIOS AL POLICÍA "MUSERPOL"' }} <br> {{ $direction ?? 'DIRECCIÓN DE BENEFICIOS ECONÓMICOS'
                        }} <br>
                    </th>
                </tr>
            </table>
        </div>
    </div>
    <hr>
    @endforeach
    {{-- <div class="m-b-10 ticket" >
        <div class="main-left">
            <table>

                <tr>
                    <th class="w-20 text-left no-padding no-margins align-middle">
                        <div class="text-center">
                            <img src="{{ asset('images/logo.jpg') }}" class="w-100">
                        </div>
                    </th>
                    <th class="w-50 align-top">
                        <span class="font-semibold uppercase leading-tight text-xs">
                            {{ $institution ?? 'MUTUAL DE SERVICIOS AL POLICÍA "MUSERPOL"' }} <br>
                            {{ $direction ?? 'DIRECCIÓN DE BENEFICIOS ECONÓMICOS' }} <br>
                            {{ $unit ?? 'UNIDAD DE OTORGACIÓN DE FONDO DE RETIRO POLICIAL, CUOTA MORTUORIA Y AUXILIO MORTUORIO' }}
                        </span>
                    </th>
                    <th class="w-20 no-padding no-margins align-top">
                        <table class="table-code no-padding no-margins">
                            <tbody>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Nº de Trámite</td>
                                    <td class="text-bold ">{!! $number ?? 'ERROR' !!}</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Fecha de Emisión</td>
                                    <td class="">{!! $date ?? 'dsfsd' !!}</td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-grey-darker text-white">Usuario</td>
                                    <td class="">{!! $username ?? 'nuddf' !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </th>
                </tr>
            </table>

        </div>
        <div class="main-right">
            <table>
                <tr>
                    <th class="w-20 text-left no-padding no-margins align-middle">
                        <div class="text-center">
                            <img src="{{ asset('images/logo.jpg') }}" class="w-100">
                        </div>
                    </th>
                    <th class="w-50 align-top">
                        <span class="font-semibold uppercase leading-tight text-xs">
                            {{ $institution ?? 'MUTUAL DE SERVICIOS AL POLICÍA "MUSERPOL"' }} <br>
                            {{ $direction ?? 'DIRECCIÓN DE BENEFICIOS ECONÓMICOS' }} <br>
                            {{ $unit ?? 'UNIDAD DE OTORGACIÓN DE FONDO DE RETIRO POLICIAL, CUOTA MORTUORIA Y AUXILIO MORTUORIO' }}
                        </span>
                    </th>
                </tr>
            </table>
        </div>
    </div> --}}

</body>

</html>