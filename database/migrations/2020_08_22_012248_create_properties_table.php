<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('Title')->nullable();
            $table->longText('Description')->nullable();
            $table->string('Address')->nullable();
            $table->string('Location')->nullable();
            $table->string('GoogleMapLocation')->nullable();
            $table->string('Category')->nullable();
            $table->string('Type')->nullable();
            $table->string('Price')->nullable();
            $table->string('Area')->nullable();
            $table->string('Bedroom')->nullable();
            $table->string('Bathroom')->nullable();
            $table->string('Garage')->nullable();
            $table->string('Balcony')->nullable();
            $table->string('TV')->nullable();
            $table->string('AC')->nullable();
            $table->string('Wifi')->nullable();
            $table->string('Telephone')->nullable();
            $table->string('Parking')->nullable();
            $table->string('Jacuzzi')->nullable();
            $table->string('Pool')->nullable();
            $table->string('DoubleBed')->nullable();
            $table->string('Alarm')->nullable();
            $table->string('Iron')->nullable();
            $table->string('Gym')->nullable();
            $table->string('FloorPlan')->nullable();
            $table->string('Photo1')->nullable();
            $table->string('Photo2')->nullable();
            $table->string('Photo3')->nullable();
            $table->string('Photo4')->nullable();
            $table->string('Photo5')->nullable();
            $table->string('VideoLink')->nullable();
            $table->string('IsFeatured')->nullable();

            $table->boolean('Status')->nullable();
            $table->userstamps();
            $table->softUserstamps();            
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
