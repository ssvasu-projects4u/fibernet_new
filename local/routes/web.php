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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
	Route::get('/dashboard', 'Administration\AdministrationController@index');
	Route::get('/feasability-check', 'Administration\AdministrationController@feasabilityCheck');
	Route::post('/feasability-check/submit', ['as' => 'feasability-check.submit', 'uses' => 'Administration\AdministrationController@feasabilityCheckSubmit']);
});

Route::prefix('admin/state')->group(function() {
    Route::get('/', 'Administration\StateController@index');
	Route::get('/create', 'Administration\StateController@create');
	Route::post('/submit', ['as' => 'state.store', 'uses' => 'Administration\StateController@store']);
	Route::get('/edit/{id}', 'Administration\StateController@edit');
	Route::put('/{id}', ['as' => 'state.update', 'uses' => 'Administration\StateController@update']);
	Route::get('/delete/{id}', 'Administration\StateController@destroy');
        
});

Route::prefix('admin/city')->group(function() {
    Route::get('/', 'Administration\CityController@index');
	Route::get('/create', 'Administration\CityController@create');
	Route::post('/submit', ['as' => 'city.store', 'uses' => 'Administration\CityController@store']);
	Route::get('/edit/{id}', 'Administration\CityController@edit');
	Route::put('/{id}', ['as' => 'city.update', 'uses' => 'Administration\CityController@update']);
	Route::get('/delete/{id}', 'Administration\CityController@destroy');
        
});


Route::prefix('admin/departments')->group(function() {
    Route::get('/', 'Administration\DepartmentsController@index');
	Route::get('/create', 'Administration\DepartmentsController@create');
	Route::post('/submit', ['as' => 'departments.store', 'uses' => 'Administration\DepartmentsController@store']);
	Route::get('/edit/{id}', 'Administration\DepartmentsController@edit');
	Route::put('/{id}', ['as' => 'departments.update', 'uses' => 'Administration\DepartmentsController@update']);
	Route::get('/delete/{id}', 'Administration\DepartmentsController@destroy');
});

    Route::prefix('admin/designations')->group(function() {
    Route::get('/', 'Administration\DesignationsController@index');
	Route::get('/create', 'Administration\DesignationsController@create');
	Route::post('/submit', ['as' => 'designations.store', 'uses' => 'Administration\DesignationsController@store']);
	Route::get('/edit/{id}', 'Administration\DesignationsController@edit');
	Route::put('/{id}', ['as' => 'designations.update', 'uses' => 'Administration\DesignationsController@update']);
	Route::get('/delete/{id}', 'Administration\DesignationsController@destroy');
});


    Route::prefix('admin/distributors')->group(function() {
    Route::get('/', 'Administration\DistributorsController@index');
	Route::get('/create', 'Administration\DistributorsController@create');
	Route::post('/submit', ['as' => 'distributors.store', 'uses' => 'Administration\DistributorsController@store']);
	Route::get('/edit/{id}', 'Administration\DistributorsController@edit');
	Route::put('/{id}', ['as' => 'distributors.update', 'uses' => 'Administration\DistributorsController@update']);
	Route::get('/delete/{id}', 'Administration\DistributorsController@destroy');
    Route::get('/distutility/{id}', 'Administration\DistributorsController@distutilitieslist'); // added by durga
    
    Route::get('/trash/{id}','Administration\DistributorsController@UtilityTrash');
    Route::post('/submittrash', ['as' => 'storeutilitiestrash', 'uses' => 'Administration\DistributorsController@StoreUtilitiesTrash']);
    Route::get('/moving/{id}','Administration\DistributorsController@UtilityMoving');
    
    Route::get('/itemchange/{item}','Administration\DistributorsController@GetItems');
    Route::get('/getserialno/{item}','Administration\DistributorsController@GetSerialNum');
    Route::get('/getmodelno/{item}','Administration\DistributorsController@GetModelNum');
    Route::get('/getoffices/{office}/{distid}','Administration\DistributorsController@GetOffices');
    Route::get('/getbranchoffices/{office}/{branch}','Administration\DistributorsController@GetBranchOffices');
    
    Route::get('/getbuyprice/{item}','Administration\DistributorsController@GetBuyPrice');
    Route::get('/getdistid/{item}','Administration\DistributorsController@GetDistID');
    
    Route::post('/submitmoving', ['as' => 'storeutilitiemoving', 'uses' => 'Administration\DistributorsController@StoreUtilityMoving']);
    Route::get('/sale/{id}','Administration\DistributorsController@UtilitySale');
    Route::post('/submitsale', ['as' => 'storeutilitysale', 'uses' => 'Administration\DistributorsController@StoreUtilitySale']);
    Route::get('/itemsale/{id}','Administration\DistributorsController@UtilitySale');
    
	
});

  Route::prefix('admin/subdistributors')->group(function() {
    Route::get('/', 'Administration\SubDistributorsController@index');
	Route::get('/create', 'Administration\SubDistributorsController@create');
	Route::post('/submit', ['as' => 'subdistributors.store', 'uses' => 'Administration\SubDistributorsController@store']);
	Route::get('/edit/{id}', 'Administration\SubDistributorsController@edit');
	Route::put('/{id}', ['as' => 'subdistributors.update', 'uses' => 'Administration\SubDistributorsController@update']);
	Route::get('/delete/{id}', 'Administration\SubDistributorsController@destroy');
 
    
	
});

Route::prefix('admin/branches')->group(function() {
    Route::get('/', 'Administration\BranchesController@index');
	Route::get('/create', 'Administration\BranchesController@create');
	Route::post('/submit', ['as' => 'branches.store', 'uses' => 'Administration\BranchesController@store']);
	Route::get('/edit/{id}', 'Administration\BranchesController@edit');
	Route::put('/{id}', ['as' => 'branches.update', 'uses' => 'Administration\BranchesController@update']);
	Route::get('/delete/{id}', 'Administration\BranchesController@destroy');
	Route::get('/transactions/{branchid}/{optionValue}', 'Administration\BranchesController@GetTransactionid');
	Route::get('/citydistributors/{city}', 'Administration\BranchesController@getCityDistributors');
	Route::get('/citydistributorsextra/{city}', 'Administration\BranchesController@getCityDistributorsExtra');
	Route::get('/branchutility/{id}', 'Administration\BranchesController@branchutilitieslist'); // added by durga
	  Route::get('/branch-moving/{id}','Administration\BranchesController@UtilityBranchMoving');

	Route::get('/subdistributors/{distributor}', 'Administration\BranchesController@getSubDistributors');

  
 Route::post('/submitbranchmoving', ['as' => 'storebranchutilitiemoving', 'uses' => 'Administration\BranchesController@StoreBranchUtilityMoving']);
   	Route::get('/getbranchid/{item}','Administration\BranchesController@GetBranchID');
        Route::get('/branch-trash/{id}','Administration\BranchesController@BranchUtilityTrash');
  Route::post('/submitbranchtrash', ['as' => 'storebranchutilitiestrash', 'uses' => 'Administration\BranchesController@StoreBranchUtilitiesTrash']);
    Route::get('/branch-sale/{id}','Administration\BranchesController@BranchUtilitySale');
   Route::post('/submitbranchsale', ['as' => 'storebranchutilitysale', 'uses' => 'Administration\BranchesController@StoreBranchUtilitySale']);
   
    
	
	
});

Route::prefix('admin/franchises')->group(function() {
    Route::get('/', 'Administration\FranchisesController@index');
	Route::get('/create', 'Administration\FranchisesController@create');
	Route::post('/submit', ['as' => 'franchises.store', 'uses' => 'Administration\FranchisesController@store']);
	Route::get('/edit/{id}', 'Administration\FranchisesController@edit');
	Route::put('/{id}', ['as' => 'franchises.update', 'uses' => 'Administration\FranchisesController@update']);
	Route::get('/delete/{id}', 'Administration\FranchisesController@destroy');

	Route::get('/citybranches/{city}', 'Administration\FranchisesController@getCityBranches');
    Route::post('/emailchecking', 'Administration\FranchisesController@checkIsEmailExsit');
    Route::post('/emailEditchecking', 'Administration\FranchisesController@checkIsEmailEditExsit');

	Route::get('/citydistributorbranches/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorBranches');
	Route::get('/citydistributorbranchesutiilty/{city}/{distributor}/{branch}', 'Administration\FranchisesController@getCityDistributorUtilityBranches');
	
	Route::get('/citydistributorsubdistributor/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorSubdistributor');
	Route::get('/citysubdistributorbranches/{city}/{subdistributor}', 'Administration\FranchisesController@getCitySubdistributorBranches');
	
	Route::get('/citydistributorbranchesextra/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorBranchesExtra');
	Route::get('/citydistributorsubdistributorextra/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorSubdistributorExtra');
	
	Route::get('/citydistributorsubdistributorextraedit/{city}/{distributor}/{user_id}', 'Administration\FranchisesController@getCityDistributorSubdistributorExtraEdit');
	Route::get('/citysubdistributorbranchesextraedit/{city}/{subdistributor}/{user_id}', 'Administration\FranchisesController@getCitySubdistributorBranchesExtraEdit');

	Route::get('/citydistributorbranchesextraedit/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorBranchesExtraEdit');
	// Route::get('/citydistributorsubdistributorextraedit/{city}/{distributor}', 'Administration\FranchisesController@getCityDistributorSubdistributorExtraEdit');
	// Route::get('/citysubdistributorbranchesextraedit/{city}/{subdistributor}', 'Administration\FranchisesController@getCitySubdistributorBranchesExtraEdit');
	
	Route::get('/getdetails/{franchise}', 'Administration\FranchisesController@getFranchiseDetails');
    Route::post('/passwordsetup', ['as' => 'franchises.change_password', 'uses' => 'Administration\FranchisesController@change_password']);
        
        Route::post('/adddeposit', ['as' => 'franchises.add_deposit', 'uses' => 'Administration\FranchisesController@add_deposit']);
 Route::post('/ledger', ['as' => 'franchises.ledger', 'uses' => 'Administration\FranchisesController@ledger']);
Route::post('/franchledger', ['as' => 'franchises.franchledger', 'uses' => 'Administration\FranchisesController@franchledger']);

Route::get('/branches/{subdistributor}', 'Administration\FranchisesController@getSubDistributorsBranches');

		//Route::post('/ledger', 'FranchisesController@ledger');


});

Route::prefix('admin/employees')->group(function() {
    Route::get('/', 'Administration\EmployeesController@index');
	Route::get('/create', 'Administration\EmployeesController@create');
	Route::post('/submit', ['as' => 'employees.store', 'uses' => 'Administration\EmployeesController@store']);
	Route::get('/edit/{id}', 'Administration\EmployeesController@edit');
	Route::put('/{id}', ['as' => 'employees.update', 'uses' => 'Administration\EmployeesController@update']);
	Route::get('/delete/{id}', 'Administration\EmployeesController@destroy');
	Route::get('/show/{id}', ['as' => 'employees.show', 'uses' => 'Administration\EmployeesController@show']);
	Route::get('/department-designations/{department}', 'Administration\EmployeesController@getDepartmentDesignations');
	Route::post('/resign', [
		'as'=>'employees.resign',
		'uses'=>'Administration\EmployeesController@resign'
	]);
});

Route::prefix('admin/accounts')->group(function() {
    Route::get('/inward', 'Administration\PaymentsController@inward');
	Route::get('/outward', 'Administration\PaymentsController@outward');
	Route::get('/gst', 'Administration\PaymentsController@gst');
	Route::get('/balancesheet', 'Administration\PaymentsController@balancesheet');
	Route::get('/inward/credits', 'Administration\PaymentsController@inwardCredits');
	Route::get('/inward/credits/detail/{txnId}/{payment_from}', 'Administration\PaymentsController@inwardCreditsdetail');
});


/* users */
Route::prefix('admin')->group(function() {
    Route::get('/profile', 'Users\AdminController@profile');
	Route::put('/profile', ['as' => 'admin.profile', 'uses' => 'Users\AdminController@updateProfile']);

	Route::get('/changepassword', 'Users\AdminController@changepassword');
	Route::put('/changepassword', ['as' => 'admin.changepassword', 'uses' => 'Users\AdminController@updateChangePassword']);
});

Route::prefix('admin/roles')->group(function() {
    Route::get('/', 'Users\RolesController@index');
	Route::get('/create', 'Users\RolesController@create');
	Route::post('/submit', ['as' => 'roles.store', 'uses' => 'Users\RolesController@store']);
	Route::get('/edit/{id}', 'Users\RolesController@edit');
	Route::put('/{id}', ['as' => 'roles.update', 'uses' => 'Users\RolesController@update']);

	//Route::get('/permissions/{id}', 'RolesController@syncPermissions');
	//Route::put('/permissions/{id}', ['as' => 'roles-permissions.update', 'uses' => 'RolesController@syncPermissionsUpdate']);

	Route::get('/delete/{id}', 'Users\RolesController@destroy');
});

Route::prefix('admin/permissions')->group(function() {
    Route::get('/', 'Users\PermissionsController@index');
	Route::get('/create', 'Users\PermissionsController@create');
	Route::post('/submit', ['as' => 'permissions.store', 'uses' => 'Users\PermissionsController@store']);
	Route::get('/edit/{id}', 'Users\PermissionsController@edit');
	Route::put('/{id}', ['as' => 'permissions.update', 'uses' => 'Users\PermissionsController@update']);
	Route::get('/delete/{id}', 'Users\PermissionsController@destroy');
	Route::get('/get-sub-category/{selectedCategory}', 'Users\PermissionsController@subCategory');
});


Route::prefix('admin/users')->group(function() {
	Route::get('/', 'Users\UsersController@index');
	Route::get('/roleusers/{type}', 'Users\UsersController@userswithrole');
	//Route::get('/create', 'UsersController@create');
	//Route::post('/submit', ['as' => 'users.store', 'uses' => 'UsersController@store']);
	Route::get('/edit/{id}', 'Users\UsersController@edit');
	Route::put('/{id}', ['as' => 'users.update', 'uses' => 'Users\UsersController@update']);
	Route::get('/delete/{id}', 'Users\UsersController@destroy');
});

