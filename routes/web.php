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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
	
	// Route Dashborad
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
        
	// Route Categories
		Route::get('categories', 'Admin\Products\CategoryController@index')->name('category');
		Route::post('category/store', 'Admin\Products\CategoryController@store')->name('category.store');
		Route::post('category/{id}/edit', 'Admin\Products\CategoryController@update')->name('category.edit');
		Route::post('category/{id}/delete', 'Admin\Products\CategoryController@destroy')->name('category.delete');

	// Route Products
		Route::get('products', 'Admin\Products\ProductController@index')->name('product');
		Route::post('product/store', 'Admin\Products\ProductController@store')->name('product.store');
		Route::post('product/{id}/edit', 'Admin\Products\ProductController@update')->name('product.edit');
		Route::post('product/{id}/delete', 'Admin\Products\ProductController@destroy')->name('product.delete');

	// Route PriceLists
		Route::get('price_lists', 'Admin\Products\PriceListController@index')->name('price_list');
		Route::post('price_lists/store','Admin\Products\PriceListController@store')->name('price_list.store');
		Route::post('price_lists/{id}/edit','Admin\Products\PriceListController@update')->name('price_list.edit');
		Route::post('price_lists/{id}/delete','Admin\Products\PriceListController@destroy')->name('price_list.delete');

	// Route PriceLists/Price_product
		Route::get('price_lists/price_product/{id}', 'Admin\Products\PriceProductController@index')->name('price_product');
		Route::get('price_lists/price_product/{id}/create', 'Admin\Products\PriceProductController@create')->name('price_product.create');
		Route::post('price_lists/price_product/store', 'Admin\Products\PriceProductController@store')->name('price_product.store');
		Route::get('price_lists/price_product/{id}/edit', 'Admin\Products\PriceProductController@edit')->name('price_product.edit');
		Route::post('price_lists/price_product/{id}/edit', 'Admin\Products\PriceProductController@update')->name('price_product.edit');
		Route::post('price_lists/price_product/{id}/delete', 'Admin\Products\PriceProductController@destroy')->name('price_product.delete');

	// Route users/Governorate Managers
		Route::get('governorate_managers', 'Admin\Users\Govern_managController@index')->name('gov_manag');
		Route::post('governorate_manager/store', 'Admin\Users\Govern_managController@store')->name('gov_manag.store');
		Route::post('governorate_manager/{id}/edit', 'Admin\Users\Govern_managController@update')->name('gov_manag.edit');
		Route::post('governorate_manager/{id}/delete', 'Admin\Users\Govern_managController@destroy')->name('gov_manag.delete');
		Route::get( 'ajax_managers', array(
			'as' => 'ajax_managers',
			'uses' => 'Admin\Users\Sales_managerController@getGovernorates'
		));

		Route::get( 'ajax_states', array(
			'as' => 'ajax_states',
			'uses' => 'Admin\Users\Sales_managerController@getStates'
		));
		Route::get( 'sales_rep_states', array(
			'as' => 'sales_rep_states',
			'uses' => 'SalesRepresentativeController@getStates'
		));

	// Route Governorates/Stats
		Route::resource('/governorates','GovernoratesController');
		Route::resource('/states','StatesController');

	// Route CS Representatives
		Route::resource('/salesrepresentatives','SalesRepresentativeController');
		Route::resource('/cs_representative','CustomerServiceRepresentativeController');

	// Route users/Sales Managers
		Route::get('sales_managers', 'Admin\Users\Sales_managerController@index')->name('sales_manag');
		Route::post('sales_manager/store', 'Admin\Users\Sales_managerController@store')->name('sales_manag.store');
		Route::post('sales_manager/{id}/edit', 'Admin\Users\Sales_managerController@update')->name('sales_manag.edit');
		Route::post('sales_manager/{id}/delete', 'Admin\Users\Sales_managerController@destroy')->name('sales_manag.delete');

	// Route users/customer_service_managers
		Route::get('customer_service_managers', 'Admin\Users\Customer_serv_managController@index')->name('cust_servi_manag');
		Route::post('customer_service_manager/store', 'Admin\Users\Customer_serv_managController@store')->name('cust_servi_manag.store');
		Route::post('customer_service_manager/{id}/edit', 'Admin\Users\Customer_serv_managController@update')->name('cust_servi_manag.edit');
		Route::post('customer_service_manager/{id}/delete', 'Admin\Users\Customer_serv_managController@destroy')->name('cust_servi_manag.delete');

	// Route users/suppliers
		Route::get('suppliers', 'Admin\Users\SupplierController@index')->name('supplier');
		Route::post('supplier/store', 'Admin\Users\SupplierController@store')->name('supplier.store');
		Route::post('supplier/{id}/edit', 'Admin\Users\SupplierController@update')->name('supplier.edit');
		Route::post('supplier/{id}/delete', 'Admin\Users\SupplierController@destroy')->name('supplier.delete');

	// Route users/merchants
		Route::get('merchants', 'Admin\Users\MerchantsController@index')->name('merchant');
		Route::post('merchant/store', 'Admin\Users\MerchantsController@store')->name('merchant.store');
		Route::post('merchant/{id}/edit', 'Admin\Users\MerchantsController@update')->name('merchant.edit');
		Route::post('merchant/{id}/delete', 'Admin\Users\MerchantsController@destroy')->name('merchant.delete');

	// Route users/distributers
		Route::get('distributers', 'Admin\Users\DistributerController@index')->name('distributer');
		Route::post('distributer/store', 'Admin\Users\DistributerController@store')->name('distributer.store');
		Route::post('distributer/{id}/edit', 'Admin\Users\DistributerController@update')->name('distributer.edit');
		Route::post('distributer/{id}/delete', 'Admin\Users\DistributerController@destroy')->name('distributer.delete');

	// Route users/technicians
		Route::get('technicians', 'Admin\Users\TechnicianController@index')->name('technician');
		Route::post('technician/store', 'Admin\Users\TechnicianController@store')->name('technician.store');
		Route::post('technician/{id}/edit', 'Admin\Users\TechnicianController@update')->name('technician.edit');
		Route::post('technician/{id}/delete', 'Admin\Users\TechnicianController@destroy')->name('technician.delete');

	// Route users/customers
		Route::get('customers', 'Admin\Users\CustomerController@index')->name('customer');
		Route::post('customer/store', 'Admin\Users\CustomerController@store')->name('customer.store');
		Route::post('customer/{id}/edit', 'Admin\Users\CustomerController@update')->name('customer.edit');
		Route::post('customer/{id}/delete', 'Admin\Users\CustomerController@destroy')->name('customer.delete');

	// Route gifts
		Route::get('gifts', 'Admin\GiftController@index')->name('gift');
		Route::post('gift/store', 'Admin\GiftController@store')->name('gift.store');
		Route::post('gift/{id}/edit', 'Admin\GiftController@update')->name('gift.edit');
		Route::post('gift/{id}/delete', 'Admin\GiftController@destroy')->name('gift.delete');

	// Route Complaints
		Route::get('complaints', 'Admin\ComplaintController@index')->name('complaint');
		Route::post('complaint/store', 'Admin\ComplaintController@store')->name('complaint.store');
		Route::post('complaint/{id}/edit', 'Admin\ComplaintController@update')->name('complaint.edit');
		Route::post('complaint/{id}/delete', 'Admin\ComplaintController@destroy')->name('complaint.delete');

	// Route Taskes
		Route::get('tasks', 'Admin\TaskController@index')->name('task');
		Route::post('tasks/store', 'Admin\TaskController@store')->name('task.store');
		Route::post('tasks/{id}/edit', 'Admin\TaskController@update')->name('task.edit');
		Route::post('tasks/{id}/delete', 'Admin\TaskController@destroy')->name('task.delete');

});

