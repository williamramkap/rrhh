@extends('layouts.app') 
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        {{-- Breadcrumbs::render('payroll_edit', $year, $month) --}}
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center m-t-lg">
                <form action="/report" method="POST">
                    {{ csrf_field() }}
                    <select id="type" name="type">
                        <option value="1">Reporte Laboral</option>
                        <option value="2">Reporte Patronal</option>
                        <option value="3">Reporte Tributaria</option>
                        <option value="4">Reporte Laboral Previsi&oacute;n</option>
                        <option value="5">Reporte Laboral Futuro</option>
                        <option value="6">Reporte Patronal Previsi&oacute;;n</option>
                        <option value="7">Reporte Patronal Futuro</option>
                        <option value="8">Trib>8000</option>
                    </select>
                    <select id="month" name="month">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septimbre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <input id="year" name="year" type="number" placeholder="A&ntilde;o"><sinput>
                            <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Generar reporte</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection