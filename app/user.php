<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','name','lastName','mail','password','status','photo',];
}
