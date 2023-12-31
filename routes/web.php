<?php
use App\Systemsetting;
use App\Category;
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
    $data['system'] = Systemsetting::find(1);
    $data['categories'] = Category::with('products')->get();
    // dd($data);
    $_SESSION['setting'] = $data['system'];
    return view('frontend.index', $data);
});
Route::view('login','backend.dashboard.login')->name('login');
Route::post('submit','LoginController@login')->name('admin.login.submit');
Route::group(['prefix' =>'admin','middleware'=>'auth'], function () {
    Route::get('dashboard','LoginController@dashboard')->name('dashboard');
    Route::get('category','CategoryController@index')->name('category.index');

    // Route::get('system-setting','SystemController@index')->name('system.setting');
    Route::resource('system-setting','SystemController');

    //product
    Route::get('product-create','ProductController@index')->name('product.create');

});

