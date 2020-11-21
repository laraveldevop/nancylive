<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRole extends Model
{
    protected $table = 'sub_role';
    protected $primaryKey = 'role_id';
    protected $fillable = ['role','slug'];
}
