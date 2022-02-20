<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_user_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_user_id');
            $table->foreign('report_user_id')->references('id')->on('report_users');
            $table->foreignId('report_type_id');
            $table->foreign('report_type_id')->references('id')->on('report_types');
            $table->tinyText('value');
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
        Schema::dropIfExists('report_user_data');
    }
}
