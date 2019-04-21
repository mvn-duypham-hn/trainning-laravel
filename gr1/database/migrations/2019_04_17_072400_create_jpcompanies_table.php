<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJpcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpcompanies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jpcpn_usr',30)->unique();
            $table->string('password',30);
            $table->string('cpn_name',50);
            $table->longText('cpn_address');
            $table->string('cpn_email',50)->unique();
            $table->string('cpn_phone',50)->unique();
            $table->longText('cpn_web');
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
        Schema::dropIfExists('jpcompanies');
    }
}
