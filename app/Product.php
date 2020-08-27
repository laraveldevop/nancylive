<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','product_name','detail','price','video','token','quantity','created_at','updated_at'];

    public function productImage()
    {
        return $this->belongsTo ('App\ProductImage');
    }
}
