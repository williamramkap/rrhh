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
        <div class="col-lg-12">
            <a class="btn btn-primary" type="button" href="{{ asset('employee/create' ) }}"><i class="fa fa-check-circle"></i>&nbsp;Crear Empleado</a>
            <table id="employee-table" class="table table-striped table-bordered" style="width:100%">
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
                            <td> {{ $employee->last_name }} </td>
                            <td> {{ $employee->mothers_last_name }} </td>
                            <td> {{ $employee->first_name }} </td>
                            <td> {{ $employee->second_name }} </td>                            
                            <td> {{ $employee->employee_type->name }} </td>
                            <td> 
                                <a class="btn btn-primary" type="button" href="{{ asset('employee/'.$employee->id ) }}"><i class="fa fa-check-circle"></i>&nbsp;Ver</a>
                                <a class="btn btn-primary" type="button" href="{{ asset('employee/'.$employee->id.'/edit' ) }}"><i class="fa fa-check-circle"></i>&nbsp;Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script src="{{ asset('/js/datatables.js')}}"></script>
<script>
    var user_tables = $('#employee-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{!! route('employee_list') !!}",
    columns: [ 
    {"className":      'details-control',
    "orderable":      false,
    "searchable":      false,
    "data":           'button-roles',
    "name":            'button-roles',
    }, 
    { data: 'id', name: 'username', orderable: true },
    { data: 'identity_card', name: 'identity_card' },
    { data: 'last_name_name', name: 'last_name', },
    { data: 'mothers_last_name', name: 'mothers_last_name', },
    { data: 'first_name', name: 'first_name' },
    { data: 'second_name', name: 'second_name', },    
    { data: 'employee_type', name: 'employee_type' },    
    {data: 'action', name: 'action', orderable: false, searchable: false},
    {"className":      'details-control',
    "name":         'state',
    "orderable":      false,
    "searchable":      false,
    "data":           'state',
    "defaultContent": ''
    },]});

</script>
$endsection