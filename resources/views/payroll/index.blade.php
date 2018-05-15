@extends('layouts.app') 
@section('content')
<div class="container">
    <form action="/payroll" method="POST">
        {{ csrf_field() }}
    <payroll></payroll>
    <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Guardar</button>
    </form>
</div>
@endsection
