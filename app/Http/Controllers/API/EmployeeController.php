<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 10;
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';
        $last_name = strtoupper($request->last_name) ?? '';
        $first_name = strtoupper($request->first_name) ?? '';
        $second_name = strtoupper($request->second_name) ?? '';
        $mothers_last_name = strtoupper($request->mothers_last_name) ?? '';
        $surname_husband = strtoupper($request->surname_husband) ?? '';
        $identity_card = strtoupper($request->identity_card) ?? '';
        $total = Employee::select('employees.id')//,'identity_card','registration','degrees.name as degree','first_name','second_name','last_name','mothers_last_name','civil_status')->
            ->whereRaw("coalesce(employees.first_name,'' ) LIKE '$first_name%'")
            ->whereRaw("coalesce(employees.second_name,'' ) LIKE '$second_name%'")
            ->whereRaw("coalesce(employees.last_name,'') LIKE '$last_name%'")
            ->whereRaw("coalesce(employees.mothers_last_name,'') LIKE '$mothers_last_name%'")
            // ->whereRaw("coalesce(employees.surname_husband,'') LIKE '$surname_husband%'")
            ->whereRaw("coalesce(employees.identity_card, '') LIKE '$identity_card%'")
            ->count();

        $employees = Employee::select(
            'employees.id',
            'identity_card',
            'cities.first_shortened as city_identity_card',
            'first_name',
            'second_name',
            // 'surname_husband',
            'last_name',
            'mothers_last_name',
            'birth_date',
            'account_number',
            'management_entities.name as management_entity',
            'positions.name as position'
        )   ->skip($offset)
            ->take($limit)
            ->orderBy($sort, $order)
            ->leftJoin('management_entities', 'management_entities.id', '=', 'employees.management_entity_id')
            ->leftJoin('charges', 'charges.employee_id', '=', 'employees.id')
            ->leftJoin('positions', 'charges.id', '=', 'positions.charge_id')
            ->leftJoin('cities', 'cities.id', '=', 'employees.city_identity_card_id')
            ->whereRaw("coalesce(employees.first_name,'' ) LIKE '$first_name%'")
            ->whereRaw("coalesce(employees.second_name,'' ) LIKE '$second_name%'")
            ->whereRaw("coalesce(employees.last_name,'') LIKE '$last_name%'")
            ->whereRaw("coalesce(employees.mothers_last_name,'') LIKE '$mothers_last_name%'")
            // ->whereRaw("coalesce(employees.surname_husband,'') LIKE '$surname_husband%'")
            ->whereRaw("coalesce(employees.identity_card, '') LIKE '$identity_card%'")
            ->with('charge')
            ->get();
        return response()->json(['employees' => $employees->toArray(), 'total' => $total]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