/* Technical */
Route::prefix('admin')->group(function() {
	Route::get('/', function () {
		return redirect('olt');
	});
	
	//OLT
    Route::get('/olt', 'Technical\OLTController@index');
	Route::get('/olt/create', 'Technical\OLTController@create');
	Route::post('/olt/submit', ['as' => 'olt.store', 'uses' => 'Technical\OLTController@store']);
	Route::get('/olt/edit/{id}', 'Technical\OLTController@edit');
	Route::put('/olt/{id}', ['as' => 'olt.update', 'uses' => 'Technical\OLTController@update']);
	Route::get('/olt/delete/{id}', 'Technical\OLTController@destroy');
	
	Route::get('/olt/franchise-olts/{franchise}', 'Technical\OLTController@getFranchiseOlts');
	Route::get('/olt/olt-ports/{olt_id}/{franchise_id}', 'Technical\OLTController@getOltPorts');
	Route::get('/olt/dp-ids/{olt_id}', 'Technical\OLTController@getOltDPs');

	Route::get('/olt/ports/{olt_id}', 'Technical\OLTController@oltPorts');
	Route::post('/olt/ports/{olt_id}/submit', ['as' => 'olt.ports.store', 'uses' => 'Technical\OLTController@portsStore']);
	Route::post('/olt/ports/{id}/submit', ['as' => 'olt-ports.store', 'uses' => 'Technical\FiberLayingController@fiberPollReaddingsStore']);
        Route::get('/olt/ports/delete/{olt_id}', ['as' => 'olt.ports.delete', 'uses' => 'Technical\OLTController@portsDestroy']);

	//EDFA
	Route::get('/edfa', 'Technical\EDFAController@index');
	Route::get('/edfa/create', 'Technical\EDFAController@create');
	Route::post('/edfa/submit', ['as' => 'edfa.store', 'uses' => 'Technical\EDFAController@store']);
	Route::get('/edfa/edit/{id}', 'Technical\EDFAController@edit');
	Route::put('/edfa/{id}', ['as' => 'edfa.update', 'uses' => 'Technical\EDFAController@update']);
	Route::get('/edfa/delete/{id}', 'Technical\EDFAController@destroy');

	//Fiber Laying
	Route::get('/fiber-laying', 'Technical\FiberLayingController@index');
	Route::get('/fiber-laying/create', 'Technical\FiberLayingController@create');
//	Route::get('/fiber-laying/create-fiberlaying', 'FiberLayingController@CreateFiber');
	Route::post('/fiber-laying/submit', ['as' => 'fiber-laying.store', 'uses' => 'Technical\FiberLayingController@store']);
	Route::get('/fiber-laying/edit/{id}', 'Technical\FiberLayingController@edit');
	Route::get('/fiber-laying/show/{id}', 'Technical\FiberLayingController@show');
	Route::put('/fiber-laying/{id}', ['as' => 'fiber-laying.update', 'uses' => 'Technical\FiberLayingController@update']);
	Route::get('/fiber-laying/franchise-fibers/{franchise}/{type}', 'Technical\FiberLayingController@getFranchiseFibers');
	Route::get('/fiber-laying/fiber-fibercolors/{fiber}', 'Technical\FiberLayingController@getFiberColors');
	Route::get('/fiber-laying/fiber-dp-fibercolors/{fiber}', 'Technical\FiberLayingController@getDpFiberColors');
	
	//Polls Readings
	Route::get('/fiber-laying/polls-readings/{id}', 'Technical\FiberLayingController@pollsReadings');
	Route::put('/fiber-laying/{id}', ['as' => 'fiber-laying.update', 'uses' => 'Technical\FiberLayingController@update']);

	Route::put('/fiber-laying/polls-readings/{id}', ['as' => 'fiber-polls-readings.update', 'uses' => 'Technical\FiberLayingController@updatePollsReadings']);
	Route::post('/fiber-laying/polls-readings/{id}/submit', ['as' => 'fiber-polls-readings.store', 'uses' => 'Technical\FiberLayingController@fiberPollReaddingsStore']);
	Route::get('/fiber-laying/polls-readings/{id}/delete', ['as' => 'fiber-polls-readings.delete', 'uses' => 'Technical\FiberLayingController@fiberPollReaddingsDestroy']);
	
	Route::get('/fiber-laying/delete/{id}', 'Technical\FiberLayingController@destroy');

	//DPD
	Route::get('/dpd', 'Technical\DPDController@index');
	Route::get('/dpd/create', 'Technical\DPDController@create');
	Route::post('/dpd/submit', ['as' => 'dpd.store', 'uses' => 'Technical\DPDController@store']);
	Route::get('/dpd/edit/{id}', 'Technical\DPDController@edit');
	Route::put('/dpd/{id}', ['as' => 'dpd.update', 'uses' => 'Technical\DPDController@update']);
	Route::get('/dpd/delete/{id}', 'Technical\DPDController@destroy');
	Route::get('/dpd/getenclosure', 'Technical\DPDController@GetEnclosure');
    
    Route::post('/dpd/login/{id}', 'Technical\DPDController@destroy1');  // added by durga
    
	//DP
	Route::get('/dp', 'Technical\DPController@index');
	Route::get('/dp/create', 'Technical\DPController@create');
	Route::post('/dp/submit', ['as' => 'dp.store', 'uses' => 'Technical\DPController@store']);
	Route::get('/dp/edit/{id}', 'Technical\DPController@edit');
	Route::put('/dp/{id}', ['as' => 'dp.update', 'uses' => 'Technical\DPController@update']);
	Route::get('/dp/delete/{id}', 'Technical\DPController@destroy');
	Route::get('/dp/franchise-dps/{franchise}', 'Technical\DPController@getFranchiseDPs');
    Route::get('/dp/split/{splitter}/{franch}', 'Technical\DPController@GetSplitterData');
    
	Route::get('/dp/fhdata/{id}', 'Technical\DPController@getFHsData');
    Route::get('/dp/dpdata/{id}', 'Technical\DPController@getDPData');
	Route::get('/dp/get_enclosers/{id}', 'Technical\DPController@get_enclosers');

	//FH
    Route::get('/fh/fhdata/{id}', 'Technical\FHController@getFHData');
	Route::get('/fh', 'Technical\FHController@index');
	Route::get('/fh/create', 'Technical\FHController@create');
	Route::post('/fh/submit', ['as' => 'fh.store', 'uses' => 'Technical\FHController@store']);
	Route::get('/fh/edit/{id}', 'Technical\FHController@edit');
	Route::put('/fh/{id}', ['as' => 'fh.update', 'uses' => 'Technical\FHController@update']);
	Route::get('/fh/delete/{id}', 'Technical\FHController@destroy');
	Route::get('/fh/split/{splitter}/{franch}', 'Technical\FHController@GetFhSplitterData');
   Route::get('/fh/termination/{pid}/{franch}', 'Technical\FHController@GetTerminationData');
   

	Route::get('/fh/fhports/{id}', 'Technical\FHController@getFHPorts');
	Route::get('/fh/ports-customers/{id}', 'Technical\FHController@getFHPortsCustomers');
	Route::get('/fh/fhcolors/{id}', 'Technical\FHController@getFHColors');
	Route::get('/fh/dpcolors/{dp_id}', 'Technical\FHController@getDPColors');
	Route::get('/fh/dpcolorsextra/{dp_id}', 'Technical\FHController@getDPColorsExtra');
});
/* Accounts */
Route::prefix('admin/accounts')->group(function() {
    Route::get('/',[
		'uses' => 'Accounts\AccountsController@index',
		'as' => 'account.index'
	]);
	Route::get('/paymenttype',[
		'uses' => 'Accounts\AccountsController@paymentList',
		'as' => 'paymenttype.index'
	]);
	Route::get('/invoices/customer-payments', 'Accounts\AccountsController@CustomerPayments');
	Route::get('/invoices/branch-payments', 'Accounts\AccountsController@BranchPayments');
    Route::get('/invoices/franchise-payments', 'Accounts\AccountsController@FranchPayments');

	Route::post('/paymenttype/submit', ['as' => 'paymenttype.store', 'uses' => 'Accounts\AccountsController@paymentStore']);
	Route::get('/paymenttype/edit/{id}', 'Accounts\AccountsController@paymentEdit');
	Route::put('/paymenttype/{id}', ['as' => 'paymenttype.update', 'uses' => 'Accounts\AccountsController@paymenttypeUpdate']);
	Route::get('/paymenttype/delete/{id}', 'Accounts\AccountsController@paymenttypeDestroy');

	Route::get('/purchase-order',[
		'uses' => 'Accounts\AccountsController@purchaseOrderList',
		'as' => 'po.index'
	]);
	Route::get('/purchase-order/create',[
		'uses' => 'Accounts\AccountsController@purchaseOrderCreate',
		'as' => 'po.create'
	]);
	Route::post('/purchase-order/submit', ['as' => 'po.store', 'uses' => 'Accounts\AccountsController@purchaseOrderStore']);
	Route::get('/purchase-order/edit/{id}', 'Accounts\AccountsController@purchaseOrderEdit');
	Route::put('/purchase-order/{id}', ['as' => 'po.update', 'uses' => 'Accounts\AccountsController@purchaseOrderUpdate']);

	Route::get('/invoices/generate/{purchaseOrder}',
	 'Accounts\InvoicesController@generateInvoice'
	);

	// generate invoice for po
	Route::get('/invoices/generate-invoices',[
		'uses' => 'Accounts\InvoicesController@generateInvoices',
		'as' => 'in.generate-invoices'
	]);

	// list all PO for generating invoices
	Route::get('/invoices/paid-invoices',[
		'uses' => 'Accounts\InvoicesController@paidInvoices',
		'as' => 'in.paid-invoices'
	]);

	Route::get('/invoices/unpaid-invoices',[
		'uses' => 'Accounts\InvoicesController@unpaidInvoices',
		'as' => 'in.unpaid-invoices'
	]);

	Route::get('/invoices/pay/{invoiceId}/form','Accounts\InvoicesController@payInvoiceForm');
	Route::post('/invoices/pay-invoice/{invoiceId}',[
		'uses' => 'Accounts\InvoicesController@payInvoiceStore',
		'as' => 'in.pay-invoice-store'
	]);

	Route::get('/invoices/payment-pickup/{invoiceId}/form','Accounts\InvoicesController@paymentPickupForm');
	Route::post('/invoices/payment-pickup/{invoiceId}/',[
		'uses' => 'Accounts\InvoicesController@paymentPickupStore',
		'as' => 'in.payment-pickup-store'
	]);
	Route::get('/invoice/print/{id}', 'Accounts\InvoicesController@printInvoice');

	Route::get('/invoice/download/{id}', 'Accounts\InvoicesController@downloadInvoice');


	Route::get('/invoice/edit/{id}', 'Accounts\InvoicesController@invoiceEdit');
	Route::put('/invoice/{id}', ['as' => 'io.update', 'uses' => 'Accounts\InvoicesController@invoiceUpdate']);

	Route::get('/invoice/delete/{id}', 'Accounts\InvoicesController@invoiceDestroy');
	Route::get('/invoice/cancel/{id}', 'Accounts\InvoicesController@invoiceCancel');

	Route::get('/invoices/all-cancelled', 'Accounts\InvoicesController@cancelledInvoices');
	Route::get('/invoices/all-deleted', 'Accounts\InvoicesController@deletedInvoices');

	Route::get('/invoices/cheque-invoices', 'Accounts\InvoicesController@chequeInvoices');
	Route::get('/invoices/cheque-bounce-invoices', 'Accounts\InvoicesController@chequeBounceInvoices');

	Route::get('/invoices/cheque-update/{id}/form', 'Accounts\InvoicesController@chequeUpdateFormInvoices');
	Route::post('/invoices/cheque-update/{id}/form',
	 ['as' => 'in.check-update-store', 'uses' => 'Accounts\InvoicesController@chequeUpdateStoreInvoices']
	);

	Route::get('/invoice/send-mail-form/{id}', 'Accounts\InvoicesController@sendMailForm');

	Route::post('/invoice/send-mail/{id}',
		[
		  'uses' => 'Accounts\InvoicesController@invoiceSendEmail',
          'as' => 'in.send-mail-action'
		]);

	Route::get('/bank-accounts',[
		'uses' => 'Accounts\AccountsController@bankaccountsList',
		'as' => 'bank-accounts.index'
	]);
	Route::post('/bank-account/submit', ['as' => 'bank-accounts.store', 'uses' => 'Accounts\AccountsController@bankaccountStore']);
	Route::get('/bank-account/edit/{id}', 'Accounts\AccountsController@bankaccountEdit');
	Route::put('/bank-account/{id}', ['as' => 'bank-account.update', 'uses' => 'Accounts\AccountsController@bankaccountUpdate']);
	// Route::get('/bank-account/delete/{id}', 'Accounts\AccountsController@bankaccountDestroy');
	
});

/* complaints */

Route::get('complaints/cron-close-statuses', 'Complaints\ComplaintsController@closeComplaintStatus');
	
Route::prefix('admin/complaints')->group(function() {
    Route::get('/',[
		'uses' => 'Complaints\ComplaintsController@index',
		'as' => 'complaint.index'
	]);
	Route::get('/create', 'Complaints\ComplaintsController@create');
	Route::post('/submit', ['as' => 'complaints.store', 'uses' => 'Complaints\ComplaintsController@store']);
	Route::get('/edit/{id}', 'Complaints\ComplaintsController@edit');
	Route::put('/{id}', ['as' => 'complaints.update', 'uses' => 'Complaints\ComplaintsController@update']);
	Route::get('/delete/{id}', 'Complaints\ComplaintsController@destroy');
	Route::get('/restore/{id}', 'Complaints\ComplaintsController@restore');
	
	Route::get('/open', 'Complaints\ComplaintsController@open');
	Route::get('/inprogress', 'Complaints\ComplaintsController@inprogress');
	Route::get('/resolved', 'Complaints\ComplaintsController@resolved');
	Route::get('/closed', 'Complaints\ComplaintsController@closed');
	Route::get('/deleted', 'Complaints\ComplaintsController@deleted');

	Route::get('/getdepartemp', 'Complaints\ComplaintsController@getDepartmentWiseEmployee');
	Route::post('/updatestatus', [
		'as'=>'complaints.statusupdate',
		'uses'=>'Complaints\ComplaintsController@updateStatus'	
	]);
	
	
	
	Route::post('/updateassignstatus', [
		'as'=>'complaints.assignstatusupdate',
		'uses'=>'Complaints\ComplaintsController@updateAssign'	
	]);
	
	Route::post('/updatecomplaintstatus', [
		'as'=>'complaints.complaintstatusupdate',
		'uses'=>'Complaints\ComplaintsController@updateComplaintStatus'	
	]);

	Route::get('customerajaxfront',[
		'uses' => 'Complaints\ComplaintsController@autoCompleteCustomer',
		'as' => 'search.customer.front.json'
	]);

});


