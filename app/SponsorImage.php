<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorImage extends Model
{
    protected $table = 'sponsor_image';
    protected $primaryKey = 'id';
    protected $fillable =['sponsor_id','image'];
}
