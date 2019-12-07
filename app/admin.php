<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','name','lastName','mail','password','status','photo',];
}
