<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function RegisterPage(){

        // print_r(session("id"));

        $data = Register::get()->all();

        return view('register',[
            'user' => $data
        ]);
    }

    public function registerUser(Request $req) {

        // $req->validate([
        //     'username'=>'required',
        //     'password'=>'required|min:5|max:12'
        // ]);

        $param = $req->all();
        try {

            $create = new Register();
            $create->username = $param['username'];
            $create->password = $param['password'];

            $create->save();
            Session::push('id', $create->id);

            return response([
                'message' => 'success',
                'description' => 'Create success'
            ], 201);
        } catch (Exception $e) {
            return response([
                "message" => 'error',
                'description' => 'Parameter is invalid',
                'errorsMessage' => $e->getMessage()
            ], 501);
        }
    }

    public function deleteUser($id) {

        $delete = Register::where("id", $id)->delete();

        return response([
            'message' => 'success',
            'description' => 'Deleted'
        ]);
    }

}
