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
            $table->date('state')->nullable();
            $table->date('booking_price')->nullable();
            $table->date('cb_number')->nullable();
            $table->date('cb_cvv')->nullable();
            $table->date('cb_expire')->nullable();

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
