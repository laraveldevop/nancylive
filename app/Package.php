<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table ="package";
    protected $primaryKey = "id";
    protected $fillable =['name','price','module_type','category_id','content_count','detail','year','month','day','count_duration','time_method'];

}
