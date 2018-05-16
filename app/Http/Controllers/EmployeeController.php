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
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
                    'SUELDO NETO',          
                    'Minimo No imponible',
                    'Diferencia sujeto a impuestos',
                    'Impuesto 13% Debito Fisca',
                    'Computo IVA según D.J. Form. 110',
                    '13% Sobre 2 Min. Nal.',
                    'Fisco',
                    'Dependiente',
                    'Mes anterior',
                    'Actualizacion',
                    'Total',
                    'Saldo a favor del dependiente',
                    'Saldo Utilizado',
                    'Impuesto determinado a pagar',
                    'Saldo para mes siguiente',                    
               ));               
               $payrolls = Payroll::get();
               $number = 1;
               $basic_salary = 4000;
               $basic_salary_tax = $basic_salary*0.13;
               foreach($payrolls as $payroll){

                $employee = $payroll->employee;
                $contract = Contract::where('employee_id',$employee->id)->where('status',true)->first();
                $tax = $payroll->payable_liquid-40000>0?$payroll->payable_liquid-40000:0;
                $sheet->row($row++, array(
                    $number++,
                    $employee->identity_card,
                    $employee->last_name.' '.$employee->mothers_last_name.' '.$employee->first_name.' '.$employee->mothers_last_name,
                    $employee->group_job->name??'Central',                                                                                
                    $payroll->payable_liquid,
                    $basic_salary,
                    $tax,
                    '0',
                    $basic_salary_tax,
                    '0f',
                    '0D',
                    '0m',
                    '0A',
                    '0T',
                    '0S',
                    '0u',
                    '0I',
                    '0sig',                    
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
