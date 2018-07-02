@extends('layouts.app') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        {{ Breadcrumbs::render('payroll_index') }} 
    </div>
    <div class="col-lg-3" align="right">
        ssss
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        @foreach ($procedures as $procedure)
        <div class="col-lg-3">
            <div class="contact-box center-version">
                <a href="#">
                        {{-- <img alt="image" class="img-circle" src="img/a2.jpg"> --}}
                        <h2 class="m-b-xs"><strong>{{ $procedure->month->name }}</strong></h2>
                        <div class="font-bold"><h3>{{ $procedure->year }}</h3></div>
                    </a>
                <div class="contact-box-footer">
                    <div class="m-t-xs btn-group">
                        <a class="btn btn-md btn-primary" href="{{ route('create_payroll', [$procedure->year, $procedure->month->name])}}" data-toggle="tooltip" data-placement="top" title="Registrar datos de la Planilla"><i class="fa fa-plus"></i> Registrar </a>
                        <a class="btn btn-md btn-primary" href="{{ route('edit_payroll', [$procedure->year, $procedure->month->name])}}" data-toggle="tooltip" data-placement="top" title="Editar datos de la Planilla"><i class="fa fa-pencil"></i> Editar</a>
                        <a class="btn btn-md btn-primary" href="{{ route('report_excel', [$procedure->year, $procedure->month->name])}}" data-toggle="tooltip" data-placement="top" title="Seleccionar Excel"><i class="fa fa-file-excel-o"></i></a>
                        <button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="Imprimir Boletas" onclick="printJS({printable:'{!! route('print_ticket', [$procedure->year, $procedure->month->name]) !!}', type:'pdf', showModal:true, modalMessage: 'Generando documento por favor espere un momento.'})" ><i class="fa fa-print"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection