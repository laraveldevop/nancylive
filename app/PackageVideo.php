<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageVideo extends Model
{
    protected $table = 'package_video';
    protected $primaryKey = 'id';
    protected $fillable = ['user_package_id','package_id','category_id','video_id','status'];
}
