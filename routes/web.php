<?php
use App\Models\Utility;
use Illuminate\Support\Facades\Route;

// Controller - Data Management, Redirect Views
// Model - Represents Table, Relationship of Table
// View - UI


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

// Route::get; // 
// Route::post;
// Route::put; // update
// Route::patch;
// Route::delete;
// Route::options;
// Route::match; // 1 or array of routes
// Route::any; // any 
// Route::redirect;
// Route::permanentRedirect;

// common routes naming
// index - show all data
// show - show a single data or student
// create - show a form to add new student
// store - store a data 
// edit - show a form to edit a data
// update - update a data
// destroy - delete a data

*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'Website\HomeController@index')->name('home');
Route::get('/about', 'Website\AboutController@index')->name('about');
Route::get('/product', 'Website\ProductController@index')->name('product');
Route::get('/contact', 'Website\ContactController@index')->name('contact');
Route::get('/package', 'Website\PackageController@index')->name('package');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


Route::prefix('/quotation')->group(function () {
        Route::get('', 'Website\QuotationController@index')->name('website-quotation.index');
        Route::get('/add', 'Website\QuotationController@create')->name('website-quotation.create');
        Route::post('/store', 'Website\QuotationController@store')->name('website-quotation.store');
});



// Route::get('/home', function() {
//     return view('website.home');
// });
 

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);

Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
        Route::get('', 'DashboardController@index')->name('dashboard');
});

Route::post('/logout', 'LoginController@logout')->name('account.logout');
// Route::get('/dashboard', function() {
//     return view('partials.sidebar');
// });
//  <--------------- WEBSITE -------------->
        // Route::get('/home', 'HomeController@index')->name('website.home');
        // Route::get('', 'AboutController@index')->name('website.about');

//          <---------COMPONENT / MENU ---------------->
Route::middleware(['auth'])->prefix('/component')->group(function () {
        Route::prefix('/group')->group(function () {
                Route::get('', 'Menu\GroupController@index')->name('group.index');
                Route::get('/add', 'Menu\GroupController@create')->name('group.create');  // show create page
                Route::post('/add', 'Menu\GroupController@store')->name('group.store'); // insert datab
                Route::get('/{id}', 'Menu\GroupController@edit')->name('group.edit'); // insert datab
                Route::put('/{id}', 'Menu\GroupController@update')->name('group.update'); // update data
                Route::get('remove/{id}', 'Menu\GroupController@remove'); // show remove modal
                Route::put('delete/{id}', 'Menu\GroupController@delete'); // update to Active/inactive
                
        });

        Route::prefix('/module')->group(function () {
                Route::get('', 'Menu\ModuleController@index')->name('module.index');
                Route::get('/add', 'Menu\ModuleController@create')->name('module.create');  // show create page
                Route::post('/add', 'Menu\ModuleController@store')->name('module.store'); // insert datab
                Route::get('/{id}', 'Menu\ModuleController@edit')->name('module.edit'); // insert datab
                Route::put('/{id}', 'Menu\ModuleController@update')->name('module.update'); // update data
                Route::get('remove/{id}', 'Menu\ModuleController@remove'); // show remove modal
                Route::put('delete/{id}', 'Menu\ModuleController@delete'); // update to Active/inactive
        });
        
        Route::prefix('/sub-module')->group(function () {
                Route::get('', 'Menu\SubModuleController@index')->name('sub-module.index');
                Route::get('/add', 'Menu\SubModuleController@create')->name('sub-module.create');  // show create page
                Route::post('/add', 'Menu\SubModuleController@store')->name('sub-module.store'); // insert datab
        });
});




Route::prefix('/access-control')->group(function () {
        Route::get('', 'UserAccessControlController@index')->name('access-control.index');
        // Route::get('/add', 'Menu\UserAccessControlController@create')->name('access-control.create');  // show create page
        // Route::post('/add', 'Menu\UserAccessControlController@store')->name('access-control.store'); // insert datab
});
//          <---------COMPONENT / MENU ---------------->


//          <---------LOGIN ---------------->
// Route::prefix('/login')->group(function () {
//         Route::get('', 'LoginController@index')->name('login.index');
//         Route::post('', 'LoginController@index')->name('login.proceed');
// });
//          <---------LOGIN ---------------->