Route::prefix('admin/complaint-types')->group(function() {
    Route::get('/', 'Complaints\ComplaintTypesController@index');
	Route::get('/create', 'Complaints\ComplaintTypesController@create');
	Route::post('/submit', ['as' => 'complaint-types.store', 'uses' => 'Complaints\ComplaintTypesController@store']);
	Route::get('/edit/{id}', 'Complaints\ComplaintTypesController@edit');
	Route::put('/{id}', ['as' => 'complaint-types.update', 'uses' => 'Complaints\ComplaintTypesController@update']);
	Route::get('/delete/{id}', 'Complaints\ComplaintTypesController@destroy');
	Route::get('/getcomplaintsubtypes/{type}', 'Complaints\ComplaintTypesController@getSubComplaintTypes');	
});

/*Customers*/
Route::get('send-mail/{email}', function () {
    $em=$email;
    $details = [
        'subject' => 'Mail from SLJ FiberNetworks', 
        
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to($em)->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::prefix('admin/customers')->group(function() {
    Route::get('/', 'Customers\CustomersController@index');
    Route::get('/ippoolindex', 'Customers\CustomersController@Ippoolindex');  // added index ippool durga created
    Route::get('/ippool', 'Customers\CustomersController@addippool'); // added ippool durga created
    Route::get('/add-nas', 'Customers\CustomersController@addnas'); // added ippool durga created
    Route::get('/new', 'Customers\CustomersController@newCustomers'); 
    Route::get('/technical', 'Customers\CustomersController@technicalCustomers');
    Route::get('/schedule', 'Customers\CustomersController@scheduleCustomers');
	Route::get('/activation', 'Customers\CustomersController@activationCustomers');
	Route::get('/smartboxusers', 'Customers\CustomersController@smartboxUsers');
	Route::get('/active', 'Customers\CustomersController@activeCustomers');
	Route::get('/expired', 'Customers\CustomersController@expiredCustomers');
    Route::get('/closed', 'Customers\CustomersController@closedCustomers');
	Route::get('/create', 'Customers\CustomersController@create');
	Route::get('/acceptedtermsconditions', 'Customers\CustomersController@acceptedterms');
	Route::get('/disconnect/{cusid}', 'Customers\CustomersController@CustmDisDet');
	Route::get('/disconnecteddata', 'Customers\CustomersController@RequestDisconnect');

    Route::get('/getequipment/{cusid}', 'Customers\CustomersController@GetEquipment');

	Route::post('/submit', ['as' => 'customers.store', 'uses' => 'Customers\CustomersController@store']);
	Route::post('/submit1', ['as' => 'customers.ippoolstore', 'uses' => 'Customers\CustomersController@ippoolstore']);
	Route::post('/devicesubmit', ['as' => 'customers.devicestore', 'uses' => 'Customers\CustomersController@DeviceStore']);
	
	Route::put('/input_6', ['as' => 'customers.emailstore', 'uses' => 'Customers\CustomersController@emailstore']);
	Route::get('/emailtemplate', 'Customers\CustomersController@emailtemplate');
	
  //	Route::post('/verifysub', ['as' => 'customers.verifysub', 'uses' => 'CustomersController@verifyAccount']);
	
	Route::get('/edit/{id}', 'Customers\CustomersController@edit');
	Route::get('/update/network-information/{id}', 'Customers\CustomersController@networktype');
	Route::put('/updated/{edittype}/{id}', ['as' => 'customers.updateEdittype', 'uses' => 'Customers\CustomersController@updateCustomer']);
	Route::get('/update/{edittype}/{id}', 'Customers\CustomersController@editType');
	  Route::get('/notinterested', 'Customers\CustomersController@notintrestedindex');
    Route::get('/emaildata/{email}', 'Customers\CustomersController@EmailData');
    Route::get('/termsconditions/{em}', 'Customers\CustomersController@TermsVerify');
    Route::get('/update/customerinfo/{id}', 'Customers\CustomersController@CustmDetInfo');
    Route::get('/disconnectwindow/{id}', 'Customers\CustomersController@CustmDisDet');
    
    Route::put('/{id}', ['as' => 'customers.update', 'uses' => 'Customers\CustomersController@update']);
	

	//Route::put('/{id}', ['as' => 'customers.update', 'uses' => 'CustomersController@Emailverifyupdate']);

	Route::get('/renew/{id}', 'Customers\CustomersController@renewUser');
	Route::post('/renew/{id}', 'Customers\CustomersController@renewUser');
//	Route::put('/{id}', ['as' => 'employees.update', 'uses' => 'Customers\EmployeesController@update']);
    Route::get('intrested/delete/{id}', 'Customers\CustomersController@destroyintrested');
    Route::get('notintrested/delete/{id}', 'Customers\CustomersController@destroynotintrested');
    Route::get('followup/intr/{id}', 'Customers\CustomersController@setintrested');
	Route::get('followup/notintr/{id}', 'Customers\CustomersController@setnotintrested');
	
    Route::get('prospect/delete/{id}', 'Customers\CustomersController@destroyfollowup');
	
	Route::get('/renew-response', 'Customers\CustomersController@renewResponse');
	Route::post('/renew-response', 'Customers\CustomersController@renewResponse');
    Route::get('/emailverify/{email}', 'Customers\CustomersController@Emailverify');
    Route::get('/emailconfirm/{email}', 'Customers\CustomersController@EmailConfirm');
	Route::get('/confirmmail', ['as' => 'Customers\customers.emailfinalconfirm', 'uses' => 'CustomersController@emupdate']);


	// Route::get('/process-payment/{id}', 'CustomersController@processPayment');
	// Route::post('/process-payment/{id}', 'CustomersController@processPayment');
	Route::get('/process-payment/{id}/{payment_mode}', 'Customers\CustomersController@processPayment');
	Route::post('/process-payment/{id}/{payment_mode}', 'Customers\CustomersController@processPayment');
	Route::get('/process-payment', 'Customers\CustomersController@processBranchPayment');

	Route::get('/payment-response', 'Customers\CustomersController@paymentResponse');
	Route::post('/payment-response', 'Customers\CustomersController@paymentResponse');

	Route::post('/cash-payment-response', 'Customers\CustomersController@cashPaymentResponse');
	Route::post('/cheque-payment-response', ['as' => 'customers.cheque.store', 'uses' => 'Customers\CustomersController@chequePaymentResponse']);

	Route::get('/add-technical/{id}', 'Customers\CustomersController@addTechnical');
	Route::put('/add-technical/{id}', ['as' => 'customers.addtechnical', 'uses' => 'Customers\CustomersController@updateTechnical']);

    Route::get('/getmodels/{manufacturer}', 'Customers\CustomersController@GetModels');
    Route::get('/getmodels1/{manufacturer}', 'Customers\CustomersController@GetSTBModels');

	Route::get('/get_smartbox/{op_id}', 'Customers\CustomersController@get_smartbox');
   
    Route::get('/getserial/{stb_model}', 'Customers\CustomersController@GetSerialNumber');
     Route::get('/getserial1/{stb_model}', 'Customers\CustomersController@GetSTBSerialNumber');

	Route::put('/user-activate/{id}', ['as' => 'customers.useractivate', 'uses' => 'Customers\CustomersController@updateActivateUser']);
	 Route::get('/user-activate/{id}', 'Customers\CustomersController@activateUser');

	 Route::get('/smartbox-user-activate/{id}', 'Customers\CustomersController@smartboxActivateUser');
	 Route::post('/first-time-activation', ['as' => 'customers.firsttimeactivation', 'uses' => 'Customers\CustomersController@firstTimeActivation']);

	Route::get('/delete/{id}', 'Customers\CustomersController@destroy');
	Route::get('/branch-franchises/{city}/{branch}', 'Customers\CustomersController@getCityBranchFranchises');
	Route::get('/branch-franchises/{branch}', 'Customers\CustomersController@getBranchFranchises');
	Route::get('/branch-franchisesextra/{city}/{branch}', 'Customers\CustomersController@getBranchFranchisesExtra');
	//Route::get('/branch-franchisesextraedit/{city}/{branch}', 'Customers\CustomersController@getBranchFranchisesExtraEdit');
	Route::get('/branch-franchisesextraedit/{city}/{branch}/{user_id}', 'Customers\CustomersController@getBranchFranchisesExtraEdit');
	
	Route::get('/get_op_id/{id}', 'Customers\CustomersController@getOperatorId');

	Route::get('/package-subpackages/{package}', 'Customers\CustomersController@getPackageSubPackages');
	Route::get('/package-combo-subpackages/{package}', 'Customers\CustomersController@getComboPackageSubPackages');

	Route::get('/view/general-info/{viewtype}/{customerId}/view-general-info',
		['as' => 'customers.viewGeneralInfo', 'uses' => 'Customers\CustomersController@viewGeneralInfo']
    );

	Route::get('/followupdata/fetch-data/{customer_id}', 'Customers\CustomersController@GetFollowupdata');

	Route::get('/view/general-info/{viewtype}/{customerId}/renew',
		['as' => 'customers.renewGeneralInfo', 'uses' => 'Customers\RenewUsersController@renewGeneralInfo']
    );

	Route::post('/renewal-user-store/{viewtype}/{customerId}', [
		'as' => 'customers.renewaluser.store',
		'uses' => 'Customers\RenewUsersController@customersRenewaluser'
	]);

	Route::post('/renewal-user-confirm/{renewId}/{viewtype}/{customerId}', [
		'as' => 'customers.renewaluser.confirm',
		'uses' => 'Customers\RenewUsersController@customersRenewaluserConfirm'
	]);
 
	Route::get('/view/general-info/{renewId}/{viewtype}/{customerId}/renewal-confiramtion',
		['as' => 'customers.renewalConfiramtion', 'uses' => 'Customers\RenewUsersController@renewalConfiramtion']
    );

	Route::get('/view/general-info/{viewtype}/{customerId}/scheduled-renewal',
		['as' => 'customers.scheduledRenewal', 'uses' => 'Customers\RenewUsersController@scheduledRenewal']
    );

	Route::get('/view/general-info/{viewtype}/{customerId}/scheduled-renewal-confirm',
		['as' => 'customers.scheduledRenewalConfirm', 'uses' => 'Customers\RenewUsersController@scheduledRenewalConfirm']
    );

	Route::get('/renewal-history',
		['as' => 'customers.renewalHistory', 'uses' => 'Customers\RenewUsersController@renewalHistory']
    );

	Route::get('/view/general-info/{viewtype}/{customerId}/renewal-history',
		['as' => 'customers.renewalHistory', 'uses' => 'Customers\RenewUsersController@renewalGeneralInfoHistory']
    );

	Route::get('/renew-user-history/delete/{id}', 'Customers\RenewUsersController@renewHistoryDestroy');

	Route::get('/renewal-unpaid-invoices',
		['as' => 'customers.customerRenewalInvoices', 'uses' => 'Customers\RenewUsersController@customerRenewalInvoices']
    );

	Route::get('/renewal-paid-invoices',
		['as' => 'customers.customerRenewalPaidInvoices', 'uses' => 'Customers\RenewUsersController@customerRenewalPaidInvoices']
    );

	Route::get('/view/general-info/{viewtype}/{customerId}/invoices',
		['as' => 'customers.customerRenewalInvoices', 'uses' => 'Customers\RenewUsersController@customerGeneralInfoRenewalInvoices']
    );


	Route::get('/renew-user-invoices/pay/{invoiceId}/form','Customers\RenewUsersController@payInvoiceForm');
	Route::post('/renew-user-invoices/pay-invoice/{invoiceId}',[
		'uses' => 'Customers\RenewUsersController@payInvoiceStore',
		'as' => 'in.pay-invoice-store'
	]);

	Route::get('/renew-user-invoices/payment-pickup/{invoiceId}/form','Customers\RenewUsersController@paymentPickupForm');
	Route::post('/renew-user-invoices/payment-pickup/{invoiceId}/',[
		'uses' => 'Customers\RenewUsersController@paymentPickupStore',
		'as' => 'in.payment-pickup-store'
	]);
	Route::get('/renew-user-invoice/print/{id}', 'Customers\RenewUsersController@printInvoice');

	Route::get('/renew-user-invoice/download/{id}', 'Customers\RenewUsersController@downloadInvoice');


	Route::get('/renew-user-invoice/edit/{id}', 'Customers\RenewUsersController@invoiceEdit');
	Route::put('/invoice/{id}', ['as' => 'io.update', 'uses' => 'Customers\RenewUsersController@invoiceUpdate']);

	Route::get('/renew-user-invoice/delete/{id}', 'Customers\RenewUsersController@invoiceDestroy');
	Route::get('/renew-user-invoice/cancel/{id}', 'Customers\RenewUsersController@invoiceCancel');

	Route::get('/renew-user-invoices/all-cancelled', 'Customers\RenewUsersController@cancelledInvoices');
	Route::get('/renew-user-invoices/all-deleted', 'Customers\RenewUsersController@deletedInvoices');

	Route::get('/renew-user-invoices/cheque-invoices', 'Customers\RenewUsersController@chequeInvoices');
	Route::get('/renew-user-invoices/cheque-bounce-invoices', 'Customers\RenewUsersController@chequeBounceInvoices');

	Route::get('/renew-user-invoices/cheque-update/{id}/form', 'Customers\RenewUsersController@chequeUpdateFormInvoices');
	Route::post('/renew-user-invoices/cheque-update/{id}/form',
	  ['as' => 'in.check-update-store', 'uses' => 'Customers\RenewUsersController@chequeUpdateStoreInvoices']
	);

	Route::get('/renew-user-invoice/send-mail-form/{id}', 'Customers\RenewUsersController@sendMailForm');

	Route::post('/renew-user-invoice/send-mail/{id}',
		[
		  'uses' => 'Customers\RenewUsersController@invoiceSendEmail',
          'as' => 'in.send-mail-action'
		]);

	Route::get('/scheduled-renewal/execute', 'Customers\RenewUsersController@renewUserScheduledExecute');
	Route::get('/proepsect', 'Customers\CustomersController@AddProspect');
	Route::post('/submit5', ['as' => 'customers.storeproespect', 'uses' => 'Customers\CustomersController@storeproespect']);
	Route::get('/competator', 'Customers\CustomersController@CompetatorIndex');
	Route::get('/lead/edit/{id}', 'Customers\CustomersController@editcompetator');
	Route::put('/updatecompetator/{id}', ['as' => 'customers.updatecompetator', 'uses' => 'Customers\CustomersController@updatecompetator']);
	Route::put('/updatefollowuplist/{id}', ['as' => 'customers.updatefollowuplist', 'uses' => 'Customers\CustomersController@updatefollowuplist']);

    Route::get('/prospect/edit/{id}', 'Customers\CustomersController@editprospect');
    Route::get('/intrested', 'Customers\CustomersController@intrestedindex');

	Route::get('/add-competator', 'Customers\CustomersController@AddCompetator');
	Route::post('/submit6', ['as' => 'customers.storecompetator', 'uses' => 'Customers\CustomersController@storecompetator']);
    Route::get('/followup', 'Customers\CustomersController@FollowupIndex');

Route::post('/submit7', ['as' => 'customers.updatefollowmdata', 'uses' => 'Customers\CustomersController@updatefollowmdata']);
Route::post('/submit8', ['as' => 'customers.updateintresteddata', 'uses' => 'Customers\CustomersController@updateintresteddata']);

	

});

    
Route::get('/broadband-subpackages-price/{package}/{subpackage}', 'CustomersController@getBroadbandSubPackagesPrice');
Route::get('/combo-subpackages-price/{package}/{combo_sub_package}', 'CustomersController@getComboSubPackagesPrice');
Route::get('/cable-subpackages-price/{package}/{subpackage}', 'CustomersController@getCableTvSubPackagesPrice');
Route::post('/iptv-subpackages-price', 'CustomersController@getIptvSubPackagesPrice');

Route::get('branch/customers/view/general-info/{customerId}', ['as' => 'customers.viewGeneralInfo', 'uses' => 'CustomersController@viewGeneralInfo']);
Route::get('franchise/customers/view/general-info/{customerId}', ['as' => 'customers.viewGeneralInfo', 'uses' => 'CustomersController@viewGeneralInfo']);
Route::get('distributor/customers/view/general-info/{customerId}', ['as' => 'customers.viewGeneralInfo', 'uses' => 'CustomersController@viewGeneralInfo']);

/* Reports */
Route::prefix('admin/reports')->group(function() {
    Route::get('/', 'Reports\ReportsController@index');
    //deposit reports
	Route::get('/deposit-reports', ['as' => 'reports.index', 'uses' => 'Reports\ReportsController@index']);
    //onine reports
	Route::get('/online-payments', ['as' => 'reports.onlinePayments', 'uses' => 'Reports\ReportsController@onlinePayments']);  
	// Logs Reports
	Route::get('/logs', ['as' => 'reports.logindex', 'uses' => 'Reports\ReportsController@logindex']);
	Route::get('/newb', 'Reports\ReportsController@branchindex');
	Route::get('/newf', 'Reports\ReportsController@franchiseindex');
	Route::get('/frcuspay', 'Reports\ReportsController@franchisecustomerpay');
	
	

});

/* Frontend */
Route::get('/customer/login', 'Frontend\CustomerController@login');
Route::get('/distributor/login', 'Frontend\DistributorController@login');
Route::get('/branch/login', 'Frontend\BranchController@login');
Route::get('/franchise/login', 'Frontend\FranchiseController@login');
Route::get('customer/cron-expiry-connections', 'Frontend\CustomerController@expiryCustomerStatus');

/* Customer */
Route::prefix('customer')->middleware(['role:customer'])->group(function() {
	Route::get('/dashboard', 'Frontend\CustomerController@dashboard');
	Route::get('/profile', 'Frontend\CustomerController@profile');
	Route::put('/profile', ['as' => 'customer.profile', 'uses' => 'Frontend\CustomerController@updateProfile']);
	Route::get('/changepassword', 'Frontend\CustomerController@changepassword');
	Route::put('/changepassword', ['as' => 'customer.changepassword', 'uses' => 'Frontend\CustomerController@updateChangePassword']);
	
	Route::get('/change-package', 'Frontend\CustomerController@changePackage');
	Route::put('/change-package', ['as' => 'customer.change-package', 'uses' => 'Frontend\CustomerController@updateChangePackage']);
	
	Route::get('/pay-online', 'Frontend\CustomerController@renewCustomer');
	Route::post('/pay-online', 'Frontend\CustomerController@renewCustomer');
	Route::get('/renew-response', 'Frontend\CustomerController@renewResponse');
	Route::post('/renew-response', 'Frontend\CustomerController@renewResponse');
	
	Route::get('/payment-history', 'Frontend\CustomerController@paymentHistory');
	
	Route::get('/complaints','Frontend\CustomerController@myComplaints');
	
	Route::get('/connection-types/{type}', 'Frontend\CustomerController@getConnectionTypeDetails');
	Route::get('/package-subpackages/{package}', 'Frontend\CustomerController@getPackageSubPackages');
	Route::get('/sub-package/{subpackage}', 'Frontend\CustomerController@getSubPackageDetails');
	
	Route::get('/package-combo-subpackages/{package}', 'Frontend\CustomerController@getComboPackageSubPackages');
	Route::get('/combo-sub-package/{subpackage}', 'Frontend\CustomerController@getComboSubPackageDetails');
  
	Route::get('/renewal-history/{customerId}',
		['as' => 'customers.renewalHistory', 'uses' => 'Frontend\CustomerController@renewalHistory']
    );

	Route::get('/customer-renewal-invoices/{customerId}',
		['as' => 'customers.customerRenewalInvoices', 'uses' => 'Frontend\CustomerController@customerRenewalInvoices']
    );
});


/* Distributor */
Route::prefix('distributor')->middleware(['role:distributor'])->group(function() {
	Route::get('/dashboard', 'Frontend\DistributorController@dashboard');
	Route::get('/profile', 'Frontend\DistributorController@profile');
	Route::put('/profile', ['as' => 'distributor.profile', 'uses' => 'Frontend\DistributorController@updateProfile']);
	Route::get('/changepassword', 'Frontend\DistributorController@changepassword');
	Route::put('/changepassword', ['as' => 'distributor.changepassword', 'uses' => 'Frontend\DistributorController@updateChangePassword']);
	
	//Complaints
	Route::get('/complaints','Frontend\DistributorController@allComplaints');
	Route::get('/complaints/open', 'Frontend\DistributorController@openComplaints');
	Route::get('/complaints/inprogress', 'Frontend\DistributorController@inprogressComplaints');
	Route::get('/complaints/resolved', 'Frontend\DistributorController@resolvedComplaints');
	Route::get('/complaints/closed', 'Frontend\DistributorController@closedComplaints');
	
	//Customers
	Route::get('/customers/', 'Frontend\DistributorCustomersController@index');
    Route::get('/customers/new', 'Frontend\DistributorCustomersController@newCustomers');
    Route::get('/customers/technical', 'Frontend\DistributorCustomersController@technicalCustomers');
    Route::get('/customers/schedule', 'Frontend\DistributorCustomersController@scheduleCustomers');
	Route::get('/customers/activation', 'Frontend\DistributorCustomersController@activationCustomers');
	Route::get('/customers/active', 'Frontend\DistributorCustomersController@activeCustomers');
	Route::get('/customers/expired', 'Frontend\DistributorCustomersController@expiredCustomers');
    Route::get('/customers/closed', 'Frontend\DistributorCustomersController@closedCustomers');
	Route::get('/customers/renew/{id}', 'Frontend\DistributorCustomersController@renewUser');
	Route::get('/customers/add-technical/{id}', 'Frontend\DistributorCustomersController@addTechnical');
	Route::get('/customers/user-activate/{id}', 'Frontend\DistributorCustomersController@activateUser');
});


/* Branch */
Route::prefix('branch')->middleware(['role:branch'])->group(function() {
	Route::get('/dashboard', 'Frontend\BranchController@dashboard');
	Route::get('/profile', 'Frontend\BranchController@profile');
	Route::put('/profile', ['as' => 'branch.profile', 'uses' => 'Frontend\BranchController@updateProfile']);
	Route::get('/changepassword', 'Frontend\BranchController@changepassword');
	Route::put('/changepassword', ['as' => 'branch.changepassword', 'uses' => 'Frontend\BranchController@updateChangePassword']);
	
	//Complaints
	Route::get('/complaints','Frontend\BranchController@allComplaints');
	Route::get('/complaints/open', 'Frontend\BranchController@openComplaints');
	Route::get('/complaints/inprogress', 'Frontend\BranchController@inprogressComplaints');
	Route::get('/complaints/resolved', 'Frontend\BranchController@resolvedComplaints');
	Route::get('/complaints/closed', 'Frontend\BranchController@closedComplaints');
	
	//Customers
	Route::get('/customers/', 'Frontend\BranchCustomersController@index');
    Route::get('/customers/new', 'Frontend\BranchCustomersController@newCustomers');
    Route::get('/customers/technical', 'Frontend\BranchCustomersController@technicalCustomers');
    Route::get('/customers/schedule', 'Frontend\BranchCustomersController@scheduleCustomers');
	Route::get('/customers/activation', 'Frontend\BranchCustomersController@activationCustomers');
	Route::get('/customers/active', 'Frontend\BranchCustomersController@activeCustomers');
	Route::get('/customers/expired', 'Frontend\BranchCustomersController@expiredCustomers');
    Route::get('/customers/closed', 'Frontend\BranchCustomersController@closedCustomers');
	Route::get('/customers/renew/{id}', 'Frontend\BranchCustomersController@renewUser');
	Route::get('/customers/add-technical/{id}', 'Frontend\BranchCustomersController@addTechnical');
	Route::get('/customers/user-activate/{id}', 'Frontend\FranchiseCustomersController@activateUser');
        
        Route::get('/add-payment', 'Frontend\BranchCustomersController@addPayment');
        Route::post('/add-payment', 'Frontend\BranchCustomersController@addPayment');
        
        Route::get('/payment-response', 'Frontend\BranchCustomersController@paymentResponse');
	Route::post('/payment-response', 'Frontend\BranchCustomersController@paymentResponse');
	
});

/* Franchise */
Route::prefix('franchise')->middleware(['role:franchise'])->group(function() {
	Route::get('/dashboard', 'Frontend\FranchiseController@dashboard');
	Route::get('/profile', 'Frontend\FranchiseController@profile');
	Route::put('/profile', ['as' => 'franchise.profile', 'uses' => 'Frontend\FranchiseController@updateProfile']);
	Route::get('/changepassword', 'Frontend\FranchiseController@changepassword');
	Route::put('/changepassword', ['as' => 'franchise.changepassword', 'uses' => 'Frontend\FranchiseController@updateChangePassword']);
	
	//Complaints
	Route::get('/complaints','Frontend\FranchiseController@allComplaints');
	Route::get('/complaints/open', 'Frontend\FranchiseController@openComplaints');
	Route::get('/complaints/inprogress', 'Frontend\FranchiseController@inprogressComplaints');
	Route::get('/complaints/resolved', 'Frontend\FranchiseController@resolvedComplaints');
	Route::get('/complaints/closed', 'Frontend\FranchiseController@closedComplaints');
	
	//Customers
	Route::get('/customers/', 'Frontend\FranchiseCustomersController@index');
    Route::get('/customers/new', 'Frontend\FranchiseCustomersController@newCustomers');
    Route::get('/customers/technical', 'Frontend\FranchiseCustomersController@technicalCustomers');
    Route::get('/customers/schedule', 'Frontend\FranchiseCustomersController@scheduleCustomers');
	Route::get('/customers/activation', 'Frontend\FranchiseCustomersController@activationCustomers');
	Route::get('/customers/active', 'Frontend\FranchiseCustomersController@activeCustomers');
	Route::get('/customers/expired', 'Frontend\FranchiseCustomersController@expiredCustomers');
    Route::get('/customers/closed', 'Frontend\FranchiseCustomersController@closedCustomers');
	Route::get('/customers/create', 'Frontend\FranchiseCustomersController@create');
	Route::post('/customers/submit', ['as' => 'franchise.customers.store', 'uses' => 'Frontend\FranchiseCustomersController@store']);
	Route::get('/customers/edit/{id}', 'Frontend\FranchiseCustomersController@edit');
	Route::put('/customers/{id}', ['as' => 'franchise.customers.update', 'uses' => 'Frontend\FranchiseCustomersController@update']);
	Route::get('/customers/renew/{id}', 'Frontend\FranchiseCustomersController@renewUser');
	Route::post('/customers/renew/{id}', 'Frontend\FranchiseCustomersController@renewUser');
	Route::get('/customers/add-technical/{id}', 'Frontend\FranchiseCustomersController@addTechnical');
	Route::put('/customers/add-technical/{id}', ['as' => 'franchise.customers.addtechnical', 'uses' => 'Frontend\FranchiseCustomersController@updateTechnical']);
    Route::get('/customers/user-activate/{id}', 'Frontend\FranchiseCustomersController@activateUser');
	Route::put('/customers/user-activate/{id}', ['as' => 'franchise.customers.useractivate', 'uses' => 'Frontend\FranchiseCustomersController@updateActivateUser']);
        
	Route::get('/add-payment', 'Frontend\FranchiseCustomersController@addPayment');
	Route::post('/add-payment', 'Frontend\FranchiseCustomersController@addPayment');
	
	Route::get('/payment-response', 'Frontend\FranchiseCustomersController@paymentResponse');
	Route::post('/payment-response', 'Frontend\FranchiseCustomersController@paymentResponse');
});


Route::prefix('admin/inventory')->group(function() {
	
	//warehouse
	Route::get('/warehouse', 'Inventory\WarehouseController@index');
	Route::get('/warehouse/create', 'Inventory\WarehouseController@create');
	Route::post('/warehouse/submit', ['as' => 'warehouse.store', 'uses' => 'Inventory\WarehouseController@store']);
	Route::get('/warehouse/edit/{id}', 'WarehouseController@edit');
	Route::put('/warehouse/{id}', ['as' => 'warehouse.update', 'uses' => 'Inventory\WarehouseController@update']);
	Route::get('/warehouse/delete/{id}', 'Inventory\WarehouseController@destroy');
	

	//vendors & suppliers
	Route::get('/vendors-suppliers', ['as' => 'vendors.index', 'uses' => 'Inventory\VendorsController@index']);
	Route::get('/vendors-suppliers/create', 'Inventory\VendorsController@create');
	Route::post('/vendors-suppliers/submit', ['as' => 'vendors.store', 'uses' => 'Inventory\VendorsController@store']);
	Route::get('/vendors-suppliers/edit/{id}', 'Inventory\VendorsController@edit');
	Route::put('/vendors-suppliers/{id}', ['as' => 'vendors.update', 'uses' => 'Inventory\VendorsController@update']);
	Route::get('/vendors-suppliers/delete/{id}', 'Inventory\VendorsController@destroy');

	//product categories
	Route::get('/product-categories', 'Inventory\ProductCategoriesController@index');
	Route::get('/product-categories/create', 'Inventory\ProductCategoriesController@create');
	Route::post('/product-categories/submit', ['as' => 'product-categories.store', 'uses' => 'Inventory\ProductCategoriesController@store']);
	Route::get('/product-categories/edit/{id}', 'Inventory\ProductCategoriesController@edit');
	Route::put('/product-categories/{id}', ['as' => 'product-categories.update', 'uses' => 'Inventory\ProductCategoriesController@update']);
	Route::get('/product-categories/delete/{id}', 'Inventory\ProductCategoriesController@destroy');

	Route::get('/product-categories/subcategories/{id}', 'Inventory\ProductCategoriesController@getSubCategories');

	// products
	Route::get('/products', 'Inventory\ProductsController@index');
	Route::get('/products/fibern/{productId}', 'Inventory\ProductsController@GetCorV'); // aded by durga
	Route::get('/products/create', 'Inventory\ProductsController@create');
	Route::post('/products/submit', ['as' => 'products.store', 'uses' => 'Inventory\ProductsController@store']);
	Route::get('/products/view/{id}', ['as' => 'products.view', 'uses' => 'Inventory\ProductsController@show']);
	Route::get('/products/edit/{id}', 'Inventory\ProductsController@edit');
	Route::put('/products/{id}', ['as' => 'products.update', 'uses' => 'Inventory\ProductsController@update']);
	Route::get('/products/delete/{id}', 'Inventory\ProductsController@destroy');
	Route::get('/products/customer/{id}', ['as' => 'productcustomer.view', 'uses' => 'Inventory\ProductsController@CustomerTransferShow']);
	Route::get('/products/items/{cateogry}', 'Inventory\ProductsController@getItemsCategoryWise');
	
    // stocks
	Route::get('/stocks', 'Inventory\StocksController@index');
    Route::get('/stocks/fibermanage', 'Inventory\StocksController@fiberindex'); // added by durga
	Route::get('/stocks/fiber', 'Inventory\StocksController@createfiber'); // added by durga
	Route::get('/stocks/add-fiberproduct', 'Inventory\StocksController@createfiberproduct'); // added by durga
    Route::post('/stocks/fiberproductsubmit', ['as' => 'fiber.storefiberproduct', 'uses' => 'Inventory\ProductsController@storefiberproduct']); // added by durga
    Route::post('/stocks/fibersubmit', ['as' => 'fiber.storefiber', 'uses' => 'Inventory\StocksController@storefiber']); // added by durga
    Route::get('/stocks/tools', 'Inventory\StocksController@createtools'); // added by durga
    Route::get('/stocks/utilities', 'Inventory\StocksController@createutilities'); // added by durga
    Route::get('/stocks/create-cat', 'Inventory\ProductsController@createcat'); // added by durga

	Route::post('/submitcat', ['as' => 'storecate', 'uses' => 'Inventory\ProductsController@storecat']);
	
	Route::post('/subittools', ['as' => 'storetools', 'uses' => 'Inventory\ProductsController@storetools']);
	Route::post('/submititems', ['as' => 'storeitems', 'uses' => 'Inventory\ProductsController@storeitems']);
	Route::post('/utility_form_btn', ['as' => 'storeutility', 'uses' => 'Inventory\ProductsController@storeutility']);
	Route::post('/utility_distributor_form_btn', ['as' => 'storeutilitydistributor', 'uses' => 'Inventory\ProductsController@storedistutility']);
	Route::post('/utility_branch_form_btn', ['as' => 'storeutilitybranch', 'uses' => 'Inventory\ProductsController@storebranchutility']);
	
	Route::post('/utility_city_form_btn', ['as' => 'storeutilitycity', 'uses' => 'Inventory\ProductsController@storeutilitycity']);
	
    Route::get('/stocks/toolslist', 'Inventory\StocksController@ToolsStock'); // added by durga
    Route::get('/stocks/utilitieslist', 'Inventory\StocksController@utilitieslist'); // added by durga
    
    Route::get('/stocks/employee-tools-list', 'Inventory\StocksController@EmployeeToolsStock'); // added by durga
    Route::get('/stocks/franchise-tools-list', 'Inventory\StocksController@FranchiseToolsStock'); // added by durga
    Route::get('/stocks/branch_tools_list', 'Inventory\StocksController@BranchToolsStock'); // added by durga


	Route::get('/stocks/add-stock', 'Inventory\StocksController@create');
	Route::get('/stocks/add-fiberstock', 'Inventory\StocksController@createstockfiber'); // added by durga
	Route::post('/stocks/submit', ['as' => 'stocks.store', 'uses' => 'Inventory\StocksController@store']);
	Route::get('/stocks/edit-stock/{id}', 'Inventory\StocksController@edit');
	Route::put('/stocks/{id}', ['as' => 'stocks.update', 'uses' => 'Inventory\StocksController@update']);
	Route::get('/stocks/delete/{id}', 'Inventory\StocksController@destroy');
	Route::get('/stocks/view-history/{id}', 'Inventory\StocksController@viewHistory');
	Route::get('/stocks/stock-upload-history', 'Inventory\StocksController@stockuploadhistory');
	Route::get('/stocks/download-sample-csv', 'Inventory\StocksController@download');
	Route::get('/stocks/fiberstock-upload-history', 'Inventory\StocksController@fiberstockuploadhistory'); // added by durga
	Route::get('/stocks/drum_numbers/{fiber_company_name}', 'Inventory\StocksController@GetDrumNumbers'); // added by durga
	Route::get('/stocks/fiber_start/{fiber_code}', 'Inventory\StocksController@GetReadingNumbers'); //added by durga
	Route::get('/stocks/fiber_start1/{fiber_code}', 'Inventory\StocksController@GetReadingNumbers1'); //added by durga
	Route::get('/stocks/fiber_core/{fiber_code}', 'Inventory\StocksController@GetFiberCore'); // added by durgafiber_start2
	Route::get('/stocks/fiber_start2/{fiber_code}', 'Inventory\StocksController@GetReadingNumbers2'); // added by durgafiber_start2
	Route::get('/stocks/core/{productId}', 'Inventory\StocksController@GetFiberCoreValue'); //added by durga
    Route::get('/stocks/getfibercore/{productId}', 'Inventory\StocksController@corevalue'); //added by durga
	
	Route::get('/stocks/transfer', 'Inventory\StocksController@transfer');
	Route::post('/stocks/transfersubmit', ['as' => 'stocks.transfer.submit', 'uses' => 'Inventory\StocksController@submittransfer']);
	Route::post('/stocks/transfermultiplestocksubmit', ['as' => 'stocks.addmultipletransfer-stock.submit', 'uses' => 'Inventory\StocksController@addmultipletransferstocksubmit']);

	Route::get('/stocks/transfer-stock/{id}', 'Inventory\StocksController@transferstock');
	Route::post('/stocks/transferstocksubmit', ['as' => 'stocks.transferstock.submit', 'uses' => 'Inventory\StocksController@transferstocksubmit']);
	

	Route::get('/stocks/warehouse-wise', 'Inventory\StocksController@warehouseStocks');
	Route::get('/stocks/fiberwarehouse-wise', 'Inventory\StocksController@warehouseFiberStocks'); // added by durga
	Route::get('/stocks/transfer-to-warehouse/{stakeholder}/{id}', 'Inventory\StocksController@transferWarehouse');
	Route::post('/stocks/transfer-to-warehousesubmit', ['as' => 'stocks.transfer-to-warehouse.submit', 'uses' => 'Inventory\StocksController@submitTransferWarehouse']);

	Route::get('/stocks/distributor-wise', 'Inventory\StocksController@distributorStocks');
	Route::get('/stocks/fiberdistributor-wise', 'Inventory\StocksController@distributorfiberStocks');
	Route::get('/stocks/transfer-to-distributor/{stakeholder}/{id}', 'Inventory\StocksController@transferDistributor');
	Route::post('/stocks/transfer-to-distributorsubmit', ['as' => 'stocks.transfer-to-distributor.submit', 'uses' => 'Inventory\StocksController@submitTransferDistributor']);

	Route::get('/stocks/branch-wise', 'Inventory\StocksController@branchStocks');
	Route::get('/stocks/fiberbranch-wise', 'Inventory\StocksController@branchfiberStocks'); // added by durga
	Route::get('/stocks/transfer-to-branch/{stakeholder}/{id}', 'Inventory\StocksController@transferBranch');
	Route::post('/stocks/transfer-to-branchsubmit', ['as' => 'stocks.transfer-to-branch.submit', 'uses' => 'Inventory\StocksController@submitTransferBranch']);

	Route::get('/stocks/franchise-wise', 'Inventory\StocksController@franchiseStocks');
	Route::get('/stocks/fiberfranchise-wise', 'Inventory\StocksController@fiberfranchiseStocks'); // added by durga
	Route::get('/stocks/transfer-to-franchise/{stakeholder}/{id}', 'Inventory\StocksController@transferFranchise');
	Route::post('/stocks/transfer-to-franchisesubmit', ['as' => 'stocks.transfer-to-franchise.submit', 'uses' => 'Inventory\StocksController@submitTransferFranchise']);

	Route::get('/stocks/employee-fiberwise', 'Inventory\StocksController@employeeFiberStocks');
	Route::get('/stocks/employee-wise', 'Inventory\StocksController@employeeStocks');
	Route::get('/stocks/transfer-to-employee/{stakeholder}/{id}', 'Inventory\StocksController@transferEmployee');
	Route::post('/stocks/transfer-to-employeesubmit', ['as' => 'stocks.transfer-to-employee.submit', 'uses' => 'Inventory\StocksController@submitTransferEmployee']);

	Route::get('/stocks/remove-transfer-stock/{id}', 'Inventory\StocksController@removetransferstock');

	//Route::post('/stocks/transfersubmit', ['as' => 'stocks.transfer.submit', 'uses' => 'Inventory\StocksController@submittransfer']);
	
});


Route::get('inventory/get-warehouse-by-city/{city}', 'Inventory\StocksController@getWarehouseByCity');
Route::get('get-employees-by-city/{city}', 'Inventory\StocksController@getEmployeesByCity');

Route::get('inventory/get-distributor-by-city/{city}', 'Inventory\StocksController@getDistributorUserByCity');
Route::get('inventory/get-branch-by/{city}/{distributor}', 'Inventory\StocksController@getBranchUserByCity');

Route::get('inventory/get-franchise-by/{city}/{distributor}/{branch}', 'Inventory\StocksController@getFranchiseUser');

Route::get('inventorytransferajax',[
	'uses' => 'Inventory\StocksController@autoCompleteInventory',
	'as' => 'search.stock.front.json'
]);

Route::get('inventoryemployeeajax',[
	'uses' => 'Inventory\StocksController@autoCompleteEmployee',
	'as' => 'search.employee.front.json'
]);

Route::get('inventorybrandajax',[
	'uses' => 'Inventory\StocksController@autoCompleteBrand',
	'as' => 'search.brand.front.json'
]);

/* Packages */
//Route::prefix('admin/connection-types')->middleware(['role:superadmin'])->group(function() {
Route::prefix('admin/connection-types')->group(function() {
    Route::get('/', 'Packages\ConnectionTypesController@index');
	Route::get('/create', 'Packages\ConnectionTypesController@create');
	Route::post('/submit', ['as' => 'connection-types.store', 'uses' => 'Packages\ConnectionTypesController@store']);
	Route::get('/edit/{id}', 'Packages\ConnectionTypesController@edit');
	Route::put('/{id}', ['as' => 'connection-types.update', 'uses' => 'Packages\ConnectionTypesController@update']);
	
	Route::get('/details/{id}', 'Packages\ConnectionTypesController@getDetails');
	Route::get('/delete/{id}', 'Packages\ConnectionTypesController@destroy');
});

//Combo
Route::prefix('admin/combo-packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\ComboPackagesController@index');
	Route::get('/create', 'Packages\ComboPackagesController@create');
	Route::post('/submit', ['as' => 'combo-packages.store', 'uses' => 'Packages\ComboPackagesController@store']);
	Route::get('/edit/{id}', 'Packages\ComboPackagesController@edit');
	Route::put('/{id}', ['as' => 'combo-packages.update', 'uses' => 'Packages\ComboPackagesController@update']);
	Route::get('/delete/{id}', 'Packages\ComboPackagesController@destroy');
});

Route::prefix('admin/combo-sub-packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\ComboSubPackagesController@index');
	Route::get('/{package}/create', 'Packages\ComboSubPackagesController@create');
	Route::post('/{package}/submit', ['as' => 'combo-sub-packages.store', 'uses' => 'Packages\ComboSubPackagesController@store']);
	Route::get('/edit/{id}', 'Packages\ComboSubPackagesController@edit');
	Route::put('/{id}', ['as' => 'combo-sub-packages.update', 'uses' => 'Packages\ComboSubPackagesController@update']);
	Route::get('/delete/{id}', 'Packages\ComboSubPackagesController@destroy');
});


