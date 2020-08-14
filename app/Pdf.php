<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'pdf';
    protected $primaryKey = 'id';
    protected $fillable = ['cat_id','pdf_name','file','detail','price'];
}
