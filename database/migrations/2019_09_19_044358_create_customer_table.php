<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('customer'))
        {
            Schema::create('customer', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('firstname', 100);
                $table->string('lastname', 100);
                $table->string('adress', 255);
                $table->integer('zip_code');
                $table->string('city', 255);
                $table->string('country', 100);
                $table->string('driving_licence', 255);
                $table->enum('role',['admin','anonym','buyer']);
                $table->string('token', 255);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
