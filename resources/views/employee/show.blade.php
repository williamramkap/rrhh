<label>Tipo de empleado</label> 
<p> {{ $employee->employee_type_id }} </p>
<label> CI: </label>
<p> {{ $employee->identity_card }}</p>
<label> Cuidad de expedici&oacute;n </label>
<p> {{ $employee->city_identity_card_id }} </p>
<label>Primer Nombre</label>
<p> {{ $employee->first_name }} </p>
<label> Segundo Nombre </label>
<p> {{$employee->second_name }} </p>
<label> Apellido </label>
<p> {{$employee->last_name }} </p>
<label> Apellido Materno </label>
<p> {{$employee->mothers_last_name }} </p>
<label> Fecha de nacimiento </label>
<p> {{ $employee->birth_date }} </p>
<label> Lugar de nacimiento </label>
<p> {{ $employee->city_birth_id }} </p>
<label> Gender </label>
<p> {{$employee->gender }} </p>
<label> Crear Planilla </label>
<a href="{{ asset('employee/'.{{$employee->id}}.'/payroll') }}" class="button"> Generar </a>
