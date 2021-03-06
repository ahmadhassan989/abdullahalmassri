<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
Route::get('products/{slug}', 'HomeController@product');
Route::get('cart', 'HomeController@cart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => ['auth','IsAdmin']], function(){
    Route::get('/','AdminController@dashboard');
});

Route::resource('maincategory' , 'AdminControllers\MainCategoryController');
Route::resource('subcategory' , 'AdminControllers\SubCategoryController');
Route::resource('product' , 'AdminControllers\ProductController');
Route::resource('unit' , 'AdminControllers\UnitController');
Route::get('api/subCategories', function(Request $request) {
    $input = $request->input('option');
    if($input == '0'){
       return $input;
    }
    $maincategory = MainCategory::find($input);
    $subCategory = $maincategory->subcategories();
    return Response::json($subCategory->get(['id', 'title']));
});