//Broadband
Route::prefix('admin/broadband-packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\BroadbandController@index');
	Route::get('/create', 'Packages\BroadbandController@create');
	Route::post('/submit', ['as' => 'broadband-packages.store', 'uses' => 'Packages\BroadbandController@store']);
	Route::get('/edit/{id}', 'Packages\BroadbandController@edit');
	Route::put('/{id}', ['as' => 'broadband-packages.update', 'uses' => 'Packages\BroadbandController@update']);
	Route::get('/delete/{id}', 'Packages\BroadbandController@destroy');
});

Route::prefix('admin/broadband-sub-packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\BroadbandSubPackagesController@index');
	Route::get('/{package}/create', 'Packages\BroadbandSubPackagesController@create');
	Route::post('/{package}/submit', ['as' => 'broadband-sub-packages.store', 'uses' => 'Packages\BroadbandSubPackagesController@store']);
	Route::get('/edit/{id}', 'Packages\BroadbandSubPackagesController@edit');
	Route::put('/{id}', ['as' => 'broadband-sub-packages.update', 'uses' => 'Packages\BroadbandSubPackagesController@update']);
	Route::get('/delete/{id}', 'Packages\BroadbandSubPackagesController@destroy');
});

//IPTV
Route::prefix('admin/iptv/base')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\IptvBaseController@index');
	Route::get('/create', 'Packages\IptvBaseController@create');
	Route::post('/submit', ['as' => 'iptv-base-packages.store', 'uses' => 'Packages\IptvBaseController@store']);
	Route::get('/edit/{id}', 'Packages\IptvBaseController@edit');
	Route::put('/{id}', ['as' => 'iptv-base-packages.update', 'uses' => 'Packages\IptvBaseController@update']);
	Route::get('/delete/{id}', 'Packages\IptvBaseController@destroy');
});

