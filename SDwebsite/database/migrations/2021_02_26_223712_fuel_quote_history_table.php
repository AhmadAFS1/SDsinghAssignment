<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuelQuoteHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $timestamps = false;
    public function up()
    {
        Schema::create('quote_histories', function($t) {
            $t -> increments('id');
            $t -> float('Gallons', 200)->nullable();
            $t -> string('Address', 500)->nullable();
            $t -> timestamp('start')->nullable();
            $t -> float('Suggested_Price')->nullable();
            $t -> float('Due')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quote_histories');
    }
}
