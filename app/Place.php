<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{

     protected $fillable = ['title', 'description', 'extra_info'];
     protected $table = 'places';
}
