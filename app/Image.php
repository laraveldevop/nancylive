<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = ['artist_id','image','created_at','updated_at'];
}
