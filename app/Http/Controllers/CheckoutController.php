<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
	// public function login_checkout(){
	// 	$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
	// 	$cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
	// 	return view('pages.thanhtoan.login_checkout')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
	// }

	public function add_customer(Request $request){

		$data = array();
		$data['tenkh']=$request->name;
		$data['sodienthoai']=$request->phone;
		$data['email']=$request->email;
		$data['matkhau']=$request->pass;
		$data['diachi']=$request->address;

		$customer = DB::table('khachhang')->insertGetId($data);

		Session()->put('makh',$customer);
		Session()->put('tenkh',$request->name);

		return Redirect::to('/checkout');
	}

	public function checkout(){

		$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
		$cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
		
		return view('pages.thanhtoan.show_checkout')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);
	}

	public function save_checkout(Request $request){

		$data = array();
				$data['ten']=$request->ten;

		$data['email']=$request->email;
		$data['diachi']=$request->diachi;
		$data['sdt']=$request->sdt;
		$data['note']=$request->note;

		$shipping = DB::table('thanhtoan')->insertGetId($data);

		Session()->put('id',$shipping);

		return Redirect::to('/payment');
	}

	public function payment(){

		$cate_product = DB::table('loaisp')->orderby('maloai','desc')->get();
		$cate_brand = DB::table('nhasx')->orderby('mansx','desc')->get();
		return view('pages.thanhtoan.payment')->with('cate_product',$cate_product)->with('brand_product',$cate_brand);

	}

	public function order_place(Request $request){
		//insert hinhthuc

		// $data = array();
		// $data['hinhthuc']=$request->payment_option;
		// $data['tinhtrang']="Đang chờ xử lý";
		
		// $payment_id = DB::table('hinhthuc')->insertGetId($data);
		
		//insert order
		
    	
	
		$order_data = array();
		$order_data['makh']=Session::get('makh');
		$order_data['masp']=Session::has('masp');
		$order_data['gia']=Cart::total();
		$order_data['trangthai']="0";

			
		$order_id = DB::table('donhang')->insertGetId($order_data);
		
		// //insert order
		// foreach ($content as $v_content) {
		// 	$order_data = array();
		// 	$order_data['makh']=Session::get('makh');
		// 	$order_data['ma_tt']=Session::get('ma_tt');
		// 	$order_data['ma_ht']=$payment_id;
		// 	$order_data['gia']=Cart::total();
		// 	$order_data['trangthai']="Đang chờ xử lý";
		// 	$order_data['makh']=$request->payment_option;
			
		// 	$order_id = DB::table('donhang')->insertGetId($data);
		// }

		return Redirect::to('/payment');

	}

	public function logout_checkout(){
		Session()->flush();
		return Redirect('/login_checkout');
	}

	public function login_customer(Request $request){

		$email = $request->email;
		$password = $request->password;

		$result = DB::table('khachhang')->where('email', $email)->where('matkhau', $password)->first();

		if($result){
			Session()->put('makh',$result->id);
			return Redirect::to('/checkout');
		}else{
			return Redirect::to('/login_checkout');
		}

	}
}