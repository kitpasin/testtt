<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function HomePage($id, Request $req){
        $data = $this->getData();
        $data = $req->all();

        return view('home',[
            "userId" => $id,
            "data" => $data
        ]);
    }
}