//          <---------USER ACCOUNT ---------------->
Route::prefix('/user-account')->group(function () {

        //          <---------USER ---------------->
        Route::prefix('/user')->group(function () {
                Route::get('', 'UserController@index')->name('user.index');
                Route::get('/create', 'UserController@create')->name('user.create');
                Route::post('/store', 'UserController@store')->name('user.store');
                Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
                Route::put('/update/{id}', 'UserController@update')->name('user.update');
        });
        
        //          <---------USER ROLE---------------->
        Route::prefix('/user-role')->group(function () {
                Route::get('', 'UserRoleController@index')->name('user-role.index');
                Route::get('/create', 'UserRoleController@create')->name('user-role.create');
                Route::get('/store', 'UserRoleController@store')->name('user-role.store');
        });
        // 
});
//          <---------USER ACCOUNT ---------------->


//          <---------PERSONNEL ---------------->
Route::middleware(['auth'])->prefix('/personnel')->group(function () {
        //          <----------------------- BRANCH ---------------->
        Route::prefix('/branch')->group(function () {
                Route::get('', 'Personnel\BranchController@index')->name('branch.index');
                Route::get('/add', 'Personnel\BranchController@create')->name('add-branch.create');  // show create page
                Route::post('/add', 'Personnel\BranchController@store')->name('branch.store'); // insert datab
                Route::get('/{id}', 'Personnel\BranchController@edit')->name('branch.edit');  // show update page
                Route::put('/{id}', 'Personnel\BranchController@update')->name('branch.update'); // update data
                Route::get('remove/{id}', 'Personnel\BranchController@remove'); // show remove modal
                Route::put('delete/{id}', 'Personnel\BranchController@delete'); // update to Active/inactive
        });

        //          <----------------------- EMPLOYEE ---------------->
        Route::middleware(['auth'])->prefix('/employee')->group(function () {
                Route::get('', 'Personnel\EmployeeController@index')->name('employee.index');
                Route::get('/add', 'Personnel\EmployeeController@create')->name('add-employee.create'); // show create page
                Route::post('/add', 'Personnel\EmployeeController@store')->name('employee.store'); // insert data
                Route::get('/{id}', 'Personnel\EmployeeController@show')->name('employee.edit'); // show update page
                Route::put('/{id}', 'Personnel\EmployeeController@update')->name('employee.update'); // update data
                Route::get('remove/{id}', 'Personnel\EmployeeController@remove'); // show remove modal
                Route::put('delete/{id}', 'Personnel\EmployeeController@delete');  // update to Active/inactive
        });

                //          <----------------------- EMPLOYEE ROLE ---------------->
        Route::middleware(['auth'])->prefix('/employee-role')->group(function () {
                Route::get('', 'Personnel\EmployeeRoleController@index')->name('employee-role.index');
                Route::get('/add', 'Personnel\EmployeeRoleController@create')->name('add-employee-role.create'); // show create page
                Route::post('/add', 'Personnel\EmployeeRoleController@store')->name('employee-role.store'); // insert data
                Route::get('/{id}', 'Personnel\EmployeeRoleController@show')->name('employee-role.edit'); // show update page
                Route::put('/{id}', 'Personnel\EmployeeRoleController@update')->name('employee-role.update');// update data
                Route::get('remove/{id}', 'Personnel\EmployeeRoleController@remove');  // show remove modal
                Route::put('delete/{id}', 'Personnel\EmployeeRoleController@delete');  // update to Active/inactive
        });

});
//          <---------PERSONNEL ---------------->

//          <--------- CLIENT ---------------->
Route::middleware(['auth'])->prefix('/client')->group(function () {
                Route::get('', 'ClientController@index')->name('client.index');
                Route::get('/add', 'ClientController@create')->name('client.create');
                Route::post('/add', 'ClientController@store')->name('client.store');
                Route::get('/{id}', 'ClientController@edit')->name('client.edit'); // show update page
                Route::put('/{id}', 'ClientController@update')->name('client.update');// update data
                Route::get('remove/{id}', 'ClientController@remove');  // show remove modal
                Route::put('delete/{id}', 'ClientController@delete');  // update to Active/inactive
});

//          <--------- CLIENT ---------------->

// paymongo

