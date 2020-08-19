<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthClients extends Model
{
    protected $table ='oauth_clients';
    protected $primaryKey = 'id';
    protected $fillable =['name','secret'];
}