Route::prefix('admin/iptv/local')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\IptvLocalController@index');
	Route::get('/create', 'Packages\IptvLocalController@create');
	Route::post('/submit', ['as' => 'iptv-local-packages.store', 'uses' => 'Packages\IptvLocalController@store']);
	Route::get('/edit/{id}', 'Packages\IptvLocalController@edit');
	Route::put('/{id}', ['as' => 'iptv-local-packages.update', 'uses' => 'Packages\IptvLocalController@update']);
	Route::get('/delete/{id}', 'Packages\IptvLocalController@destroy');
});

Route::prefix('admin/iptv/allacart')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\IptvAllacartController@index');
	Route::get('/create', 'Packages\IptvAllacartController@create');
	Route::post('/submit', ['as' => 'iptv-allacart-packages.store', 'uses' => 'Packages\IptvAllacartController@store']);
	Route::get('/edit/{id}', 'Packages\IptvAllacartController@edit');
	Route::put('/{id}', ['as' => 'iptv-allacart-packages.update', 'uses' => 'Packages\IptvAllacartController@update']);
	Route::get('/delete/{id}', 'Packages\IptvAllacartController@destroy');
});

Route::prefix('admin/iptv/packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\IptvPackagesController@index');
	Route::get('/create', 'Packages\IptvPackagesController@create');
	Route::post('/submit', ['as' => 'iptv-package-packages.store', 'uses' => 'Packages\IptvPackagesController@store']);
	Route::get('/edit/{id}', 'Packages\IptvPackagesController@edit');
	Route::put('/{id}', ['as' => 'iptv-package-packages.update', 'uses' => 'Packages\IptvPackagesController@update']);
	Route::get('/delete/{id}', 'Packages\IptvPackagesController@destroy');
});

