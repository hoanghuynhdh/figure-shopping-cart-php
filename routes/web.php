<?php

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

Route::get('/', function () {
	return view('welcome');
});

Route::get('index',[
	'as' => 'trang-chu',
	'uses' => 'PageController@getIndex'
]);

Route::get('gioi-thieu',[
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioithieu'
]);

Route::get('lien-he',[
	'as' => 'lienhe',
	'uses' => 'PageController@getLienhe'
]);
Route::get('loai-san-pham/{type}',[
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);
Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);
Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ky',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);
Route::get('search',[
	'as' => 'search',
	'uses' => 'PageController@getSearch'
]);
Route::group(['prefix' => 'admin'], function () {
	Route::group(['prefix' => 'loaisanpham'], function () {
		Route::get('danhsach/{type}','loaisanphamController@getDanhsach');

		Route::get('sua/{id}','loaisanphamController@getSua');
		Route::post('sua/{id}','loaisanphamController@postSua');

		Route::get('them','loaisanphamController@getThem');
		Route::post('them','loaisanphamController@postThem');

		Route::get('xoa/{id}','loaisanphamController@getXoa');
	});
	Route::group(['prefix' => 'sanpham'], function () {
		Route::get('danhsach/{type}','sanphamController@getDanhsach');

		Route::get('sua/{id}','sanphamController@getSua');
		Route::post('sua/{id}','sanphamController@postSua');

		Route::get('them','sanphamController@getThem');
		Route::post('them','sanphamController@postThem');

		Route::get('xoa/{id}','sanphamController@getXoa');
	});
	
	Route::group(['prefix' => 'user'], function () {
		Route::get('danhsach','userController@getDanhsach');

		Route::get('sua/{id}','userController@getSua');
		Route::post('sua/{id}','userController@postSua');

		Route::get('them','userController@getThem');
		Route::post('them','userController@postThem');

		Route::get('xoa/{id}','userController@getXoa');
	});
		
	Route::group(['prefix' => 'cart'], function () {
		Route::get('danhsach','cartController@getDanhsach');
		Route::get('chitiet/{id}','cartController@getChitiet');
		Route::get('xoa/{id}','cartController@getxoa');
	});
});