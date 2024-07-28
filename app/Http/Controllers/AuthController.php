<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{

    function LoginProcess(Request $req){
        if($req != null){
            if(Auth::attempt($req->only('username','password'))){

                $req->session()->regenerate();


                if(Auth()->user()->level == "Admin" ){
                    // dd(Auth());
                    return redirect()->route('Dashboard');
                }else{
                    return back()->with('gagal','Username atau Password anda Salah');
                }
            }else{
                return back()->with('gagal','Username atau Password anda Salah');
            }
        }else{
            return route('Login');
        }
    }

    function logout(){
        Auth::logout();

        return redirect()->route('Login');
    }

    function ResetPassword(Request $req){
        $check = User::where('username','LIKE','%'.$req->username.'%')->get('id')->toarray();

        // dd($check);

        if ($check != null){
            $user = User::findOrFail($check[0]['id']);
            $user->password = Hash::make('password');
            try{
                $user->update();
                return back()->with('sukses','Berhasil Update Password');
            }catch(\Exception $err){
                return back()->with('gagal','Gagal update Password Admin');
            }
        }else{
            return back()->with('gagal','Username Tidak Ditemukan');
        }
    }

}
