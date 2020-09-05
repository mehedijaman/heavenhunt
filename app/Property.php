<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Facades\DB;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Property extends Model
{
    use SoftDeletes, HasUserStamps;

    protected $dates = ['deleted_at'];

    protected $table = "properties";

    protected $fillable = [
    	'Title',
    	'Description',
    	'Address',
    	'Location',
    	'GoogleMapLocation',
    	'Category',
    	'Type',
    	'Price',
    	'Area',
    	'Bedroom',
    	'Bathroom',
    	'Garage',
    	'Balcony',
    	'TV',
    	'AC',
    	'Wifi',
    	'Telephone',
    	'Parking',
    	'Jacuzzi',
    	'Pool',
    	'DoubleBed',
    	'Alarm',
    	'Iron',
    	'Gym',
    	'FloorPlan',
    	'Photo1',
    	'Photo2',
    	'Photo3',
    	'Photo4',
    	'Photo5',
    	'VideoLink',
    	'IsFeatured',
    	'Status'
    ];
}
