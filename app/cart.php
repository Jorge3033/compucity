<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','userId','productId','total','status'];
}
