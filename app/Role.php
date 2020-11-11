<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug'];
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
