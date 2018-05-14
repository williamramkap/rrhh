@extends('layouts.app') 
@section('title','Crear empleado') 
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        ruta
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>CI</th>
                        <th>Name</th>
                        <th>Segundo Nombre</th>
                        <th>Apellido</th>
                        <th>Materno</th>
                        <th>Tipo</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td> {{ $employee->id }} </td>
                            <td> {{ $employee->identity_card }} </td>
                            <td> {{ $employee->first_name }} </td>
                            <td> {{ $employee->second_name }} </td>
                            <td> {{ $employee->last_name }} </td>
                            <td> {{ $employee->mothers_last_name }} </td>
                            <td> {{ $employee->employee_type_id }} </td>
                            <td> 
                                <a class="btn btn-primary" type="button" href="{{ asset('employee/'.$employee->id ) }}"><i class="fa fa-check-circle"></i>&nbsp;Ver</a>
                                <a class="btn btn-primary" type="button" href="{{ asset('employee/'.$employee->id.'/edit' ) }}"><i class="fa fa-check-circle"></i>&nbsp;Editar</a>
                            </td>
                        </tr>
                    @endforeach
                
            </table>
        </div>
    </div>
</div>


@endsection