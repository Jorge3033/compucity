<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
class ProductController extends Controller
{
	public function reportControl(){}
	
    public function report(){
    	$report=product::all();
    	return view('system.admin.tables.products.report') 
    				->with('report',$report); 
    }

    public function formUp(){
    	$categories=category::all();
    	return view('system.admin.tables.products.up')
    				->with('categories',$categories);
    }
    public function up(Request $r){
    	$this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z,0-9]*[A-Z,a-z,0-9, ]*$/'],
            'marca'=>['regex:/^[A-Z,a-z]*[A-Z,a-z, ]*$/'],
            'precio'=>['regex:/^[0-9]*$/'],
            'cantidad'=>['regex:/^[0-9]*$/'],
            'descripcion'=>['regex:/^[A-Z,a-z,0-9]*[A-Z,a-z,0-9, ]*$/'],
            'foto1'=>'required|mimes:jpeg,png,gif,jpg', 
            'foto2'=>'required|mimes:jpeg,png,gif,jpg', 
        ]);
        	
    	$file1=$r->file('foto1');
       	$ldate=date('Ymd_His_');
        $img1=$file1->getClientOriginalName();
        $img11=$ldate.$r->nombre.$img1;
        \Storage::disk('photos')->put($img11,\File::get($file1));
       
       	$file2=$r->file('foto2');
       	$ldate=date('Ymd_His_');
        $img2=$file2->getClientOriginalName();
        $img22=$ldate.$r->nombre.$img2;
        \Storage::disk('photos')->put($img22,\File::get($file2));
 
    	$product=new product();
    	$product->id=null; 	
    	$product->name=$r->nombre;
    	$product->maker=$r->marca;
    	$product->quantity=$r->cantidad;
    	$product->categoryId=$r->categoria;
    	$product->price=$r->precio;
    	$product->description=$r->descripcion;
    	$product->photo1=$img11;
    	$product->photo2=$img22;
    	$product->status=$r->estado;
    	$product->save();

    	$nombre=$r->nombre;
    	$accion="Registrado"; 

    	return view('system.admin.tables.products.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion);

    }

    public function formModify($id){
    	$consulta=product::where('id','=',$id)->get();
    	$categories=category::all();
    	return view('system.admin.tables.products.modify')
    				->with('categories',$categories)
    				->with('consulta',$consulta[0]);

    }
    public function modify(Request $r){

    	$this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z,0-9]*[A-Z,a-z,0-9, ]*$/'],
            'marca'=>['regex:/^[A-Z,a-z]*[A-Z,a-z, ]*$/'],
            'precio'=>['regex:/^[0-9]*$/'],
            'cantidad'=>['regex:/^[0-9]*$/'],
            'descripcion'=>['regex:/^[A-Z,a-z,0-9]*[A-Z,a-z,0-9, ]*$/'],
            'foto1'=>'mimes:jpeg,png,gif,jpg', 
            'foto2'=>'mimes:jpeg,png,gif,jpg', 
        ]);	
    	$file1=$r->file('foto1');
       	if ($file1!="") {
        	$ldate=date('Ymd_His_');
        	$img1=$file1->getClientOriginalName();
        	$img11=$ldate.$r->nombre.$img1;
        	\Storage::disk('photos')->put($img11,\File::get($file1));
        } 
       
       	$file2=$r->file('foto2');
       	if ($file2!="") {
       		$ldate=date('Ymd_His_');
        	$img2=$file2->getClientOriginalName();
        	$img22=$ldate.$r->nombre.$img2;
        	\Storage::disk('photos')->put($img22,\File::get($file2));
 		}
        
        
        

    	$product= product::find($r->id);
    	$product->name=$r->nombre;
    	$product->maker=$r->marca;
    	$product->quantity=$r->cantidad;
    	$product->categoryId=$r->categoria;
    	$product->price=$r->precio;
    	$product->description=$r->descripcion;

    	if ($file1!="") {$product->photo1=$img11;} 	
    	
    	if ($file2!="") {$product->photo2=$img22;}
    	
    	$product->status=$r->estado;
    	$product->save();

    	$nombre=$r->nombre;
    	$accion="Modificado"; 

    	return view('system.admin.tables.products.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion);

    }

    public function lock($id){}
    public function unLock($id){}
}
