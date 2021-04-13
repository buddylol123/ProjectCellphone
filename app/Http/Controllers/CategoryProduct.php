<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view ('admin.add-category-product');
    }
    public function all_category_product()
    {   $all_category_product = DB::table('loaisp')->get();
        $manager_category_product = view('admin.all-category-product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category-product',$manager_category_product);
    }
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['maloai'] = $request->category_product_id;
        $data['tenloai'] = $request->category_product_name;
        
        DB ::table('loaisp')->insert($data);
        Session()->put('message','Them loai san pham thanh cong');
        return Redirect::to('add-category-product');
    }
    public function edit_category_product($category_product_id)
    {
        $edit_category_product = DB::table('loaisp')->where('maloai',$category_product_id)->get();
        $manager_category_product = view('admin.edit-category-product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category-product',$manager_category_product);
        
    }
    public function update_category_product($category_product_id,Request $request)
    {
        $data = array();
        $data['tenloai'] = $request->category_product_name;
        DB::table('loaisp') ->where('maloai',$category_product_id)->update($data);
        Session()->put('message','Cập nhật danh mục thành công
            ');
        return Redirect::to('all-category-product');

    }
    public function del_category_product($category_product_id)
    {    
        DB::table('loaisp') ->where('maloai',$category_product_id)->delete();
        Session()->put('message','Xóa danh mục thành công');
        return Redirect::to('all-category-product');

    }

    //end function admin page
    public function show_loai_trangchu($maloai){
        
        $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $all_loai = DB::table('sanpham')->join('loaisp', 'sanpham.maloai','=', 'loaisp.maloai')->where('sanpham.maloai', $maloai)->get();

        $cate_name = DB::table('loaisp')->where('loaisp.maloai', $maloai)->limit(1)->get();

        return view('pages.loai.show_loai')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('all_loai',$all_loai)->with('cate_name',$cate_name);
    }
    
}