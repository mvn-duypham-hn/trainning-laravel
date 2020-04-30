<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jpcompany_id');
            $table->integer('jobfair_id');
            $table->string('jobtype',50);
            $table->longText('jobdescribe');
            $table->longText('salary');
            $table->string('dayoff',50);
            $table->integer('numberneed');
            $table->longText('workplace');
            $table->longText('insurrance');
            $table->string('languagerequire',50);
            $table->longText('employeemodel');
            $table->longText('bonus');
            $table->longText('worktime');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
