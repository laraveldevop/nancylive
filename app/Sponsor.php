<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsor';
    protected $primaryKey = 'id';
    protected $fillable =['sponsor_name','email','city','firm_address','phone','about','facebook','instagram','youtube','image','image_id','video','created_at','updated_at'];
}
