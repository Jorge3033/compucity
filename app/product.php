<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $primaryKey='id';
	protected $fillable=['id','name','maker','categoryId','price','description','photo1','photo2','status'];
}
