<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cd_username',30)->unique();
            $table->string('password',30);
            $table->string('jlpt',30)->nullable();
            $table->string('name',50);
            $table->string('phonenb',30)->unique()->nullable();
            $table->string('emailofcd',50)->unique()->nullable();
            $table->date('dateofbirth');
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
        Schema::dropIfExists('cds');
    }
}
