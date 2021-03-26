<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Brandcontroller extends Controller
{
    public function add_brand_product()
    {
        return view ('admin.add-brand-product');
    }
    public function all_brand_product()
    {   $all_brand_product = DB::table('nhasx')->get();
        $manager_brand_product = view('admin.all-brand-product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand-product',$manager_brand_product);
    }
    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['mansx'] = $request->brand_product_id;
        $data['tennsx'] = $request->brand_product_name;
        $data['xuatxu'] = $request->brand_product_sx;
        DB ::table('nhasx')->insert($data);
        Session::put('message','Them nha sx thanh cong');
        return Redirect::to('add-brand-product');
    }
    public function edit_brand_product($brand_product_id)
    {
        $edit_brand_product = DB::table('nhasx')->where('mansx',$brand_product_id)->get();
        $manager_brand_product = view('admin.edit-brand-product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand-product',$manager_brand_product);
        
    }
    public function update_brand_product($brand_product_id,Request $request)
    {
        $data = array();
        $data['tennsx'] = $request->brand_product_name;
        $data['xuatxu'] = $request->brand_product_sx;

        DB::table('nhasx') ->where('mansx',$brand_product_id)->update($data);
        Session::put('message','cap nhat ten thuong hieu thanh cong thanh cong');
        return Redirect::to('all-brand-product');

    }
    public function del_brand_product($brand_product_id)
    {    
        DB::table('nhasx') ->where('mansx',$brand_product_id)->delete();
        Session::put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-brand-product');

    } 
}