Route::middleware(['auth'])->prefix('paymongo')->group(function () {
        Route::get('payment-failed', 'Deployment\JobOrderController@paymentFailed')->name('job-order.failed'); 
        Route::get('payment-success/{id}', 'Deployment\JobOrderController@paymentSuccess')->name('job-order.success'); 
        Route::get('gcash/{id}', 'Deployment\JobOrderController@gcash')->name('job-order.gcash');
});
//          <--------- Deployment Routes ---------------->
Route::middleware(['auth'])->prefix('deployment')->group(function () {

        /* Job Order Routes */
        Route::prefix('ocular')->group(function () {
                Route::get('', 'Deployment\OcularController@index')->name('ocular.index');
                Route::get('add', 'Deployment\OcularController@create')->name('ocular.create');  // show create page
                Route::post('store', 'Deployment\OcularController@store')->name('ocular.store'); // insert datab
                Route::get('/{id}', 'Deployment\OcularController@edit')->name('ocular.edit'); // insert datab
                Route::put('update/{id}', 'Deployment\OcularController@update')->name('ocular.update'); // update data
                Route::get('find-client/{id}', 'Deployment\OcularController@showClientAddress')->name('ocular.client-address');
        });

        /* Job Order Routes */
        Route::prefix('job-order')->group(function () {
                Route::get('', 'Deployment\JobOrderController@index')->name('job-order.index');
                Route::get('/add', 'Deployment\JobOrderController@create')->name('job-order.create');  // show create page
                Route::post('/store', 'Deployment\JobOrderController@store')->name('job-order.store'); // insert datab
                Route::get('/{id}', 'Deployment\JobOrderController@edit')->name('job-order.edit'); // insert datab
                Route::put('/{id}', 'Deployment\JobOrderController@update')->name('job-order.update'); // update data
                Route::get('find-employee/{id}', 'Deployment\JobOrderController@showEmpDetails')->name('job-order.emp-details');
                Route::get('remove-technician/{deployment_id}/{emp_id}/{deployment_type}', 'Deployment\JobOrderController@removeTechnician')->name('technician.remove');
                Route::get('print/{id}', 'Deployment\JobOrderController@print')->name('job-order.print'); 
                Route::get('email/{id}', 'Deployment\JobOrderController@sendEmail')->name('job-order.email');
        });
        
        /* Installation Routes */
        Route::prefix('installation')->group(function () {
                Route::get('', 'Deployment\InstallationController@index')->name('installation.index');
        });

        /* Additional/Upgrade Routes */
        Route::prefix('upgrade')->group(function () {
                Route::get('', 'Deployment\UpgradeController@index')->name('upgrade.index');
        });

        /* Structure Cabling Routes */
        Route::prefix('structure-cabling')->group(function () {
                Route::get('', 'Deployment\StructureCablingController@index')->name('structure-cabling.index');
        });

        /* Rehabilitation/Repair Routes */
        Route::prefix('rehab-repair')->group(function () {
                Route::get('', 'Deployment\RehabRepairController@index')->name('rehab-repair.index');
        });

});

