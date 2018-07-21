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

//资源重定向
Route::resource('menucategories', 'MenuCategoriesController');//菜品分类
Route::resource('menus','MenusController');//菜品表

/*
Route::get('/users', 'UsersController@index')->name('users.index');//用户列表
Route::get('/users/{user}', 'UsersController@show')->name('users.show');//查看单个用户信息
Route::get('/users/create', 'UsersController@create')->name('users.create');//显示添加表单
Route::post('/users', 'UsersController@store')->name('users.store');//接收添加表单数据
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');//修改用户表单
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');//更新用户信息
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');//删除用户信息
 */