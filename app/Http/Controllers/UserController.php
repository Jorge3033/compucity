<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
class UserController extends Controller
{
	 public function reportControl(){
    	$report= user::where('status','!=','activo')->get();
    	return view('system.admin.tables.users.control')
    				->with('report',$report);
    }

    public function report(){
    	$report= user::where('status','=','activo')->get();
    	return view('system.admin.tables.users.report')
    				->with('report',$report); 
    }

    public function formUp(){

    	return view('system.admin.tables.users.up');
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
    	$user = new user;
    	$user->id=$id;
    	$user->name=$r->nombre;
    	$user->lastName=$r->apellidos;
    	$user->mail=$r->correo; 
    	$user->password=$r->contrasena;
    	$user->status=$r->estado;
    	$user->photo=$img2;
    	$user->save();

    	$nombre=$r->nombre;
    	$accion="Registrado";
    	
    	return view('system.admin.tables.users.menssaje')
    				->with('nombre',$nombre)
    				->with('accion',$accion); 

    } 

    public function formModify($id){
    	$consulta=user::where('id','=',$id)->get();
    	return view('system.admin.tables.users.modify')
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

    	$user = user::find($r->id);
    	$user->name=$r->nombre;
    	$user->lastName=$r->apellidos;
    	$user->mail=$r->correo; 
    	$user->password=$r->contrasena;
    	$user->status=$r->estado;
    	if ($file !="") {
    		$user->photo=$img2;    		
    	}
    	$user->save();

      
    	$nombre=$r->nombre;
    	$accion="Modificado";
    	return view('system.admin.tables.users.menssaje')
                    ->with('nombre',$nombre)
    				->with('accion',$accion);
    }

    public function lock($id){
    	$user = user::find($id);
    	$user->status='bloqueado';
    	$user->save();
    	return redirect()->route('reportUser');
    }
    public function unLock($id){
    	$user = user::find($id);
    	$user->status='activo';
    	$user->save();
    	return redirect()->route('reportUserControl');
    }
}
