<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Facades\DB;
use Sqits\UserStamps\Concerns\HasUserStamps;

class Testimonial extends Model
{
    use SoftDeletes, HasUserStamps;

    protected $dates = ['deleted_at'];

    protected $table = "testimonials";

    protected $fillable = [
    	'Name',
    	'Description',
    	'Star',
    ];
}
