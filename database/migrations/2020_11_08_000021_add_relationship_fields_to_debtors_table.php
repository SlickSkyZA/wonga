<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDebtorsTable extends Migration
{
    public function up()
    {
        Schema::table('debtors', function (Blueprint $table) {
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_2244603')->references('id')->on('statuses');
            $table->unsignedInteger('debt_type_id');
            $table->foreign('debt_type_id', 'debt_type_fk_2244607')->references('id')->on('categories');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2549448')->references('id')->on('users');
        });
    }
}