//          <--------- Inventory Routes ---------------->
Route::middleware(['auth'])->prefix('inventory')->group(function () {

        /* Employee Inventory Routes */
        Route::prefix('employee-inventory')->group(function () {
                Route::get('', 'Inventory\EmployeeInventoryController@index')->name('employee-inventory.index');
        });

        /* Issuances Routes */
        Route::prefix('issuances')->group(function () {
                Route::get('', 'Inventory\IssuancesController@index')->name('issuances.index');
                Route::get('create', 'Inventory\IssuancesController@create')->name('issuances.create');
                Route::post('store', 'Inventory\IssuancesController@store')->name('issuances.store');
        });

        /* Receive Routes */
        Route::prefix('receive')->group(function () {
                Route::get('', 'Inventory\ReceiveController@index')->name('receive.index');
                Route::get('/add', 'Inventory\ReceiveController@create')->name('inventory-receive.create');  // show create page
                Route::post('/store', 'Inventory\ReceiveController@store')->name('inventory-receive.store'); // insert datab
                Route::get('/{id}', 'Inventory\ReceiveController@edit')->name('inventory-receive.edit'); 
                Route::put('/{id}', 'Inventory\ReceiveController@update')->name('inventory-receive.update'); 

        });

        /* Stocks Routes */
        Route::prefix('stocks')->group(function () {
                Route::get('', 'Inventory\StocksController@index')->name('stocks.index');
        });

        /* Issuances Routes */
        Route::prefix('employee-items')->group(function () {
                Route::get('', 'Inventory\EmployeeInventoryController@index')->name('employee-item.index');
                Route::get('create', 'Inventory\EmployeeInventoryController@create')->name('employee-item.create');
                Route::post('store', 'Inventory\EmployeeInventoryController@store')->name('employee-item.store');
        });
});
//          <--------- PRODUCT ---------------->
Route::middleware(['auth'])->prefix('/product')->group(function () {
        //          <--------- PRODUCT SERIES ----------------> 
        Route::prefix('/series')->group(function () {
                Route::get('', 'Product\ProductSeriesController@index')->name('product-series.index');
                Route::get('/add', 'Product\ProductSeriesController@create')->name('product-series.create');  // show create page
                Route::post('/add', 'Product\ProductSeriesController@store')->name('product-series.store'); // insert datab
                Route::get('/{id}', 'Product\ProductSeriesController@edit')->name('product-series.edit'); // insert datab
                Route::put('/{id}', 'Product\ProductSeriesController@update')->name('product-series.update'); // update data
                Route::get('remove/{id}', 'Product\ProductSeriesController@remove')->name('product-series.remove');
                Route::put('delete/{id}', 'Product\ProductSeriesController@delete')->name('product-series.delete');
        });
                Route::prefix('/category')->group(function () {
                Route::get('', 'Product\ProductCategoryController@index')->name('product-category.index');
                Route::get('/add', 'Product\ProductCategoryController@create')->name('product-category.create');  // show create page
                Route::post('/add', 'Product\ProductCategoryController@store')->name('product-category.store'); // insert datab
                Route::get('/{id}', 'Product\ProductCategoryController@edit')->name('product-category.edit'); // insert datab
                Route::put('/{id}', 'Product\ProductCategoryController@update')->name('product-category.update'); // update data
                Route::get('remove/{id}', 'Product\ProductCategoryController@remove')->name('product-category.remove');
                Route::put('delete/{id}', 'Product\ProductCategoryController@delete')->name('product-category.delete');
        });
        Route::prefix('/brand')->group(function () {
                Route::get('', 'Product\ProductBrandController@index')->name('product-brand.index');
                Route::get('/add', 'Product\ProductBrandController@create')->name('product-brand.create');  // show create page
                Route::post('/add', 'Product\ProductBrandController@store')->name('product-brand.store'); // insert datab
                Route::get('/{id}', 'Product\ProductBrandController@edit')->name('product-brand.edit'); // insert datab
                Route::put('/{id}', 'Product\ProductBrandController@update')->name('product-brand.update'); // update data
                Route::get('remove/{id}', 'Product\ProductBrandController@remove')->name('product-brand.remove');
                Route::put('delete/{id}', 'Product\ProductBrandController@delete')->name('product-brand.delete');
});
        Route::prefix('/uom')->group(function () {
                Route::get('', 'Product\ProductUnitOfMeasurementController@index')->name('product-uom.index');
                Route::get('add', 'Product\ProductUnitOfMeasurementController@create')->name('product-uom.create');  // show create page
                Route::post('add', 'Product\ProductUnitOfMeasurementController@store')->name('product-brand.store'); // insert datab
                Route::get('/{id}', 'Product\ProductUnitOfMeasurementController@edit')->name('product-brand.edit'); // insert datab
                Route::put('/{id}', 'Product\ProductUnitOfMeasurementController@update')->name('product-brand.update'); // update data
                Route::get('remove/{id}', 'Product\ProductUnitOfMeasurementController@remove')->name('product-uom.remove');
                Route::put('delete/{id}', 'Product\ProductUnitOfMeasurementController@delete')->name('product-uom.delete');
});

        Route::prefix('/item')->group(function () {
                Route::get('', 'Product\ItemController@index')->name('product-item.index');
                Route::get('add', 'Product\ItemController@create')->name('product-item.create');  // show create page
                Route::post('store', 'Product\ItemController@store')->name('product.store'); // insert datab
                Route::get('/{id}', 'Product\ItemController@edit')->name('product.edit'); // insert datab
                Route::put('/{id}', 'Product\ItemController@update')->name('product.update'); // update data
                Route::get('find-employee/{id}', 'Product\ItemController@showEmpDetails')->name('product.emp-details');
                Route::get('item-list', 'Product\ItemController@showItems')->name('product.item-list');
                Route::get('remove/{id}', 'Product\ItemController@remove')->name('product.item.remove');
                Route::put('delete/{id}', 'Product\ItemController@delete')->name('product.item.delete');
        });

        Route::prefix('/resolution')->group(function () {
                Route::get('', 'Product\ResolutionController@index')->name('product-resolution.index');
                Route::get('add', 'Product\ResolutionController@create')->name('product-resolution.create');  // show create page
                Route::post('add', 'Product\ResolutionController@store')->name('product-resolution.store'); // insert datab
                Route::get('/{id}', 'Product\ResolutionController@edit')->name('product-resolution.edit'); // insert datab
                Route::put('/{id}', 'Product\ResolutionController@update')->name('product-resolution.update'); // update data
                Route::get('remove/{id}', 'Product\ResolutionController@remove')->name('product-resolution.remove');
                Route::put('delete/{id}', 'Product\ResolutionController@delete')->name('product-resolution.delete');
        });

        Route::prefix('/packages')->group(function () {
                Route::get('', 'Product\ItemPackageController@index')->name('product-packages.index');
                Route::get('create', 'Product\ItemPackageController@create')->name('product-packages.create');  // show create page
                Route::post('store', 'Product\ItemPackageController@store')->name('product-packages.store'); // insert datab
                Route::get('/{id}', 'Product\ItemPackageController@edit')->name('product-packages.edit'); // insert datab
                Route::put('/{id}', 'Product\ItemPackageController@update')->name('product-packages.update'); // update data
                Route::get('remove/{id}', 'Product\ItemPackageController@remove')->name('product-packages.remove');
                Route::put('delete/{id}', 'Product\ItemPackageController@delete')->name('product-packages.delete');
                Route::get('getItemList', 'Product\ItemPackageController@getItemList')->name('product-packages.item-list');
                Route::post('selectedItems', 'Product\ItemPackageController@selectedItems')->name('product-packages.selected-items');
                Route::post('selectedPackagess', 'Product\ItemPackageController@selectedPackagess')->name('product-packages.selected-packages');
        });
});


