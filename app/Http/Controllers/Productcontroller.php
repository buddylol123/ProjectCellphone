<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Productcontroller extends Controller
{
    public function add_product()
    {   
        $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        
        return view ('admin.add-product')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    public function all_product()
    {   $all_product = DB::table('sanpham')->orderby('masp','desc')->get();
        $manager_product = view('admin.all-product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all-product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $data = array();
        $data['tensp'] = $request->product_name;
        $data['gia'] = $request->product_price;
        $data['hinh'] = $request->product_img;
       
        $data['mansx'] = $request->product_mansx;
        $data['maloai'] = $request->product_maloai;
    
        
        $get_img = $request->file('product_img');
        if($get_img !='' )
        {   $get_name_img = $get_img->getClientOriginalExtension();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_name_img;
            $get_img->move('public/upload/img_product',$new_img);
            $data['hinh'] = $new_img;
            DB ::table('sanpham')->insert($data);
            Session()->put('message','Them san pham thanh cong');
            return Redirect::to('add-product');
        }

         $data['hinh']='NULL';
         DB ::table('sanpham')->insert($data);
         Session()->put('message','Them san pham thanh cong');
         return Redirect::to('add-product');
    }
    public function edit_product($product_id)
    {
        $edit_product = DB::table('sanpham')->where('masp',$product_id)->get();
        $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $manager_product = view('admin.edit-product')->with('edit_product',$edit_product);

        return view('admin_layout')->with('admin.edit-product',$manager_product)->with('admin.edit-product',$cate_product)->with('admin.edit-product',$cate_brand);
        
    }
    public function update_product($brand_product_id,Request $request)
    {
        $data = array();
        $data['tennsx'] = $request->brand_product_name;
        $data['xuatxu'] = $request->brand_product_sx;

        DB::table('nhasx') ->where('mansx',$brand_product_id)->update($data);
        Session()->put('message','cap nhat ten thuong hieu thanh cong thanh cong');
        return Redirect::to('all-product');

    }
    public function del_product($brand_product_id)
    {    
        DB::table('nhasx') ->where('mansx',$brand_product_id)->delete();
        Session()->put('message','cap nhat danh muc thanh cong');
        return Redirect::to('all-product');

    } 
}
