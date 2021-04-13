<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function index(){
    	
    	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $all_product = DB::table('sanpham')->orderby('masp','desc')->limit(9)->get();

        return view('pages.home')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('all_product',$all_product);
       
    }

    public function search(Request $request){

    	// $keywords = $request->keywords_submit;

    	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        $search_product = DB::table('sanpham')->where('tensp', 'like', '%'.$request->keywords_submit.'%')->get();

        return view('pages.sanpham.search')->with('cate_product',$cate_product)->with('brand_product',$cate_brand)->with('search_product', $search_product);
       
    }
}
