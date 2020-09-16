<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='order';
    protected $primaryKey = 'id';
    protected $fillable =['user_id','product_id','price','total','transaction_id','status'];
}
