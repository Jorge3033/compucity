<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;

class AdminController extends Controller
{
    public function reportControl(){
    	$report= admin::where('status','!=','activo')->get();
    	return view('system.admin.tables.admins.control')
    				->with('report',$report);
    }

    public function report(){
    	$report= admin::where('status','=','activo')->get();
    	return view('system.admin.tables.admins.report')
    				->with('report',$report); 
    }

    public function formUp(){

    	return view('system.admin.tables.admins.up');
    }

    public function up(Request $r){
    	$this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z]*$/'],
            'apellidos'=>['regex:/^[A-Z,a-z]*[A-Z,a-z, ]*$/'],
            'correo'=>'email',
            'contrasena'=>['regex:/^[A-Z,a-z,1-9]{8}[A-Z,a-z,1-9]*$/'],
            'foto'=>'mimes:jpeg,png,gif,jpg', 
        ]);
 
       $file=$r->file('foto');
       if ($file !="") {
       	$ldate=date('Ymd_His_');
        $img=$file->getClientOriginalName();
        $img2=$ldate.$r->nombre.$img;
        \Storage::disk('photos')->put($img2,\File::get($file));
       }else{
       	 $img2="noPhotoMan.png";
       }
       
        $id=null;
    	$admin = new admin;
    	$admin->id=$id;
    	$admin->name=$r->nombre;
    	$admin->lastName=$r->apellidos;
    	$admin->mail=$r->correo; 
    	$admin->password=$r->contrasena;
    	$admin->status=$r->estado;
    	$admin->photo=$img2;
    	$admin->save();

    	$nombre=$r->nombre;
    	$accion="Registrado";
    	
    	return view('system.admin.tables.admins.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion); 

    } 

    public function formModify($id){
    	$consulta=admin::where('id','=',$id)->get();
    	return view('system.admin.tables.admins.modify')
    				->with('consulta',$consulta[0]);
    }
    public function modify(Request $r){
    	$this->validate($r,[
            'nombre'=>['regex:/^[A-Z,a-z]*$/'],
            'apellidos'=>['regex:/^[A-Z,a-z]*[A-Z,a-z, ]*$/'],
            'correo'=>'email',
            'contrasena'=>['regex:/^[A-Z,a-z,1-9]{8}[A-Z,a-z,1-9]*$/'],
            'foto'=>'mimes:jpeg,png,gif,jpg', 
        ]);
 		
       $file=$r->file('foto');
       if ($file !="") {
       	$ldate=date('Ymd_His_');
        $img=$file->getClientOriginalName();
        $img2=$ldate.$r->nombre.$img;
        \Storage::disk('photos')->put($img2,\File::get($file));
       }

    	$admin = admin::find($r->id);
    	$admin->name=$r->nombre;
    	$admin->lastName=$r->apellidos;
    	$admin->mail=$r->correo; 
    	$admin->password=$r->contrasena;
    	$admin->status=$r->estado;
    	if ($file !="") {
    		$admin->photo=$img2;    		
    	}
    	$admin->save();

    	$nombre=$r->nombre;
    	$accion="Modificado";
    	
    	return view('system.admin.tables.admins.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion);
    }

    public function lock($id){
    	$admin = admin::find($id);
    	$admin->status='bloqueado';
    	$admin->save();
    	return redirect()->route('reportAdmin');
    }
    public function unLock($id){
    	$admin = admin::find($id);
    	$admin->status='activo';
    	$admin->save();
    	return redirect()->route('reportAdminControl');
    }


}
