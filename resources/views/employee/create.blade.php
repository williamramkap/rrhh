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
            <h3>REGISTRO DE EMPLEADO</h3>
            <form method="POST" action="{{asset('employee')}}">
                {{ csrf_field() }}
                Tipo de empelado
                <select id="" name="employee_type_id" class="form-control">
                    <option></option>
                    @foreach($employee_types as $employee_type)
                    <option value="{{$employee_type->id}}">{{$employee_type->name}}</option>
                    @endforeach
                </select>
                <br>
                CI:
                <input type="text" class="form-control" name="identity_card">
                <br>
                Expedici&oacute;n
                <select id="" class="form-control">
                    <option></option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <br>
                Primer Nombre
                <input type="text" name="first_name" class="form-control">
                <br>
                Segundo Nombre
                <input type="text" name="second_name" class="form-control">
                <br>
                Primer Apellido
                <input type="text" name="last_name" class="form-control">
                <br>
                Segundo Apellido
                <input type="text" name="mothers_last_name" class="form-control">
                <br>
                Fecha de nacimiento
                <input type="text" name="birth_date" class="form-control">
                <br>
                Lugar de nacimiento
                <select id="" class="form-control" name="city_birth_id">
                    <option></option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <br>
                Sexo
                <input type="text" name="gender" class="form-control">
                <br>
                N&uacute;mero de cuenta
                <input type="text" name="account_number" class="form-control">
                <br>
                <button type="submit">
                    guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection