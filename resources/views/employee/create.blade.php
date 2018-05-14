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
<input type="text" name="identity_card">
<br>
Expedici&oacuter;n
<select id="" class="form-control">
    <option></option>
    @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
</select>
<br>
Primer Nombre
<input type="text" name="first_name">
<br>
Segundo Nombre
<input type="text" name="second_name">
<br>
Primer Apellido
<input type="text" name="second_name">
<br>
Segundo Apellido
<input type="text" name="mothers_last_name">
<br>
Fecha de nacimiento
<input type="text" name="birth_date">
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
<input type="text" name="gender">
<br>
N&uacute;mero de cuenta
<input type="text" name="account_number">
<br>
<button type="submit"> guardar</button>
</form>
