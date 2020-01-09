<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class user extends Controller
{
    public function login(Request $request){
        $username = $request->username;
        $password = md5($request->password);

        $user = ModelUser::where('username',$username)->first();
        if($user){
            $pass = ModelUser::where('password',$password)->first();
            if ($pass){
                Session::put('user',$user->username);
                Session::put('pass',$pass->password);
                Session::put('login',TRUE);
                return redirect('/admin');
            }
            else{
                return redirect('/#login-section')->with('alert','Password Salah');
            }

        }
        else{
            return redirect('/#login-section')->with('alert','Username Salah');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/#home-section');
    }

    public function home(){
        $user = ModelUser::all();
        return View::make('myadmin.content.user')->with('data',$user);
    }

    public function add(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = md5($request->password);
        
        $user = ModelUser::where('username',$username)->first();

        if($user){
            return redirect('\user')->with('alert','Username sudah ada, silahan ganti username dengan yang lain');
        }
        else{
            $user = new ModelUser;
            $user->username = $username;
            $user->password = $password;
            $user->save();

            return redirect('\user')->with('alert-success','Berhasil tambah akun');
        }
        
    }

    public function edit(Request $request){

        $this->validate($request, [
            'id' => 'required',
            'username_before' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $id = $request->id;
        $username_before = $request->username_before;
        $username = $request->username;
        $password = $request->password;
        $data = $request->all();

        $user = ModelUser::where('username',$username)
                        ->where('username','!=',$username_before)
                        ->first();

        if($user){
            return redirect('\user')->with('alert','Username sudah ada, silahan ganti username dengan yang lain');
        }
        else{
            $user = ModelUser::find($id);
            $user->username = $username;
            $user->password = $password;
            $user->save();

            return redirect('\user')->with('alert-success','Berhasil ubah akun');
        }
        
    }

    public function delete(Request $request){

        $this->validate($request, [
            'id' => 'required'
        ]);
        
        $id = $request->id;

        $user = ModelUser::find($id);
        $user->delete();

        return 'succes';
    }

}
