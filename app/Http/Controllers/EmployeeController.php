<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\City;
use App\EmployeeType;
use Validator;
use App\Exports\PayrollExport;
use Excel;
use App\Payroll;
use PHPExcel_Worksheet_Drawing;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Fill;
use App\Contract;
use App\Position;
use App\DiscountPayroll;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$discount = DiscountPayroll::where('payroll_id','1203')->select('id','discount_id')->orderBy('discount_id','asc')->get()->pluck('discount_id','id');
        //return $discount[0]->discoun
        //return $discount;

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
                $da = [
                    'Renta vejez 10%',
                    'Riesgo común 1,71%',
                    'Comisión 0,5%',
                    'Aporte solidario del asegurado 0,5%',
                    'Aporte Nacional solidario 1%, 5%, 10%',
                ];
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
                $position = Position::where('employee_id',$employee->id)->first();
                $discount = DiscountPayroll::where('payroll_id',$payroll->id)->get();
                //$i
                $discount = DiscountPayroll::where('payroll_id',$payroll->id)->select('id','amount')->orderBy('discount_id','asc')->get()->pluck('amount','id');
                $sheet->row($row++, array(
                    $number++,
                    $employee->identity_card,
                    $employee->last_name.' '.$employee->mothers_last_name.' '.$employee->first_name.' '.$employee->mothers_last_name,
                    $employee->group_job->name??'Central',
                    $employee->account_number,
                    date("d/m/Y", strtotime($employee->birth_date)),
                    $employee->gender,                    
                    $position->charge->name??'',
                    $position->name??'',
                    date("d/m/Y", strtotime($contract->date_start)),
                    date("d/m/Y", strtotime($contract->date_end)),                    
                    $payroll->worked_days,
                    $position->charge->base_wage ?? '0',
                    $payroll->quotable,
                    $employee->management_entity->name,
                    $discount[1] ?? '',
                    $discount[2] ?? '',
                    $discount[3] ?? '',
                    $discount[4] ?? '',
                    $discount[5] ?? '',
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

        return ;
        $employees = Employee::get();
        $data = [
            'employees' => $employees,
        ];        
        return view('employee.index',$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $employee_types = EmployeeType::get();
        $data = [
            'cities'  =>  $cities,
            'employee_types' =>  $employee_types,
        ];
        return view('employee.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];
        $double_ci = false;
        $ci = Employee::where('identity_card',$request->identity_card)->first();
        if(isset($ci->id))
            $double_ci = true;
        $biz_rules = [
            'double_ci' =>  $double_ci?'required':'',
        ];
        $rules=array_merge($rules,$biz_rules);
        $array_rules = [
            'employee_type_id'  =>  'required',
            'city_identity_card_id' =>  'required',
            'city_birth_id' =>  'required',
            'first_name'    =>  'required',
            'last_name' =>  'required',
            'identity_card' =>  'required',
            'birth_date'    =>  'required',            
        ];
        $rules=array_merge($rules,$array_rules);

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){            
            return redirect(asset('employee/create'))
                ->withErrors($validator)
                ->withInput();            
        }       
        $employee = new Employee();
        $employee->employee_type_id = $request->employee_type_id;
        $employee->city_identity_card_id = $request->city_identity_card_id;
        $employee->city_birth_id = $request->city_birth_id;
        $employee->first_name = $request->first_name;
        $employee->second_name = $request->second_name; 
        $employee->last_name = $request->last_name;
        $employee->mothers_last_name = $request->mothers_last_name; 
        $employee->identity_card = $request->identity_card; 
        $employee->birth_date = $request->birth_date;
        $employee->account_number = $request->account_number;
        $employee->gender = $request->gender;
        $employee->save();
        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data = [
            'employee'  =>  $employee,            
        ];
        return view('employee.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $cities = City::get();
        $employee_types = EmployeeType::get();
        $data = [
            'employee'  =>  $employee,
            'cities' =>  $cities,
            'employee_types'    =>  $employee_types,
        ];
        return view('employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {            
        $rules = [];
        $double_ci = false;
        $ci = Employee::where('id','!=',$employee->id)->where('identity_card',$request->identity_card)->first();
        
        if(isset($ci->id))
            $double_ci = true;
        $biz_rules = [
            'double_ci' =>  $double_ci?'required':'',
        ];
        $rules=array_merge($rules,$biz_rules);
        $array_rules = [
            'employee_type_id'  =>  'required',
            'city_identity_card_id' =>  'required',
            'city_birth_id' =>  'required',
            'first_name'    =>  'required',
            'last_name' =>  'required',
            'identity_card' =>  'required',
            'birth_date'    =>  'required',            
        ];
        $rules=array_merge($rules,$array_rules);        
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){            
            return redirect(asset('employee/'.$employee->id.'/edit'))
                ->withErrors($validator)
                ->withInput();            
        }       
        
        $employee->employee_type_id = $request->employee_type_id;
        $employee->city_identity_card_id = $request->city_identity_card_id;
        $employee->city_birth_id = $request->city_birth_id;
        $employee->first_name = $request->first_name;
        $employee->second_name = $request->second_name; 
        $employee->last_name = $request->last_name;
        $employee->mothers_last_name = $request->mothers_last_name; 
        $employee->identity_card = $request->identity_card; 
        $employee->birth_date = $request->birth_date;
        $employee->account_number = $request->account_number;
        $employee->gender = $request->gender;
        $employee->save();
        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
