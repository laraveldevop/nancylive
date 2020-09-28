<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table ='history';
    protected $primaryKey='id';
    protected $fillable =['Order_id','user_id','product_id','total','transaction_id','status','video_id','single_video_id','video_count','category_id','stat','payment','expire_date'];
}
