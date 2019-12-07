<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payMode extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','name','status'];
}
