@extends('layouts.app') 
@section('title','Contrato') 
@section('content')

<label>Apellido paterno</label>
<p>
    {{ $contract->employee->last_name }}
</p>
<label>Apellido materno</label>
<p>
    {{ $contract->employee->mothers_last_name }}
</p>
<label>Apellido de casada</label>
<p>
    {{ $contract->employee->housband_last_name }}
</p>
<label>Primer Nombre</label>
<p>
    {{ $contract->employee->first_name }}
</p>
<label>Segundo Nombre</label>
<p>
    {{ $contract->employee->second_name }}
</p>
<label>Cargo</label>
<p>
    {{ $contract->position->name }}
</p>

<label>Fecha de inicio de contrato</label>
<p>
    {{ date("d-m-Y", strtotime($contract->date_start))  }}
    
</p>
<label>Fecha de fin de contrato</label>
<p>
    {{ date("d-m-Y", strtotime($contract->date_end))  }}
</p>
@if($contract->status == false)
<label>Motivo de retiro</label>
<p>
    {{ $contract->retirement_reason }}
</p>
@endif


@endsection