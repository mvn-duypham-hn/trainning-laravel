<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJfcompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jfcompanies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jfcpn_usr',30)->unique();
            $table->string('password',30);
            $table->longText('jfcompanyname');
            $table->longText('jfcompanyaddress');
            $table->string('emailofjfcompany',50)->unique();
            $table->string('jfphonenumber',30)->unique();
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
        Schema::dropIfExists('jfcompanies');
    }
}