//Cable
Route::prefix('admin/cable-packages/base')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\CableBaseController@index');
	Route::get('/create', 'Packages\CableBaseController@create');
	Route::post('/submit', ['as' => 'cable-base-packages.store', 'uses' => 'Packages\CableBaseController@store']);
	Route::get('/edit/{id}', 'Packages\CableBaseController@edit');
	Route::put('/{id}', ['as' => 'cable-base-packages.update', 'uses' => 'Packages\CableBaseController@update']);
	Route::get('/delete/{id}', 'Packages\CableBaseController@destroy');
});

Route::prefix('admin/cable-packages/local')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\CableLocalController@index');
	Route::get('/create', 'Packages\CableLocalController@create');
	Route::post('/submit', ['as' => 'cable-local-packages.store', 'uses' => 'Packages\CableLocalController@store']);
	Route::get('/edit/{id}', 'Packages\CableLocalController@edit');
	Route::put('/{id}', ['as' => 'cable-local-packages.update', 'uses' => 'Packages\CableLocalController@update']);
	Route::get('/delete/{id}', 'Packages\CableLocalController@destroy');
});

Route::prefix('admin/cable-packages/allacart')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\CableAllacartController@index');
	Route::get('/create', 'Packages\CableAllacartController@create');
	Route::post('/submit', ['as' => 'cable-allacart-packages.store', 'uses' => 'Packages\CableAllacartController@store']);
	Route::get('/edit/{id}', 'Packages\CableAllacartController@edit');
	Route::put('/{id}', ['as' => 'cable-allacart-packages.update', 'uses' => 'Packages\CableAllacartController@update']);
	Route::get('/delete/{id}', 'Packages\CableAllacartController@destroy');
});

Route::prefix('admin/cable-packages/packages')->middleware(['role:superadmin'])->group(function() {
    Route::get('/', 'Packages\CablePackagesController@index');
	Route::get('/create', 'Packages\CablePackagesController@create');
	Route::post('/submit', ['as' => 'cable-package-packages.store', 'uses' => 'Packages\CablePackagesController@store']);
	Route::get('/edit/{id}', 'Packages\CablePackagesController@edit');
	Route::put('/{id}', ['as' => 'cable-package-packages.update', 'uses' => 'Packages\CablePackagesController@update']);
	Route::get('/delete/{id}', 'Packages\CablePackagesController@destroy');
});
