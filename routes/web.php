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

Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store')->name('login');
Route::get('logout', 'SessionController@destroy')->name('logout');
Route::get('login/{login}/edit','SessionController@edit')->name('edit');//显示修改表单
Route::post('/login/{user}/save', 'SessionController@save')->name('save');//接收添加表单数据


Route::get('users','UsersController@index')->name('users.index');//用户表单
Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
//资源重定向
Route::resource('menucategories', 'MenuCategoriesController');//菜品分类
Route::resource('menus','MenusController');//菜品表


//商户图片上传
Route::post('upload',function (){
   $storage = \Illuminate\Support\Facades\Storage::disk('oss');
   $puthimg = $storage->url($storage->putFile('shop',request()->file('file')));
   return ['puthimg'=>$puthimg];
})->name('upload');

Route::get('activity','ActivityController@index')->name('activity.index');
Route::get('activity/{activity}','ActivityController@show')->name('activity.show');


/*******************订单表***********************/
Route::get('orders','OrdersController@index')->name('orders.index');//订单列表
Route::get('orders/count','OrdersController@count')->name('orders.count');//统计
Route::get('orders/{order}','OrdersController@show')->name('orders.show');//指定订单列表
/*******************订单表***********************/
/*******************商品统计**********************/
Route::get('orders/menus/lists','OrdersController@lists')->name('order.lists');//商品列表
/*******************商品统计**********************/

Route::get('event','EventController@index')->name('event.index');//活动列表
Route::get('event/{event}','EventController@show')->name('event.show');//查看活动
Route::post('event/{event}','EventController@status')->name('event.status');//报名活动
Route::get('event/{event}/lottery','EventController@lottery')->name('event.lottery');//查看开奖结果



/*
Route::get('/users', 'UsersController@index')->name('users.index');//用户列表
Route::get('/users/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改用户表单
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//更新用户信息
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');//删除用户信息
 */