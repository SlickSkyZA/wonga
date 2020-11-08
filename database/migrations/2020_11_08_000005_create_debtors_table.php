<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtorsTable extends Migration
{
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_number')->unique();
            $table->string('name');
            $table->string('id_number')->unique();
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();
            $table->decimal('initial_amount', 15, 2)->nullable();
            $table->decimal('payments', 15, 2);
            $table->decimal('outstanding', 15, 2);
            $table->string('correspondence')->nullable();
            $table->date('date')->nullable();
            $table->string('notes')->nullable();
            $table->decimal('charges', 15, 2)->nullable();
            $table->date('arrear_period_start');
            $table->date('arrear_period_end')->nullable();
            $table->string('creditor');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
