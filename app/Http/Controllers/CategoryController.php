<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
	public function reportControl(){
		return view('system.admins.tables.categories.control');
	}
		
    public function report(){
    	$report=category::all();
		return view('system.admin.tables.categories.report')
					->with('report',$report);

    }

    public function formUp(){
		return view('system.admin.tables.categories.up');

    }

    public function up(Request $r){
    	 $this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z, ]*$/'],
        ]);
    	$id=null; 
    	$category = new category;
    	$category->id=$id;
    	$category->name=$r->nombre;
    	$category->status='activo';
    	$category->save(); 

    	$nombre=$r->nombre;
    	$accion="Registrado";
    	return view('system.admin.tables.categories.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion);

    }

    public function formModify($id){
    	$consulta=category::where('id','=',$id)
    						->get();

    	return view('system.admin.tables.categories.modify')
    				->with('consulta',$consulta[0]);					
    }

    public function modify(Request $r){
    	$this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z, ]*$/'],
        ]);
    	$id=null; 
    	$category =category::find($r->id);
    	$category->name=$r->nombre;
    	$category->save(); 

    	$nombre=$r->nombre;
    	$accion="Actualizado";
    	return view('system.admin.tables.categories.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion);
    }

    
}
