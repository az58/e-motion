<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->UnsignedBigInteger('customer_id')->unsigned();
            $table->UnsignedbigInteger('vehicle_id')->unsigned();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('state',100)->nullable();
            $table->string('booking_price',20)->nullable();
            $table->string('cb_number',20)->nullable();
            $table->string('cb_cvv', 4)->nullable();
            $table->string('cb_expire', 5)->nullable();

            $table->foreign('customer_id')->references('id')->on('customer')
                ->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle')
                ->onDelete('cascade');

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
        Schema::dropIfExists('booking');
    }
}
