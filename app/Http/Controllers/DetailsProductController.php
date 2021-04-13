<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;
class DetailsProductController extends Controller
{
    public function details_product()
    {   
    	$details_product = DB::table('chitietdh')
    	->join('trangthai','trangthai.trangthai','=','chitietdh.trangthai')->get();


        $manager_details_product = view('admin.details-product')->with('details_product',$details_product);
        return view('admin_layout')->with('admin.details-product',$manager_details_product);
    	
    }
    
}
