<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class Admincontroller extends Controller
{
    public function index(){

        return view('admin_login');
    }

    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dash_board(Request $request){
        $admin = $request->admin;
        $matkhau = $request->matkhau;
        
        $result = DB::table('admin')->where('admin',$admin)->where('matkhau',$matkhau)->first();//lay gioi han 1 user
        if($result)
        {
                Session()->put('admin',$result->admin);
                Session()->put('manv',$result->manv);
                Session()->put('tennv',$result->tennv);
                Session()->put('diachi',$result->diachi);
                Session()->put('sodienthoai',$result->sodienthoai);

                return Redirect::to('/dash');
            

        }
        else{
            Session()->put('message','mat khau or tai khoan sai ');
            return Redirect::to('/admin');
        }

    }
    public function prof($id)
    {
        if($id)
        {
            return view('admin.detail-user-admin');
        }
    }
    public function logout()
    {
        Session()->put('admin',null);
        Session()->put('manv',null);
        return Redirect::to('/logout');
    }

}
