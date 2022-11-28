<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function LoginPage(){

        // print_r(session("id"));

        $data = Login::get()->all();

        return view('login',[
            'logins' => $data
        ]);
    }

    public function loginUser(Request $req){

        // $req->validate([
        //     'username'=>'required',
        //     'password'=>'required|min:5|max:12'
        // ]);
        $login = Login::where('username', '=', $req->username)->first();
        if($login){
            
        }else{
            return back()->with('Fail', 'Something when wrong');
        }

    }
}
