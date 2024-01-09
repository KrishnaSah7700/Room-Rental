<?php
use App\Systemsetting;
use App\Category;
use Illuminate\Support\Str;
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
   $str = 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit';
  $test =  Str::limit($str, 20, ' ...');

    $data['system'] = Systemsetting::find(1);
    $data['categories'] = Category::with('products')->get();
    // dd($data);
    $_SESSION['setting'] = $data['system'];
    return view('frontend.index', $data);
});
Route::view('login','backend.dashboard.login')->name('login');
Route::post('submit','LoginController@login')->name('admin.login.submit');
Route::get('search','CategoryController@search')->name('frontend.search');
Route::group(['prefix' =>'admin','middleware'=>'auth:admin'], function () {
    Route::get('dashboard','LoginController@dashboard')->name('dashboard');
    Route::get('category','CategoryController@index')->name('category.index')->middleware('payment');

    // Route::get('system-setting','SystemController@index')->name('system.setting');
    Route::resource('system-setting','SystemController');

    //product
    Route::get('product-create','ProductController@index')->name('product.create');
    Route::get('product-details/{id}','ProductController@productDetails')->name('product.details');
    Route::post('product-order/{id}','ProductController@placeOrder')->name('product.placeorder');


});

