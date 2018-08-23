<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->unique();
            $table->string('mark');
            $table->string('model');
            $table->enum('type', ['vuc', 'toco', 'truck', 'cavalo mecanico', 'cavalo mecanico trucado', 'bitruck']);
            $table->double('km_current');
            $table->string('year')->nullable();
            $table->string('plate')->unique();
            $table->string('chassis_number')->unique()->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('sale_value')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
