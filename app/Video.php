<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    protected $primaryKey = 'id';
    protected $fillable = ['cat_id','artist_id','video_name','video','status','detail','created_at','updated_at'];

}
