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
Route::post('/tim-kiem','HomeController@search');

//Danh mục sản phẩm trang chủ
Route::get('/danhmucsanpham/{maloai}','CategoryProduct@show_loai_trangchu');
Route::get('/thuonghieusanpham/{mansx}','Brandcontroller@show_nhasx_trangchu');
Route::get('/chitietsanpham/{masp}','Productcontroller@chitiet_sanpham');
//back end
Route::get('/admin','Admincontroller@index');
Route::get('/dash','Admincontroller@show_dashboard');
Route::post('/admin-dashboard','Admincontroller@dash_board');
Route::get('/detail-user-admin/{id}','Admincontroller@prof');
//category
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/del-category-product/{category_product_id}','CategoryProduct@del_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
//brand
Route::get('/add-brand-product','Brandcontroller@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','Brandcontroller@edit_brand_product');
Route::get('/del-brand-product/{brand_product_id}','Brandcontroller@del_brand_product');
Route::get('/all-brand-product','Brandcontroller@all_brand_product');
Route::post('/save-brand-product','Brandcontroller@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','Brandcontroller@update_brand_product');
//product
Route::get('/add-product','Productcontroller@add_product');
Route::get('/edit-product/{product_id}','Productcontroller@edit_product');
Route::get('/del-product/{product_id}','Productcontroller@del_product');
Route::get('/all-product','Productcontroller@all_product');
Route::post('/save-product','Productcontroller@save_product');
Route::get('/update-product/{product_id}','Productcontroller@update_product');
Route::get('dangnhap',[
'as'=>'dangnhap',
'uses'=>'Pagecontroller@getDangnhap'
]);
Route::post('dangnhap',[
'as'=>'dangnhap',
'uses'=>'Pagecontroller@postDangnhap'
]);
Route::get('dangky',[
'as'=>'dangky',
'uses'=>'Pagecontroller@getDangky'
]);
Route::post('dangky',[
'as'=>'dangky',
'uses'=>'Pagecontroller@postDangky'
]);
Route::get('dangxuat',[
'as'=>'dangxuat',
'uses'=>'Pagecontroller@getDangxuat'
]);
Route::get('/thongtin/{id_user}','Pagecontroller@getThongtin');

//giỏ hàng
Route::get('/show_giohang','CartController@show_giohang');
Route::post('/giohang','CartController@giohang');
Route::post('/capnhat_cart_qty', 'CartController@capnhat_cart_qty');
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart');
//thanh toán

// Route::get('/login-checkout','CheckoutController@login_checkout');
// Route::get('/logout-checkout','CheckoutController@logout_checkout');
// Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
// Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout','CheckoutController@save_checkout');