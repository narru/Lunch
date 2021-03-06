<?php
    
    use App\Notifications\MakeOrder;
    use App\User;
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
    if(auth()->user()){
        return redirect()->route('home');
    }
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/test', 'HomeController@test')->name('test');


Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/admin/show/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/admin/edit/{id}', 'AdminController@edit')->name('profile.edit');
    Route::put('/profile/update/{id}', 'AdminController@update')->name('profile.update');
    // now change
    Route::get('/search','SearchController@index')->name('admin.searchmenu');
    //Users
    Route::get('/employee', 'AdminController@getEmployees')->name('admin.employees.index');
    Route::get('/employee/create', 'EmployeeController@create')->name('admin.employees.create');
    Route::post('/employee/store', 'EmployeeController@store')->name('employees.store');
    Route::delete('/employee/destroy/{id}', 'EmployeeController@destroy')->name('admin.employees.destroy');
    //Chefs
    Route::get('/chef', 'AdminController@getChefs')->name('admin.chefs.index');
    Route::get('/chef/create', 'ChefController@create')->name('admin.chefs.create');
    Route::post('/chef/store', 'ChefController@store')->name('chefs.store');
    Route::delete('/chef/destroy/{id}', 'ChefController@destroy')->name('admin.chefs.destroy');
});
//for showing the menu
Route:: resource('showmenu','ShowmenuController');
// this is for the chef
Route::group(['middleware' => 'role:chef', 'prefix' => 'chef'], function() {
    Route::get('/index', 'ChefController@index')->name('chef.index');
    Route::resource('category', 'CategoryController');
    Route::resource('menu', 'MenuController');
    Route::resource('item', 'ItemController');
    Route::resource('profile', 'ChefprofileController');
    Route::get('order/complete', 'OrderController@comp')->name('order-comp');
    Route::post('/order/complete/{id}', 'OrderController@complete')->name('order.complete');
    Route::get('/chef/profile/', 'ChefController@getprofile')->name('chef.profile');
    // sse controller
    

});
Route::group(['middleware' => 'role:employee', 'prefix' => 'employee'], function() {
    Route::get('/index', 'EmployeeController@index')->name('employee.index');
    Route::post('/orders', 'OrderController@store')->name('order.store');
    Route::get('/orders/edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::put('/orders/update/{id}', 'OrderController@update')->name('order.update');
    Route::resource('empprofile', 'EmployeeprofileController');
});
Route::get('/verify/{token}','VerifyEmailController@verify')->name('verify');
