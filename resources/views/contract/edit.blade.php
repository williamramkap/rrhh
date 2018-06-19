@extends('layouts.app') 
@section('title','Editar contrato') 
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        ruta
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <h2>Se encontraron los siguientes errores. ({{ count($errors->all()) }})</h2>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
                @endif
            <h3>Editar Contrato</h3>
            <form method="POST" action="{{action('ContractController@update', $contract->id)}}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                Empleado
                <select id="" name="employee_id" class="form-control">
                    <option></option>
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}" @if($employee->id == $contract->employee_id) SELECTED @endif>{{$employee->identity_card.' '.$employee->last_name.' '.$employee->first_name.' '.$employee->second_name}}</option>
                    @endforeach
                </select>
                <br>
                Cargo:
                <select id="" name="position_id" class="form-control">
                    @foreach($position_groups as $p)
                        <optgroup label="{{ $p->name}}">
                            @foreach($p->positions as $position)
                                <option value="{{$position->id}}" @if($position->id == $contract->position_id) @endif >{{ $position->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <br>
                Fecha de inicio
                <input type="date" name="date_start" value="{{ $contract->date_start }}" class="form-control">
                <br>
                Fecha de fin
                <input type="date" name="date_end" value="{{ $contract->date_end }}" class="form-control">
                <br>
                <label for="">Contrato Vigente: </label>
                @if ($contract->status)
                    <input style="transform: scale(1.5);"  type="checkbox" checked name="status">
                @else
                    <input style="transform: scale(1.5);"  type="checkbox" name="status">
                @endif
                <br>
                <button type="submit">guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection