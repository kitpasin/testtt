<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use PhpParser\Node\Expr\Cast\Object_;

class ProductController extends Controller
{
    public function ProductPage() {

        // print_r(session("id"));

        $data = Product::get()->all();

        return view('product', [
            'products' => $data
        ]);
    }

    public function createProduct(Request $req) {

        $param = $req->all();
        try {

            $create = new Product();
            $create->name = $param['name'];
            $create->price = $param['price'];
            $create->quantity = $param['quantity'];
            $create->detail = $param['detail'];
            $create->status = $param['status'];

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

    public function editProduct($id) {

        $edit = Product::where("id", $id)->first();

        return response([
            'message' => 'success',
            'description' => 'editing',
            'edit' => $edit
        ], 200);
    }


    public function deleteProduct($id) {

        $delete = Product::where("id", $id)->delete();

        return response([
            'message' => 'success',
            'description' => 'Deleted'
        ]);
    }
  
    public function updateProduct(Request $req) {

        $param = $req->all();
        try {
            $getid = Product::where("id", $param['hiddenid'])->first();

            $getid->name = $param['name'];
            $getid->price = $param['price'];
            $getid->quantity = $param['quantity'];
            $getid->detail = $param['detail'];
            $getid->status = $param['status'];
            $getid->save();
            $userinfo = Product::get();
            
            
            return response([
                'message' => 'success',
                'description' => 'Create success',
                'userinfo' => $userinfo
            ], 201);
        } catch (Exception $e) {
            return response([
                "message" => 'error',
                'description' => 'Parameter is invalid',
                'errorsMessage' => $e->getMessage()
            ], 501);
            
        }
    }
}
