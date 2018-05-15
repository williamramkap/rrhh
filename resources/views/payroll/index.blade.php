@extends('layouts.app') 
@section('content')

    <form action="/payroll" method="POST">
        {{ csrf_field() }}
    <payroll></payroll>
    <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Guardar</button>
    </form>

@endsection
