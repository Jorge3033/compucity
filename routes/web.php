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
    return view('page.index'); 
});

Route::get('/adminTemplate', function () {
    return view('layouts.adminTemplate'); 
});
									//Home Routes 
##############################################################################################################


//Muestra la pagina con la consulta de las categorias que se estan seleccionando
Route::get('/showCategory/{id}', 'PageController@showCategory')->name('showCategory');

									//End home Routes 
##############################################################################################################

									//Admin Routes 
##############################################################################################################

Route::get('/reportAdmin', 'AdminController@report')->name('reportAdmin');

Route::get('/formUpAdmin', 'AdminController@formUp')->name('formUpAdmin');
Route::POST('/upAdmin', 'AdminController@up')->name('upAdmin');

Route::get('/formModifyAdmin/{id}', 'AdminController@formModify')->name('formModifyAdmin');
Route::POST('/modifyAdmin', 'AdminController@modify')->name('modifyAdmin');
 
Route::get('/lockAdmin/{id}', 'AdminController@lock')->name('lockAdmin');
Route::get('/unLockAdmin/{id}', 'AdminController@unLock')->name('unLockAdmin');

Route::get('/reportAdminControl', 'AdminController@reportControl')->name('reportAdminControl');

									//End Admin Routes
##############################################################################################################

									//User Routes 
##############################################################################################################

Route::get('/reportUser', 'UserController@report')->name('reportUser');

Route::get('/formUpUser', 'UserController@formUp')->name('formUpUser');
Route::POST('/upUser', 'UserController@up')->name('upUser');

Route::get('/formModifyUser/{id}', 'UserController@formModify')->name('formModifyUser');
Route::POST('/modifyUser', 'UserController@modify')->name('modifyUser');
 
Route::get('/lockUser/{id}', 'UserController@lock')->name('lockUser');
Route::get('/unLockUser/{id}', 'UserController@unLock')->name('unLockUser');

Route::get('/reportUserControl', 'UserController@reportControl')->name('reportUserControl');

									//End User Routes
##############################################################################################################


									//Category Routes 
##############################################################################################################

Route::get('/reportCategory', 'CategoryController@report')->name('reportCategory');

Route::get('/formUpCategory', 'CategoryController@formUp')->name('formUpCategory');
Route::POST('/upCategory', 'CategoryController@up')->name('upCategory');

Route::get('/formModifyCategory/{id}', 'CategoryController@formModify')->name('formModifyCategory');
Route::POST('/modifyCategory', 'CategoryController@modify')->name('modifyCategory');

									//End Category Routes
##############################################################################################################


									//Product Routes 
##############################################################################################################

Route::get('/reportProduct', 'ProductController@report')->name('reportProduct');

Route::get('/formUpProduct', 'ProductController@formUp')->name('formUpProduct');
Route::POST('/upProduct', 'ProductController@up')->name('upProduct');

Route::get('/formModifyProduct/{id}', 'ProductController@formModify')->name('formModifyProduct');
Route::POST('/modifyProduct', 'ProductController@modify')->name('modifyProduct');
 
Route::get('/lockProduct/{id}', 'ProductController@lock')->name('lockProduct');
Route::get('/unLockProduct/{id}', 'ProductController@unLock')->name('unLockProduct');

Route::get('/reportProductControl', 'ProductController@reportControl')->name('reportProductControl');

									//End Product Routes
##############################################################################################################

									//Cart Routes 
##############################################################################################################

Route::get('/reportCart', 'CartController@report')->name('reportCart');

Route::get('/formUpCart', 'CartController@formUp')->name('formUpCart');
Route::POST('/upCart', 'CartController@up')->name('upCart');

Route::get('/formModifyCart/{id}', 'CartController@formModify')->name('formModifyCart');
Route::POST('/modifyCart', 'CartController@modify')->name('modifyCart');
 
Route::get('/lockCart/{id}', 'CartController@lock')->name('lockCart');
Route::get('/unLockCart/{id}', 'CartController@unLock')->name('unLockCart');

Route::get('/reportCartControl', 'CartController@reportControl')->name('reportCartControl');

									//End Cart Routes
##############################################################################################################

									//PayMode Routes 
##############################################################################################################

Route::get('/reportPayMode', 'PayModeController@report')->name('reportPayMode');

Route::get('/formUpPayMode', 'PayModeController@formUp')->name('formUpPayMode');
Route::POST('/upPayMode', 'PayModeController@up')->name('upPayMode');

Route::get('/formModifyPayMode/{id}', 'PayModeController@formModify')->name('formModifyPayMode');
Route::POST('/modifyPayMode', 'PayModeController@modify')->name('modifyPayMode');
 
Route::get('/lockPayMode/{id}', 'PayModeController@lock')->name('lockPayMode');
Route::get('/unLockPayMode/{id}', 'PayModeController@unLock')->name('unLockPayMode');

Route::get('/reportPayModeControl', 'PayModeController@reportControl')->name('reportPayModeControl');

									//End PayMode Routes
##############################################################################################################

									//Sale Routes 
##############################################################################################################

Route::get('/reportSale', 'SaleController@report')->name('reportSale');

Route::get('/formUpSale', 'SaleController@formUp')->name('formUpSale');
Route::POST('/upSale', 'SaleController@up')->name('upSale');

Route::get('/formModifySale/{id}', 'SaleController@formModify')->name('formModifySale');
Route::POST('/modifySale', 'SaleController@modify')->name('modifySale');
 
Route::get('/lockSale/{id}', 'SaleController@lock')->name('lockSale');
Route::get('/unLockSale/{id}', 'SaleController@unLock')->name('unLockSale');

Route::get('/reportSaleControl', 'SaleController@reportControl')->name('reportSaleControl');

									//End Sale Routes
##############################################################################################################