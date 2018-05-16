<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;
use App\Employee;
use Carbon\Carbon;
use App\Discount;
use Prophecy\Promise\ReturnPromise;
use App\Procedure;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payroll.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return $request->all();
        // Procedure::where('year', $request->year)->where('month', $request)
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'employee-') !== false) {
                preg_match('/\d{1,}/', $key, $matches);
                $id = (int) $matches[0];
                $employee = Employee::find($id);
                $payroll = new Payroll();
                $payroll->employee_id = $id;
                $payroll->management_entity_id = $employee->management_entity->id;
                $payroll->procedure_id = 1;
                $payroll->name = "Personal Eventual - Mes ";
                $payroll->worked_days = $value[0];
                $base_wage = $employee->charge->first()->base_wage ?? 1000;
                $quotable = ($base_wage/Carbon::now()->daysInMonth)* $value[0];
                $total_discount_law = 0;
                $payroll->quotable = $quotable;
                foreach (Discount::where('discount_type_id', 1)->orderBy('id')->get() as $d) {
                    $total_discount_law = $total_discount_law + ( ($quotable * $d->percentage )/100);
                }
                $payroll->total_amount_discount_law = $total_discount_law;
                $payroll->total_amount_discount_institution = floatval($value[1]);
                $total_discounts = $total_discount_law + floatval($value[1]);
                $payroll->total_discounts = $total_discounts;
                $payroll->payable_liquid = $quotable - $total_discounts;
                $payroll->save();

            }
        }
        return Payroll::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }

    public function employee_payroll(Employee $employee){
        return $employee;
    }

    private function generateExcelLaboral(){
        Excel::create('Filename', function($excel) {
            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                    ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');
            
            $excel->sheet('Sheetname', function($sheet) {
                $center_style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                );


                $name = "MUTUAL DE SERVICIOS AL POLICIA";
                $nit = "NIT 234578021";
                $address = "Av. 6 De Agosto No. 2354 - Zona Sopocachi";
                $title = "PLANILLA DE HABERES";
                $subtitle = "PERSONAL EVENTUAL - MES  ABRIL DE 2018";
                $exchange = "(EXPRESADO EN BOLIVIANOS)";
                $sheet->mergeCells('A1:C1');
                $sheet->mergeCells('A2:C2');
                $sheet->mergeCells('A3:C3');

                $sheet->row(1, array(
                    $name
                ));
                $sheet->row(2, array(
                    $nit
                ));
                $sheet->row(3, array(
                    $address
                ));
                
                $objDrawing = new PHPExcel_Worksheet_Drawing;
                $objDrawing->setPath(public_path('images/logo.jpg')); //your image path
                $objDrawing->setCoordinates('E1');                
                $objDrawing->setHeight(74);                
                $objDrawing->setWorksheet($sheet);

                $sheet->mergeCells('A5:Z5');
                $sheet->getStyle("A5:Z5")->applyFromArray($center_style);
                $sheet->mergeCells('A6:Z6');
                $sheet->getStyle("A6:Z6")->applyFromArray($center_style);
                $sheet->mergeCells('A7:Z7');
                $sheet->getStyle("A7:Z7")->applyFromArray($center_style);



                $sheet->row(5, array(
                    $title
                ));
                $sheet->row(6, array(
                    $subtitle
                ));
                $sheet->row(7, array(
                    $exchange
                ));

                $row = 10;
                $sheet->getStyle($row)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FF808080');
                $sheet->row($row++, array(
                    'Nº',
                    'C.I.',
                    'TRABAJADOR',
                    'SUCURSAL',
                    'CUENTA BANCO UNION',          
                    'FECHA NACIMIENTO',
                    'SEXO',
                    'CARGO',
                    'PUESTO',
                    'FECHA DE INGRESO',
                    'FECHA VENCIMIENTO CONTRATO',
                    'DIAS TRABAJADOS',
                    'HABER BASICO',
                    'TOTAL GANADO',
                    'AFP',
                    'Renta vejez 10%',
                    'Riesgo común 1,71%',
                    'Comisión 0,5%',
                    'Aporte solidario del asegurado 0,5%',
                    'Aporte Nacional solidario 1%, 5%, 10%',
                    'TOTAL DESCUENTOS DE LEY',
                    'SUELDO NETO',
                    'RC-IVA 13%',
                    'Desc. Atrasos, Abandonos, Faltas y Licencia S/G Haberes',
                    'TOTAL DESCUENTOS',
                    'LIQUIDO PAGABLE',
               ));               
               $payrolls = Payroll::get();
               $number = 1;
               foreach($payrolls as $payroll){

                $employee = $payroll->employee;
                $contract = Contract::where('employee_id',$employee->id)->where('status',true)->first();

                $sheet->row($row++, array(
                    $number++,
                    $employee->identity_card,
                    $employee->last_name.' '.$employee->mothers_last_name.' '.$employee->first_name.' '.$employee->mothers_last_name,
                    $employee->group_job??'Central',
                    $employee->account_number,
                    $employee->birth_date,
                    $employee->gender,
                    '1',
                    $employee->employee_type->name,
                    $contract->date_start,
                    $contract->date_end,
                    $payroll->worked_days,
                    $contract->base_wage,
                    $payroll->quotable,
                    $payroll->managment_entity->name,
                    $payroll->quotable*0.1,
                    $payroll->quotable*0.171,
                    $payroll->quotable*0.05,
                    0,
                    $payroll->total_amount_discount_institution,
                    $payroll->payable_liquid,
                    0,
                    $payroll->total_discounts,
                    $payroll->total_discounts,
                    $payroll->payable_liquid
                ));
               }
            });
        })->download('xls');
    }

    private function generateExcelPatronal(){
        Excel::create('Filename', function($excel) {
            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                    ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');
            
            $excel->sheet('Sheetname', function($sheet) {
                $center_style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                );
                $name = "MUTUAL DE SERVICIOS AL POLICIA";
                $nit = "NIT 234578021";
                $address = "Av. 6 De Agosto No. 2354 - Zona Sopocachi";
                $title = "PLANILLA PATRONAL";
                $subtitle = "PERSONAL EVENTUAL - MES  ABRIL DE 2018";
                $exchange = "(EXPRESADO EN BOLIVIANOS)";
                $sheet->mergeCells('A1:C1');
                $sheet->mergeCells('A2:C2');
                $sheet->mergeCells('A3:C3');

                $sheet->row(1, array(
                    $name
                ));
                $sheet->row(2, array(
                    $nit
                ));
                $sheet->row(3, array(
                    $address
                ));
                
                $objDrawing = new PHPExcel_Worksheet_Drawing;
                $objDrawing->setPath(public_path('images/logo.jpg')); //your image path
                $objDrawing->setCoordinates('E1');                
                $objDrawing->setHeight(74);                
                $objDrawing->setWorksheet($sheet);

                $sheet->mergeCells('A5:N5');
                $sheet->getStyle("A5:N5")->applyFromArray($center_style);
                $sheet->mergeCells('A6:N6');
                $sheet->getStyle("A6:N6")->applyFromArray($center_style);
                $sheet->mergeCells('A7:N7');
                $sheet->getStyle("A7:N7")->applyFromArray($center_style);



                $sheet->row(5, array(
                    $title
                ));
                $sheet->row(6, array(
                    $subtitle
                ));
                $sheet->row(7, array(
                    $exchange
                ));

                $row = 10;
                $sheet->getStyle($row)->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FF808080');
                $sheet->row($row++, array(
                    'Nº',
                    'C.I.',
                    'TRABAJADOR',
                    'SUCURSAL',
                    'PUESTO',          
                    'FECHA INGRESO',
                    'TOTAL GANADO',
                    'DIAS TRABAJADOS',
                    'AFP',
                    'CNS 10%',
                    'Riesgo profesional 1,71%',
                    'Aporte Patronal Solidario 3%',
                    'Aporte patronal para vivienda 2%',
                    'TOTAL A PAGAR',                    
               ));               
               $payrolls = Payroll::get();
               $number = 1;
               foreach($payrolls as $payroll){

                $employee = $payroll->employee;
                $contract = Contract::where('employee_id',$employee->id)->where('status',true)->first();

                $sheet->row($row++, array(
                    $number++,
                    $employee->identity_card,
                    $employee->last_name.' '.$employee->mothers_last_name.' '.$employee->first_name.' '.$employee->mothers_last_name,
                    $employee->group_job->name??'Central',                                                                                
                    $employee->employee_type->name,
                    $contract->date_start,
                    $payroll->quotable,         
                    $payroll->worked_days,                    
                    $employee->management_entity->name,
                    $payroll->quotable*0.1,
                    $payroll->quotable*0.171,
                    $payroll->quotable*0.03,
                    $payroll->quotable*0.02,                    
                    $payroll->payable_liquid
                ));
               }
            });
        })->download('xls');
    }
}
