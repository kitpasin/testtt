<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function ProfilePage(){

        print_r(session("id"));

        $data = Profile::get()->all();

        return view('profile',[
            'profiles' => $data
        ]);
    }
    public function createProfile(Request $req){

        $param = $req->all();
        try{

            $create = new Profile();
            $create->name = $param['name']; 
            $create->lastname = $param['lastname']; 
            $create->age = $param['age']; 
            $create->tel = $param['tel']; 
            $create->address = $param['address'];
            $create->birthday = $param['birthday'];

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
    public function deleteProfile($id){

        $delete = Profile::where("id", $id)->delete();

        return response([
            'message' => 'success',
            'description' => 'Deleted'
        ]);
    }
}

