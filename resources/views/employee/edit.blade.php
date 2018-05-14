<form method="POST" action="{{asset('employee')}}">
<input name="_method" type="hidden" value="PUT">
    {{ csrf_field() }} 
Tipo de empelado
<select id="" name="employee_type_id" class="form-control">
    <option></option>
    @foreach($employee_types as $employee_type)            
        <option value="{{$employee_type->id}}" @if($employee_type->id == $employee->employee_type_id) selected @endif>{{$employee_type->name}}</option>
    @endforeach
</select>
<br>
CI:
<input type="text" name="identity_card_id" value="{{$employee->identity_card}}">
<br>
Expedici&oacute;n
<select id="" class="form-control">
<option></option>
@foreach($cities as $city)
    <option value="{{$city->id}}" @if($employee->idnetity_card_id == $city->id) selected @endif >{{$city->name}}</option>
@endforeach
</select>
<br>
Primer Nombre
<input type="text" name="first_name" value="{{$employee->first_name}}">
<br>
Segundo Nombre
<input type="text" name="second_name" value="{{$employee->second_name}}">
<br>
Primer Apellido
<input type="text" name="last_name" value="{{$employee->last_name}}">
<br>
Segundo Apellido
<input type="text" name="mothers_last_name" value="{{$employee->mothers_last_name}}">
<br>
Fecha de nacimiento
<input type="text" name="birth_date" value="{{$employee->birth_date}}">
<br>
Lugar de nacimiento
<select id="" class="form-control" name="city_birth_id">
<option></option>
@foreach($cities as $city)
    <option value="{{$city->id}}" @if($employee->city_birth_id == $city->id) selected @endif>{{$city->name}}</option>
@endforeach
</select>
<br>
Sexo
<input type="text" name="gender" value="{{$employee->gender}}">
<br>
N&uacute;mero de cuenta
<input type="text" name="account_number" value="{{$employee->account_number}}">
<br>
<button type="submit"> guardar</button>
</form>
