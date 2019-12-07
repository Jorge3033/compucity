<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','cartId','payModeId'];
}
