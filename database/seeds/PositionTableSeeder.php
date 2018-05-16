<?php

use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => "Analista Contable de Inversiones", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Contrataciones y Adquisiciones", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Desarrollo y Mantenimiento de Software", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Ingresos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Procesos Administrativos y Contratos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Procesos de Informacion contable", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Procesos Especiales y Recuperacion Patrimonial", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Procesos Judiciales y Arbitrales", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista de Sistemas Contable 1", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista en Programcion de Sistemas", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista Legal del complemento Economico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "analista Legal Fondo de Retiro cuota y Auxilio Mortuorio", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Analista Legal Prestamos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asesor Juridico de Directorio", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente Administrativo - Cochabamba", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente Camarera", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Conservacion, Mantenimiento y Refaccion", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Direccion", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Oficina - Representación Chuquisaca", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Oficina - Representación Oruro", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Oficina - Representación Potosi", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Oficina - Representación Santa Cruz", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Recepcion Diurno", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente de Recepcion Nocturno", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente Turnante", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Asistente y Mensajero", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Auditor Interno", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Contable de Fondos en Avance", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "DIRECTORA DE BENEFICIOS ECONOMICOS", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "DIRECTOR ASUNTOS ADMINISTRATIVO", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "DIRECTOR DE ASESORAMIENTO JURIDICO, ADMINISTRATIVO Y DEFENSA INSTITUCIONAL", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "DIRECTOR DE ESTRATEGIAS SOCIALES E INVERSIONES", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "DIRECTOR GENERAL EJECUTIVO", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de Calificacion Complemento Economico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de Cuentas Individuales", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de la Unidad de Gestion Documental Archivo", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de Organización y Logisitca", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de Procesos Tecnicos de Patrimonio y Bienes", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Encargado de Registro, Control y Recuperacion de Prestamos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefa Unidad de la Unidad de Transparencia Institucional", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "jefe de la Unidad de Defensa y Representacion Institucional", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de la unidad de Recursos Humanos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de la Unidad Integral Administrativa Institucional", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "JEFE DE UNIDAD ADMINISTRATIVA", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de Unidad de Auditoria Interna", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de Unidad de Inversion de Prestamos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de Unidad de Otorgacion de Fondo de Retiro Policial Individual Cuota y Auxilio Mortuorio", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe de Unidad Financiera", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe Unidad de la Unidad de Sistemas y Soportes Fisico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Jefe Unidad de Otorgacion del Complemento Economico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Profesional Administrativo de Hostal Paris", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Profesional en Activos Fijos y Almacenes", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Profesional en Servicios Generales y Tramites Administrativos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Profesional Soporte Tecnico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Representante Departamental", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Responsable de Contabilidad Integrada", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Responsable de Programacion y Ejecucion Presupuestaria", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Responsable de Tesoreria", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Secretaria de Direccion", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Secretaria de Direccion asuntos adm", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Secretaria de Direccion estrategias sociales e inversiones", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Secretaria de Honorable Directorio", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico control de aportes", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Archivo y Gestion Documental de Beneficios Economicos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Archivo y Manejo de Documentos Contables", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Atencion al Afiliado Complemento Economico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de atencion al Afiliado Fondo de Retiro", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Atencion al Afiliado I", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Atencion al Afiliado II", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Atencion al Afiliado - Prestamos", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de calificacion complemento Economico", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Conservacion, Patrimonio y Bienes", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Procesamiento y Registro Presupuestario", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Procesos de Calificacion de Fondo de Retiro, Cuota y Auxilio Mortuorio", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Recuperacion de Aportes y Caja General", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Tecnico de Verificacion y Validacion Documental", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
            ['name' => "Trabajo Social", 'charge_id' => \App\Charge::all()->random()->id, 'employee_id' => \App\Employee::all()->random()->id, 'item' => rand(10, 200)],
        ];
        foreach ($statuses as $status) {
            App\Position::create($status);
        }

    }
}
