<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CartController extends Controller
{


    public function giohang(Request $request){

    	$product_ma = $request->product_hidden;
    	$soluong = $request->qty;

    	$product_info = DB::table('sanpham')->where('masp',$product_ma)->first();


        $data['id'] = $product_info->masp;
        $data['qty'] = $soluong;
        $data['name'] = $product_info->tensp;
        $data['price'] = $product_info->gia;
        $data['weight'] = "123";
        $data['options']['image'] = $product_info->hinh;
        
        Session()->put('id',$product_info->masp);

        Cart::add($data);

        return Redirect::to('/show_giohang');
    }

    public function show_giohang(){
    	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
        $cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();

        return view('pages.giohang.show_giohang')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
    }

    public function capnhat_cart_qty(Request $request){
    	$rowId = $request->rowId_cart;
    	$qty = $request->quantity_cart;
        Cart::update($rowId, $qty);
    	return Redirect::to('/show_giohang');
    }

    public function delete_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show_giohang');
    }
}
