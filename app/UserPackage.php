<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $table= 'user_package';
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id','package_id','expire_date'];
}
