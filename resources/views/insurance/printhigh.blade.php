<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aviso de afiliacion y reingreso del trabajador</title>
    <style>
        html,
        body {
            
        }
        .tabla{
            margin: 0;
            padding: 5px 0px;
            font-family: 'Arial', sans-serif;
            text-align: center;
            
            margin: 1cm ;
        }
        .first{
            margin: 3cm 0 0 0;            
        }
        .second{
            margin: 2cm 0 0 0;
        }
        .three{
            margin: 2cm 0 0 0;
        }
        .four{
            margin: 2cm 0 0 0;
        }
        .five{
            margin: 2cm 0 0 0;
        }
        .camp{
            float: left;
        }
        .separate{
            clear: both;
        }
        .pat{
            width: 5cm;
        }
        .mat{
            width: 5cm;            
        }
        .name{
            width: 5cm; 
        }
        .noasegurado{
            width: 5cm;
        }
        .day_birth{
            width: 1.7cm;
        }
        .month_birth{
            width: 1.7cm;
        }
        .year_birth{
            width: 1.7cm;
        }
        .gender{
            width: 2.5cm;
        }
        .zone{
            width: 3cm;
        }
        .street{
            width: 3cm;
        }
        .no{
            width: 2cm;
        }
        .location{
            width: 3cm;
        }
        .salary{
            width: 5cm;
        }
        .position{
            width: 8cm;
        }
        .day_end{
            width: 2cm;
        }
        .month_end{
            width: 3cm;
        }
        .year_end{
            width: 2cm;
        }
        .razon{
            width: 13cm;
        }
        .noemp{
            width: 7cm;
        }
        .fecha{
            width: 15cm;
        }
    </style>

</head>

<body>
<div class="">
    <div class="tabla">
        <div class="first">
            <div class="camp pat"> {{ $contract->employee->last_name }} </div>
            <div class="camp mat"> {{ $contract->employee->mothers_last_name }} </div>
            <div class="camp name"> {{ $contract->employee->first_name }} {{ $contract->employee->second_name }} </div>
            <div class="camp noasegurado">  </div>
            
        </div>
        <div class="separate"></div>
        <div class="second">
            <div class="camp day_birth"> {{ date('d', strtotime($contract->employee->birth_date)) }} </div>
            <div class="camp month_birth"> {{ date('m', strtotime($contract->employee->birth_date)) }} </div>
            <div class="camp year_birth"> {{ date('Y', strtotime($contract->employee->birth_date)) }} </div>
            <div class="camp gender"> {{ $contract->employee->gender }} </div>
            <div class="camp zone"> {{ $contract->employee->zone }} </div>
            <div class="camp street"> {{ $contract->employee->street }} </div>
            <div class="camp no"> {{ $contract->employee->number }} </div>
            <div class="camp location"> {{ $contract->employee->location }} </div>
        </div>
        <div class="separate"></div>
        <div class="three">
            <div class="camp salary"> {{ $contract->position->charge->base_wage }} </div>
            <div class="camp position"> {{ $contract->position->name }} </div>
            <div class="camp day_end"> {{ date('d', strtotime($contract->date_end)) }} </div>
            <div class="camp month_end"> {{ date('m', strtotime($contract->date_end)) }} </div>
            <div class="camp year_end"> {{ date('Y', strtotime($contract->date_end)) }} </div>
        </div>
        <div class="separate"></div>
        <div class="four">
            <div class="camp razon"> {{ $razon }} </div>
            <div class="camp noemp"> {{ $noemp }} </div>
        </div>
        <div class="separate"></div>
        <div class="five">
            <div class="camp fecha"> {{ $fecha }} </div>
        </div>
    </div>
</div>
    
</body>

</html>