//          <--------- SALES ---------------->
        Route::middleware(['auth'])->prefix('/sales')->group(function () {
                Route::prefix('/quotation')->group(function () {
                        Route::get('', 'Sales\QuotationController@index')->name('sales-quotation.index');
                        Route::get('/create', 'Sales\QuotationController@create')->name('sales-quotation.create');  // show create page
                        Route::post('/store', 'Sales\QuotationController@store')->name('sales-quotation.store'); // insert datab
                        Route::get('edit/{id}', 'Sales\QuotationController@edit')->name('sales-quotation.edit'); // insert datab
                        Route::put('update/{id}', 'Sales\QuotationController@update')->name('sales-quotation.update'); // update data
                        Route::get('remove/{id}', 'Sales\QuotationController@remove')->name('sales-quotation.remove');
                        Route::put('delete/{id}', 'Sales\QuotationController@delete')->name('sales-quotation.delete');
                        Route::get('package-list', 'Sales\QuotationController@showPackages')->name('sales.package-list');
                        Route::get('find-client/{id}', 'Sales\QuotationController@showClientDetails')->name('ocular.client-details');
                        Route::get('find-quotation-data/{id}', 'Sales\QuotationController@showQuotationData')->name('ocular.quotation-data');
                        Route::get('remove-item/{details_id}/{package_id}', 'Sales\QuotationController@removeItem')->name('item.remove');
                        Route::get('sendEmail/{id}', 'Sales\QuotationController@sendEmail')->name('sales-quotation.email');
        

                });

                Route::prefix('/order')->group(function () {
                        Route::get('', 'Sales\OrderController@index')->name('order.index');
                        Route::get('/create', 'Sales\OrderController@create')->name('order.create');  // show create page
                        Route::post('/store', 'Sales\OrderController@store')->name('order.store'); // insert datab
                        Route::get('/{id}', 'Sales\OrderController@edit')->name('sales-order.edit'); // insert datab
                        Route::put('/{id}', 'Sales\OrderController@update')->name('sales-order.update'); // update data
                        // Route::get('item-list', 'Sales\QuotationController@showItems')->name('sales.item-list');
                        Route::get('package-list', 'Sales\QuotationController@showPackages')->name('sales.package-list');
                        Route::get('find-order-data/{id}', 'Sales\OrderController@showOrderData')->name('sales.order-data');
                });

                Route::prefix('/payment')->group(function () {
                        Route::get('', 'Sales\PaymentController@index')->name('payment.index');
                });

                Route::prefix('/remittance')->group(function () {
                        Route::get('', 'Sales\RemittanceController@index')->name('remittance.index');
                });
        });
