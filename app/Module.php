<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected  $table = 'module';
    protected $primaryKey = 'id';
    protected $fillable = ['module_name','detail'];
}
