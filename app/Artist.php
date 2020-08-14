<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table ='artist';
    protected $primaryKey= 'id';
    protected $fillable = ['artist_name','email','city','firm_address','phone','about','facebook','instagram','youtube','image','image_id','video','rate','created_at','updated_at'];
}
