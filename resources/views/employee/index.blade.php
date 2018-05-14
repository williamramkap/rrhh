@extends('layouts.app') 
@section('title','Crear empleado') 
@section('content')

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
                        <th>CI</th>
                        <th>Name</th>
                        <th>Segundo Nombre</th>
                        <th>Apellido</th>
                        <th>Materno</th>
                        <th>Tipo</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                
            </table>
        </div>
    </div>
</div>


@endsection