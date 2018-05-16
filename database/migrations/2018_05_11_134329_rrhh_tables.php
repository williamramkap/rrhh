<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RrhhTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('months', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('procedures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('month_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('year')->nullable();
            $table->foreign('month_id')->references('id')->on('months');
            $table->timestamps();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_shortened')->nullable();
            $table->string('second_shortened')->nullable();
            $table->timestamps();
        });

        Schema::create('group_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('first_shortened');
            $table->timestamps();
        });

        Schema::create('employee_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

     

        
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_type_id')->unsigned()->nullable();
            $table->bigInteger('city_identity_card_id')->unsigned()->nullable();
            $table->bigInteger('city_birth_id')->unsigned()->nullable();
            $table->bigInteger('management_entity_id')->unsigned()->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mothers_last_name')->nullable();
            $table->string('surname_husband')->nullable();
            $table->string('identity_card')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('account_number')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->foreign('employee_type_id')->references('id')->on('employee_types');
            $table->foreign('city_identity_card_id')->references('id')->on('cities');
            $table->foreign('city_birth_id')->references('id')->on('cities');
            $table->foreign('management_entity_id')->references('id')->on('management_entities');
            $table->timestamps();
        });

        Schema::create('charges', function (Blueprint $table) { //cargos
            $table->bigIncrements('id');
            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->decimal('base_wage', 8, 2)->nullable();
            $table->string('shortened')->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) { //puestos
            $table->bigIncrements('id');
            $table->bigInteger('charge_id')->unsigned()->nullable();
            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('item')->nullable();
            $table->string('shortened')->nullable();
            $table->foreign('charge_id')->references('id')->on('charges');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
        Schema::create('directions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('shortened')->nullable();
            $table->timestamps();
        });

        Schema::create('units', function (Blueprint $table) { //unidades
            $table->bigIncrements('id');
            $table->bigInteger('direction_id')->unsigned()->nullable();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->bigInteger('')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('shortened')->nullable();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->foreign('directions')->references('id')->on('directions');
            $table->timestamps();
        });
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->date('date_start')->nullable();
            $table->string('date_end')->nullable(); // 2018-10-10 - Libre nombramiento, comisión ...
            $table->boolean('status')->default(1);
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
        Schema::create('management_entities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });
        Schema::create('payrolls', function (Blueprint $table) { //planilla de haberes
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('procedure_id')->unsigned();
            $table->string('name')->nullable();
            $table->bigInteger('worked_days');
            $table->decimal('quotable', 8, 2)->nullable();
            $table->decimal('total_amount_discount_law', 8, 2)->nullable();
            $table->decimal('net_salary', 8, 2)->nullable();
            $table->decimal('total_amount_discount_institution', 8, 2)->nullable();
            $table->decimal('total_discounts', 8, 2)->nullable();
            $table->decimal('payable_liquid', 8, 2)->nullable();
            $table->foreign('procedure_id')->references('id')->on('procedures');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
        Schema::create('discount_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('discount_type_id')->unsigned();
            $table->string('name')->nullable();
            $table->decimal('percentage', 8, 2)->nullable();
            $table->foreign('discount_type_id')->references('id')->on('discount_types');
            $table->timestamps();
        });
        Schema::create('discount_payroll', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('payroll_id')->unsigned();
            $table->bigInteger('discount_id')->unsigned();
            $table->decimal('amount', 8, 2)->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->foreign('payroll_id')->references('id')->on('payrolls');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_payroll');
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('discount_types');
        Schema::dropIfExists('payrolls');
        Schema::dropIfExists('management_entities');
        Schema::dropIfExists('contract_employee');
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('charges');
        Schema::dropIfExists('units');
        Schema::dropIfExists('directions');
        Schema::dropIfExists('employee_types');
        Schema::dropIfExists('group_jobs');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('procedures');
        Schema::dropIfExists('months');
    }
}

