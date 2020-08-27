<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image';
    protected $primaryKey = 'id';
    protected $fillable = ['product_id','image','created_at','updated_at'];

    public function ImageList() {
        return $this->hasMany('App\Product');
 }
}
