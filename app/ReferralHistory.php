<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralHistory extends Model
{
    protected $table = 'referral_history';
    protected $primaryKey = 'id';
    protected $fillable = ['stat','status','user_id','referral_code','product_id','magazine_id'];
}
