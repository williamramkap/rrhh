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
                // DIRECCIÓN GENERAL EJECUTIVA
            ['name' => "Director General Ejecutivo", "charge_id" => 1, "position_group_id" => 1, "item" => 1],
            ['name' => "Secretaria de Dirección", "charge_id" => 1, "position_group_id" => 1, "item" => 2],
            ['name' => "Asistente de Dirección", "charge_id" => 1, "position_group_id" => 1, "item" => 3],
            ['name' => "Asistente y Mensajero", "charge_id" => 1, "position_group_id" => 1, "item" => 4],
                // HONORABLE DIRECTORIO
            ['name' => "Asesor Jurídico de Directorio", "charge_id" => 1, "position_group_id" => 2, "item" => 1],
            ['name' => "Asesor Financiero de Directorio", "charge_id" => 1, "position_group_id" => 2, "item" => 1],
            ['name' => "Secretaria de Honorable Directorio", "charge_id" => 1, "position_group_id" => 2, "item" => 1],
                // UNIDAD DE AUDITORÍA INTERNA
            ['name' => "Jefe de Unidad de Auditoria Interna", "charge_id" => 1, "position_group_id" => 3, "item" => 1],
            ['name' => "Auditor Interno I", "charge_id" => 1, "position_group_id" => 3, "item" => 1],
            ['name' => "Auditor Interno II", "charge_id" => 1, "position_group_id" => 3, "item" => 1],
                // UNIDAD DE TRANSPARENCIA INSTITUCIONAL
            ['name' => "Jefe de la Unidad de Transparencia Institucional", "charge_id" => 4, "position_group_id" => 4, "item" => 1],
                // UNIDAD DE PLANIFICACIÓN ORGANIZACIÓN Y MÉTODOS
            ['name' => "Jefe de la Unidad de Planificación, Organización y Métodos", "charge_id" => 5, "position_group_id" => 5, "item" => 1],
                // UNIDAD DE GESTIÓN DOCUMENTAL Y ARCHIVO
            ['name' => "Encargado de la Unidad de Gestión Documental y Archivo", "charge_id" => 6, "position_group_id" => 6, "item" => 1],
            ['name' => "Asistente de Registro y Despacho de Correspondencia", "charge_id" => 6, "position_group_id" => 6, "item" => 1],
                // DIRECCIÓN DE ESTRATEGIAS SOCIALES E INVERSIONES
            ['name' => "Director de Estrategias Sociales e Inversiones", "charge_id" => 1, "position_group_id" => 7, "item" => 1],
            ['name' => "Secretaria de Dirección", "charge_id" => 1, "position_group_id" => 7, "item" => 1],
                // UNIDAD DE INVERSIÓN EN PRÉSTAMO
            ['name' => "Jefe de Unidad de Inversión de Prestamos", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Analista Legal Prestamos", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Encargado de Calificación de Prestamos", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Técnico de Atención al Afiliado I", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Técnico de Atención al Afiliado II", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Técnico de Atención al Afiliado III", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Encargado de Registro, Control y Recuperación de Prestamos", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
            ['name' => "Técnico de Recuperación y Cobranzas", "charge_id" => 1, "position_group_id" => 8, "item" => 1],
                // UNIDAD DE INVERSIÓN EN SERVICIOS, BIENES Y PATRIMONIO
            ['name' => "Jefe de Unidad de Inversión en Servicios, Bienes y Patrimonio", "charge_id" => 1, "position_group_id" => 9, "item" => 1],
            ['name' => "Encargado de Procesos Técnicos de Patrimonio y Bienes", "charge_id" => 1, "position_group_id" => 9, "item" => 1],
            ['name' => "Técnico de Conservación, Patrimonio y Bienes", "charge_id" => 1, "position_group_id" => 9, "item" => 1],
            ['name' => "Asistente de Conservación, Patrimonio y Bienes", "charge_id" => 1, "position_group_id" => 9, "item" => 1],
                // HOSTAL PARÍS
            ['name' => "Profesional Administrativo de Hostal Paris", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
            ['name' => "Asistente de Recepción Diurna I", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
            ['name' => "Asistente de Recepción Diurna II", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
            ['name' => "Asistente de Recepción Nocturno", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
            ['name' => "Asistente Turnante", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
            ['name' => "Asistente Camarero", "charge_id" => 1, "position_group_id" => 10, "item" => 1],
                // DIRECCIÓN DE BENEFICIOS ECONÓMICOS
            ['name' => "Director de Beneficios Económicos", "charge_id" => 1, "position_group_id" => 11, "item" => 1],
            ['name' => "Secretaria de Dirección", "charge_id" => 1, "position_group_id" => 11, "item" => 1],
            ['name' => "Profesional de Archivo y Gestion Documental de Beneficios Economicos", "charge_id" => 1, "position_group_id" => 11, "item" => 1],
            ['name' => "Profesional de Trabajo Social", "charge_id" => 1, "position_group_id" => 11, "item" => 1],
                // UNIDAD DE OTOR. FONDO DE RET. POL. IND. CUOTA Y AUXILIO MORT.
            ['name' => "Jefe de Unidad de Otorgación de Fondo de Retiro Policial Individual Cuota y Auxilio Mortuorio", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Analista Legal Fondo de Retiro Cuota y Auxilio Mortuorio", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Técnico de Atención al Afiliado Fondo de Retiro", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Encargado de Calificación de Fondo de Retiro Cuota y Auxilio Mortuorio", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Técnico de Procesos de Calificación de Fondo de Retiro, Cuota y Auxilio Mortuorio", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Encargado de Cuentas Individuales", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
            ['name' => "Técnico de Control de Aportes", "charge_id" => 1, "position_group_id" => 12, "item" => 1],
                // UNIDAD DE OTORGACIÓN DEL COMPLEMENTO ECONÓMICO
            ['name' => "Jefe de Unidad de Otorgación del Complemento Económico", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Analista Legal del Complemento Económico", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Técnico de Atención al Afiliado Complemento Económico", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Encargado de Calificación Complemento Económico", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Técnico de Verificación y Validación Documental", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Técnico de Procesos de Calificación Complemento Económico", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
            ['name' => "Encargado de Organización y Logistica", "charge_id" => 1, "position_group_id" => 13, "item" => 1],
                // DIRECCIÓN DE ASUNTOS ADMINISTRATIVOS
            ['name' => "Director de Asuntos Administrativos", "charge_id" => 1, "position_group_id" => 14, "item" => 1],
            ['name' => "Secretaria de Direccion", "charge_id" => 1, "position_group_id" => 14, "item" => 1],
                // UNIDAD FINANCIERA
            ['name' => "Jefe de Unidad Financiera", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Responsable de Contabilidad Integrada", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Analista de Sistemas Contable 1", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Analista de Procesos de Información Contable", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Técnico de Archivo y Manejo de Documentos Contables", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Analista Contable de Fondos en Avance", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Analista Contable de Inversiones", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Responsable de Tesoreria", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Analista de Ingresos", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Técnico de Recepción de Aportes y Caja General", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Responsable de Programación y Ejecución Presupuestaria", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
            ['name' => "Técnico de Procesamiento y Registro Presupuestario", "charge_id" => 1, "position_group_id" => 15, "item" => 1],
                // UNIDAD ADMINISTRATIVA
            ['name' => "Jefe de la Unidad Administrativa", "charge_id" => 1, "position_group_id" => 16, "item" => 1],
            ['name' => "Analista de Contratación y Adquisiciones", "charge_id" => 1, "position_group_id" => 16, "item" => 1],
            ['name' => "Profesional en Servicios Generales y Trámites Administrativos", "charge_id" => 1, "position_group_id" => 16, "item" => 1],
            ['name' => "Analista en Activos Fijos y Almacenes", "charge_id" => 1, "position_group_id" => 16, "item" => 1],
                // UNIDAD DE RECURSOS HUMANOS
            ['name' => "Jefe de la unidad de Recursos Humanos", "charge_id" => 1, "position_group_id" => 17, "item" => 1],
            ['name' => "Técnico en Recursos Humanos", "charge_id" => 1, "position_group_id" => 17, "item" => 1],
                // UNIDAD DE SISTEMAS Y SOPORTE TÉCNICO
            ['name' => "Jefe de la Unidad de Sistemas y Soportes Físico", "charge_id" => 1, "position_group_id" => 18, "item" => 1],
            ['name' => "Analista de Desarrollo y Mantenimiento de Software", "charge_id" => 1, "position_group_id" => 18, "item" => 1],
            ['name' => "Profesional Soporte Técnico", "charge_id" => 1, "position_group_id" => 18, "item" => 1],
            ['name' => "Analista en Programación de Sistemas", "charge_id" => 1, "position_group_id" => 18, "item" => 1],
                // DIRECCIÓN DE ASESORAMIENTO JURÍDICO ADMIN. Y DEF. INST.
            ['name' => "Director de Asesoramiento Jurídico, Administrativo y Defensa Institucional", "charge_id" => 1, "position_group_id" => 19, "item" => 1],
            ['name' => "Secretaria de Direccion", "charge_id" => 1, "position_group_id" => 19, "item" => 1],
                // UNIDAD INTEGRAL ADMINISTRATIVA INSTITUCIONAL
            ['name' => "Jefe de la Unidad Integral Administrativa Institucional", "charge_id" => 1, "position_group_id" => 20, "item" => 1],
            ['name' => "Analista Jurídico Administrativo", "charge_id" => 1, "position_group_id" => 20, "item" => 1],
            ['name' => "Analista de Procesos Administrativos y Contratos", "charge_id" => 1, "position_group_id" => 20, "item" => 1],
                // UNIDAD INTEGRAL DE DEFENSA Y REPRESENTACIÓN INSTITUC.
            ['name' => "Jefe de la Unidad de Defensa y Representación Institucional", "charge_id" => 1, "position_group_id" => 21, "item" => 1],
            ['name' => "Analista de Procesos Judiciales y Arbitrales", "charge_id" => 1, "position_group_id" => 21, "item" => 1],
            ['name' => "Analista de Procesos Especiales y Recuperación Patrimonial", "charge_id" => 1, "position_group_id" => 21, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL SANTA CRUZ
            ['name' => "Representante Departamental Santa Cruz", "charge_id" => 1, "position_group_id" => 22, "item" => 1],
            ['name' => "Asistente Administrativo Sta. Cruz", "charge_id" => 1, "position_group_id" => 22, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL COCHABAMBA
            ['name' => "Representante Departamental Cochabamba", "charge_id" => 1, "position_group_id" => 23, "item" => 1],
            ['name' => "Asistente Administrativo Cbba.", "charge_id" => 1, "position_group_id" => 23, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL ORURO
            ['name' => "Asistente Departamental Oruro", "charge_id" => 1, "position_group_id" => 24, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL CHUQUISACA
            ['name' => "Asistente Departamental Chuquisaca", "charge_id" => 1, "position_group_id" => 25, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL POTOSI
            ['name' => "Asistente Departamental Potosi", "charge_id" => 1, "position_group_id" => 26, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL TARIJA
            ['name' => "Representante Departamental Tarija", "charge_id" => 1, "position_group_id" => 27, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL BENI
            ['name' => "Representante Departamental Beni", "charge_id" => 1, "position_group_id" => 28, "item" => 1],
                // REPRESENTACIÓN DEPARTAMENTAL PANDO
            ['name' => "Representante Departamental Pando", "charge_id" => 1, "position_group_id" => 29, "item" => 1]
        ];
        foreach ($statuses as $status) {
            App\Position::create($status);
        }

    }
}
