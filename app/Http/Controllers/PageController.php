<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;
  
class PageController extends Controller
{

	public function showCategories(){
		$categories=category::select('id','name')
									->get();
		return $categories;							
	}

    public function index(){

    	return view('page.index');
    }

    public function showCategory($id){
    	$consulta=product::where('categoryId','=',$id)->get();

    	$categoria=category::select('name')
    						->where('id','=',$id)->get();
    					
    	return view('page.productByCategory')
    				->with('categoria',$categoria[0])
    				->with('consulta',$consulta);
    }

}
 