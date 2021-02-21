<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $table= 'user_package';
    protected $primaryKey = 'id';
    protected $fillable = ['id','user_id','package_id','video_id','single_video_id','video_count','category_id','stat','transaction_id','payment','expire_date'];
}
