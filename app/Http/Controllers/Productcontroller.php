<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Productcontroller extends Controller
{
    public function add_product()
    {
        return view ('admin.add-product');
    }
    public function all_product()
    {   $all_product = DB::table('sanpham')->get();
        $manager_product = view('admin.all-product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all-product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['mansx'] = $request->brand_product_id;
        $data['tennsx'] = $request->brand_product_name;
        $data['xuatxu'] = $request->brand_product_sx;
        DB ::table('nhasx')->insert($data);
        Session::put('message','Them nha sx thanh cong');
        return Redirect::to('add-product');
    }
    public function edit_product($brand_product_id)
    {
        $edit_product = DB::table('nhasx')->where('mansx',$brand_product_id)->get();
        $manager_product = view('admin.edit-product')->with('edit_product',$edit_product);
        return view('admin_layout')->with('admin.edit-product',$manager_product);
        
    }
    public function update_product($brand_product_id,Request $request)
    {
        $data = array();
        $data['tennsx'] = $request->brand_product_name;
        $data['xuatxu'] = $request->brand_product_sx;

        DB::table('nhasx') ->where('mansx',$brand_product_id)->update($data);
        Session::put('message','cap nhat ten thuong hieu thanh cong thanh cong');
        return Redirect::to('all-product');

    }
    public function del_product($brand_product_id)
    {    
        DB::table('nhasx') ->where('mansx',$brand_product_id)->delete();
        Session::put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-product');

    } 
}
