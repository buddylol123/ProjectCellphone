<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//front end
Route::get('/', 'HomeController@index');
Route::get('/trang-chu','HomeController@index');

//back end 
Route::get('/admin','Admincontroller@index');
Route::get('/dash','Admincontroller@show_dashboard');
Route::post('/admin-dashboard','Admincontroller@dash_board');
//category
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/del-category-product/{category_product_id}','CategoryProduct@del_category_product');

Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');