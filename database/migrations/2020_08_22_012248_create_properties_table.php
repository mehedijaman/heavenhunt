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
            $table->string('For')->nullable();
            $table->string('Type')->nullable();
            $table->string('Category')->nullable();            
            $table->string('BuildingAge')->nullable();
            $table->string('Area')->nullable();
            $table->string('Price')->nullable();            
            $table->string('Room')->nullable();
            $table->string('Bedroom')->nullable();
            $table->string('Bathroom')->nullable();
            $table->string('Balcony')->nullable();
            $table->string('Garage')->nullable();            

            $table->longText('Description')->nullable();  

            $table->string('Address',500)->nullable();
            $table->string('Location')->nullable();
            $table->string('GoogleMapLocation',500)->nullable();

            $table->boolean('Parking')->nullable();
            $table->boolean('TV')->nullable();
            $table->boolean('AC')->nullable();
            $table->boolean('Wifi')->nullable();
            $table->boolean('Telephone')->nullable();            
            $table->boolean('Jacuzzi')->nullable();
            $table->boolean('Pool')->nullable();
            $table->boolean('CentralHeating')->nullable();
            $table->boolean('SeatingPlace')->nullable();
            $table->boolean('WindowCovering')->nullable();
            $table->boolean('DoubleBed')->nullable();
            $table->boolean('Alarm')->nullable();
            $table->boolean('Iron')->nullable();
            $table->boolean('Gym')->nullable();

            $table->string('FloorPlan',500)->nullable();
            $table->string('Photo1',500)->nullable();
            $table->string('Photo2',500)->nullable();
            $table->string('Photo3',500)->nullable();
            $table->string('Photo4',500)->nullable();
            $table->string('Photo5',500)->nullable();
            $table->string('VideoLink',500)->nullable();

            $table->boolean('IsFeatured')->nullable();
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
