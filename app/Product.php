<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','product_name','detail','price','video','quantity','created_at','updated_at'];
}
