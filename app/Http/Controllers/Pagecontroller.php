<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Model\khachhang;
use Sentinel;
session_start();
class Pagecontroller extends Controller
{
    
    public function getDangky()
    {   $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
		$cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.dangky')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }
    
    public function postdangky(Request $req)
    {
    
        $this->validate($req,
            [
                    'email'=>'required|email|unique:khachhang,email',
                    'password'=>'required|min:6|max:20',
                    'name'=>'requierd',
            ],  
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng của email vd: abc@gmail.com',
                'email.unique'=>'Email này đã được sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',  
                'password.min'=>'Mật khẩu yêu cầu 6 ký tự trở lên',
                'password.max'=>'Mật khẩu không quá 20 ký tự'
             ] );
        $user = new user ();
        $user->tenkh =$req->fullname ;
        $user->email =$req->email;
        $user->matkhau =md5($req->password);
        $user->sodienthoai =$req->phone ;
        $user->diachi=$req->address ;
        $user->save();
        return redirect()->back()->with('thanhcong','Đăng ký tài khoản thành công');

    }
    
    public function getDangnhap()
    {   	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
        return view('pages.dangnhap')->with('brand_product',$brand_product)->with('cate_product',$cate_product);
    }

    public function postDangnhap(Request $req)
    {  
        //dd($re->all());
        $email = $req->email;
        $matkhau = $req->matkhau;
        $ten=$req->tenkh;
        $result = DB::table('khachhang')->where('email',$email)->where('matkhau',$matkhau)->first();//lay gioi han 1 user
        if($result) // check login chưa
        {   
            Session()->put('email',$result->email);
            Session()->put('tenkh',$result->tenkh);
            //Session()->put('password',$result->password);
            Session()->put('diachi',$result->diachi);
            Session()->put('makh',$result->makh);
            Session()->put('sodienthoai',$result->sodienthoai);

            return Redirect::to('trang-chu');
        }
        else
             Session()->put('message','mat khau or tai khoan sai ');
             return Redirect::to('dangnhap');

    }

    public function getDangxuat()
    {
        Session()->put('email',null);
        Session()->put('makh',null);
        Session()->put('tenkh',null);
        Session()->put('sodienthoai',null);


        return Redirect::to('trang-chu');
    }

    public function getThongtin($id_user)
    {
        $cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $brand_product = DB::table('nhasx')->orderby('mansx','desc')->get();
       
        if($id_user)
        {
            return view('pages.thongtin')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        } 
    
    }

    // public function getGiohang()
    // {
    //     return view('pages.giohang');   
    // }
}
