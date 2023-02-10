<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Setup\AreaController;
use App\Http\Controllers\Setup\ZoneController;
use App\Http\Controllers\Setup\BranchController;
use App\Http\Controllers\Setup\DomainController;
use App\Http\Controllers\Setup\GenderController;
use App\Http\Controllers\Setup\SectorController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Setup\DistrictController;
use App\Http\Controllers\Setup\DivisionController;
use App\Http\Controllers\Setup\ReligionController;
use App\Http\Controllers\Setup\UpazillaController;
use App\Http\Controllers\Setup\JobStatusController;
use App\Http\Controllers\Setup\BloodGroupController;
use App\Http\Controllers\Setup\DepartmentController;
use App\Http\Controllers\Setup\DesignationController;
use App\Http\Controllers\Setup\EmployeeTypeController;
use App\Http\Controllers\Setup\MaritalStatusController;
use App\Http\Controllers\Setup\EducationalQualificationController;

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

Route::view('/', 'auth.login');


//Route::get('/', function () {
    //return view('welcome');
//});
 

Route::middleware('auth')->group(function(){



 // Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
     
});

// Role Setup
Route::controller(RolesController::class)->group(function () {
    Route::get('/role/index', 'index')->name('role.index');
    Route::get('/role/create', 'create')->name('role.create');
    Route::post('/role/store', 'store')->name('role.store');
    Route::get('/role/edit/{id}', 'edit')->name('role.edit'); 
    // Route::get('/sector/add', 'SectorAdd')->name('sector.add'); 
    // Route::post('/sector/store', 'SectorStore')->name('sector.store');
    // Route::get('/sector/edit/{id}', 'SectorEdit')->name('sector.edit'); 
    // Route::post('/sector/update', 'SectorUpdate')->name('sector.update');
    // Route::get('/sector/delete/{id}', 'SectorDelete')->name('sector.delete');

    // Route::get('/sector/add', 'SectorAdd')->name('sector.add'); 
    // Route::post('/sector/store', 'SectorStore')->name('sector.store');
    // Route::get('/sector/edit/{id}', 'SectorEdit')->name('sector.edit'); 
    // Route::post('/sector/update', 'SectorUpdate')->name('sector.update');
    // Route::get('/sector/delete/{id}', 'SectorDelete')->name('sector.delete');
    
});
// Sector Setup
Route::controller(SectorController::class)->group(function () {
    Route::get('/sector/all', 'SectorAll')->name('sector.all');
    Route::get('/sector/add', 'SectorAdd')->name('sector.add'); 
    Route::post('/sector/store', 'SectorStore')->name('sector.store');
    Route::get('/sector/edit/{id}', 'SectorEdit')->name('sector.edit'); 
    Route::post('/sector/update', 'SectorUpdate')->name('sector.update');
    Route::get('/sector/delete/{id}', 'SectorDelete')->name('sector.delete');
    
});

// Domain Setup
Route::controller(DomainController::class)->group(function () {
    Route::get('/domain/all', 'DomainAll')->name('domain.all');
    Route::get('/domain/add', 'DomainAdd')->name('domain.add'); 
    Route::post('/domain/store', 'DomainStore')->name('domain.store');
    Route::get('/domain/edit/{id}', 'DomainEdit')->name('domain.edit'); 
    Route::post('/domain/update', 'DomainUpdate')->name('domain.update');
    Route::get('/domain/delete/{id}', 'DomainDelete')->name('domain.delete');
    
});

// Designation Setup
Route::controller(DesignationController::class)->group(function () {
    Route::get('/designation/all', 'DesignationAll')->name('designation.all');
    Route::get('/designation/add', 'DesignationAdd')->name('designation.add'); 
    Route::post('/designation/store', 'DesignationStore')->name('designation.store');
    Route::get('/designation/edit/{id}', 'DesignationEdit')->name('designation.edit'); 
    Route::post('/designation/update', 'DesignationUpdate')->name('designation.update');
    Route::get('/designation/delete/{id}', 'DesignationDelete')->name('designation.delete');
    
});

// Divission Setup
Route::controller(DivisionController::class)->group(function () {
    Route::get('/division/all', 'DivisionAll')->name('division.all');
    Route::get('/division/add', 'DivisionAdd')->name('division.add'); 
    Route::post('/division/store', 'DivisionStore')->name('division.store');
    Route::get('/division/edit/{id}', 'DivisionEdit')->name('division.edit'); 
    Route::post('/division/update', 'DivisionUpdate')->name('division.update');
    Route::get('/division/delete/{id}', 'DivisionDelete')->name('division.delete');
    
});

// District Setup
Route::controller(DistrictController::class)->group(function () {
    Route::get('/district/all', 'DistrictAll')->name('district.all');
    Route::get('/district/add', 'DistrictAdd')->name('district.add'); 
    Route::post('/district/store', 'DistrictStore')->name('district.store');
    Route::get('/district/edit/{id}', 'DistrictEdit')->name('district.edit'); 
    Route::post('/district/update', 'DistrictUpdate')->name('district.update');
    Route::get('/district/delete/{id}', 'DistrictDelete')->name('district.delete');
    
});

// Upazilla Setup
Route::controller(UpazillaController::class)->group(function () {
    Route::get('/upazilla/all', 'UpazillaAll')->name('upazilla.all');
    Route::get('/upazilla/add', 'UpazillaAdd')->name('upazilla.add'); 
    Route::post('/upazilla/store', 'UpazillaStore')->name('upazilla.store');
    Route::get('/upazilla/edit/{id}', 'UpazillaEdit')->name('upazilla.edit'); 
    Route::post('/upazilla/update', 'UpazillaUpdate')->name('upazilla.update');
    Route::get('/upazilla/delete/{id}', 'UpazillaDelete')->name('upazilla.delete');
    
});

// BloodGroup Setup
Route::controller(BloodGroupController::class)->group(function () {
    Route::get('/bloodgroup/all', 'BloodGroupAll')->name('bloodgroup.all');
    Route::get('/bloodgroup/add', 'BloodGroupAdd')->name('bloodgroup.add'); 
    Route::post('/bloodgroup/store', 'BloodGroupStore')->name('bloodgroup.store');
    Route::get('/bloodgroup/edit/{id}', 'BloodGroupEdit')->name('bloodgroup.edit'); 
    Route::post('/bloodgroup/update', 'BloodGroupUpdate')->name('bloodgroup.update');
    Route::get('/bloodgroup/delete/{id}', 'BloodGroupDelete')->name('bloodgroup.delete');
    
});

// Department Setup
Route::controller(DepartmentController::class)->group(function () {
    Route::get('/department/all', 'DepartmentAll')->name('department.all');
    Route::get('/department/add', 'DepartmentAdd')->name('department.add'); 
    Route::post('/department/store', 'DepartmentStore')->name('department.store');
    Route::get('/department/edit/{id}', 'DepartmentEdit')->name('department.edit'); 
    Route::post('/department/update', 'DepartmentUpdate')->name('department.update');
    Route::get('/department/delete/{id}', 'DepartmentDelete')->name('department.delete');
    
});

// Educational Qualification Setup
Route::controller(EducationalQualificationController::class)->group(function () {
    Route::get('/educationalqualification/all', 'EducationalQualificationAll')->name('educationalqualification.all');
    Route::get('/educationalqualification/add', 'EducationalQualificationAdd')->name('educationalqualification.add'); 
    Route::post('/educationalqualification/store', 'EducationalQualificationStore')->name('educationalqualification.store');
    Route::get('/educationalqualification/edit/{id}', 'EducationalQualificationEdit')->name('educationalqualification.edit'); 
    Route::post('/educationalqualification/update', 'EducationalQualificationUpdate')->name('educationalqualification.update');
    Route::get('/educationalqualification/delete/{id}', 'EducationalQualificationDelete')->name('educationalqualification.delete');
    
});

// Employee Type Setup
Route::controller(EmployeeTypeController::class)->group(function () {
    Route::get('/employeetype/all', 'EmployeeTypeAll')->name('employeetype.all');
    Route::get('/employeetype/add', 'EmployeeTypeAdd')->name('employeetype.add'); 
    Route::post('/employeetype/store', 'EmployeeTypeStore')->name('employeetype.store');
    Route::get('/employeetype/edit/{id}', 'EmployeeTypeEdit')->name('employeetype.edit'); 
    Route::post('/employeetype/update', 'EmployeeTypeUpdate')->name('employeetype.update');
    Route::get('/employeetype/delete/{id}', 'EmployeeTypeDelete')->name('employeetype.delete');
    
});

// Gender Type Setup
Route::controller(GenderController::class)->group(function () {
    Route::get('/gender/all', 'GenderAll')->name('gender.all');
    Route::get('/gender/add', 'GenderAdd')->name('gender.add'); 
    Route::post('/gender/store', 'GenderStore')->name('gender.store');
    Route::get('/gender/edit/{id}', 'GenderEdit')->name('gender.edit'); 
    Route::post('/gender/update', 'GenderUpdate')->name('gender.update');
    Route::get('/gender/delete/{id}', 'GenderDelete')->name('gender.delete');
    
});

// Job Status Setup
Route::controller(JobStatusController::class)->group(function () {
    Route::get('/jobstatus/all', 'JobStatusAll')->name('jobstatus.all');
    Route::get('/jobstatus/add', 'JobStatusAdd')->name('jobstatus.add'); 
    Route::post('/jobstatus/store', 'JobStatusStore')->name('jobstatus.store');
    Route::get('/jobstatus/edit/{id}', 'JobStatusEdit')->name('jobstatus.edit'); 
    Route::post('/jobstatus/update', 'JobStatusUpdate')->name('jobstatus.update');
    Route::get('/jobstatus/delete/{id}', 'JobStatusDelete')->name('jobstatus.delete');
    
});

// Marital Status Setup
Route::controller(MaritalStatusController::class)->group(function () {
    Route::get('/maritalstatus/all', 'MaritalStatusAll')->name('maritalstatus.all');
    Route::get('/maritalstatus/add', 'MaritalStatusAdd')->name('maritalstatus.add'); 
    Route::post('/maritalstatus/store', 'MaritalStatusStore')->name('maritalstatus.store');
    Route::get('/maritalstatus/edit/{id}', 'MaritalStatusEdit')->name('maritalstatus.edit'); 
    Route::post('/maritalstatus/update', 'MaritalStatusUpdate')->name('maritalstatus.update');
    Route::get('/maritalstatus/delete/{id}', 'MaritalStatusDelete')->name('maritalstatus.delete');
    
});

// Religion Setup
Route::controller(ReligionController::class)->group(function () {
    Route::get('/religion/all', 'ReligionAll')->name('religion.all');
    Route::get('/religion/add', 'ReligionAdd')->name('religion.add'); 
    Route::post('/religion/store', 'ReligionStore')->name('religion.store');
    Route::get('/religion/edit/{id}', 'ReligionEdit')->name('religion.edit'); 
    Route::post('/religion/update', 'ReligionUpdate')->name('religion.update');
    Route::get('/religion/delete/{id}', 'ReligionDelete')->name('religion.delete');
    
});

// Zone Setup
Route::controller(ZoneController::class)->group(function () {
    Route::get('/zone/all', 'ZoneAll')->name('zone.all');
    Route::get('/zone/add', 'ZoneAdd')->name('zone.add'); 
    Route::post('/zone/store', 'ZoneStore')->name('zone.store');
    Route::get('/zone/edit/{id}', 'ZoneEdit')->name('zone.edit'); 
    Route::post('/zone/update', 'ZoneUpdate')->name('zone.update');
    Route::get('/zone/delete/{id}', 'ZoneDelete')->name('zone.delete');
    
});

// Area Setup
Route::controller(AreaController::class)->group(function () {
    Route::get('/area/all', 'AreaAll')->name('area.all');
    Route::get('/area/add', 'AreaAdd')->name('area.add'); 
    Route::post('/area/store', 'AreaStore')->name('area.store');
    Route::get('/area/edit/{id}', 'AreaEdit')->name('area.edit'); 
    Route::post('/area/update', 'AreaUpdate')->name('area.update');
    Route::get('/area/delete/{id}', 'AreaDelete')->name('area.delete');
    
});

// Branch Setup
Route::controller(BranchController::class)->group(function () {
    Route::get('/branch/all', 'BranchAll')->name('branch.all');
    Route::get('/branch/add', 'BranchAdd')->name('branch.add'); 
    Route::post('/branch/store', 'BranchStore')->name('branch.store');
    Route::get('/branch/edit/{id}', 'BranchEdit')->name('branch.edit'); 
    Route::post('/branch/update', 'BranchUpdate')->name('branch.update');
    Route::get('/branch/delete/{id}', 'BranchDelete')->name('branch.delete');
    
});

// Branch Setup
Route::controller(NewEmployeeController::class)->group(function () {
    Route::get('/newemployee/all', 'NewEmployeeAll')->name('newemployee.all');
    Route::get('/newemployee/add', 'NewEmployeeAdd')->name('newemployee.add'); 
    // Route::post('/branch/store', 'BranchStore')->name('branch.store');
    // Route::get('/branch/edit/{id}', 'BranchEdit')->name('branch.edit'); 
    // Route::post('/branch/update', 'BranchUpdate')->name('branch.update');
    // Route::get('/branch/delete/{id}', 'BranchDelete')->name('branch.delete');
    
});


 // Supplier All Route 
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all'); 
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add'); 
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit'); 
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});


// Customer All Route 
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'CustomerAll')->name('customer.all'); 
    Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
    Route::post('/customer/store', 'CustomerStore')->name('customer.store');
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');

    Route::get('/credit/customer', 'CreditCustomer')->name('credit.customer');
    Route::get('/credit/customer/print/pdf', 'CreditCustomerPrintPdf')->name('credit.customer.print.pdf');

    Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
     Route::post('/customer/update/invoice/{invoice_id}', 'CustomerUpdateInvoice')->name('customer.update.invoice');

     Route::get('/customer/invoice/details/{invoice_id}', 'CustomerInvoiceDetails')->name('customer.invoice.details.pdf');

      Route::get('/paid/customer', 'PaidCustomer')->name('paid.customer');
      Route::get('/paid/customer/print/pdf', 'PaidCustomerPrintPdf')->name('paid.customer.print.pdf');

       Route::get('/customer/wise/report', 'CustomerWiseReport')->name('customer.wise.report');
       Route::get('/customer/wise/credit/report', 'CustomerWiseCreditReport')->name('customer.wise.credit.report');
       Route::get('/customer/wise/paid/report', 'CustomerWisePaidReport')->name('customer.wise.paid.report');
     
});


// Unit All Route 
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all'); 
    Route::get('/unit/add', 'UnitAdd')->name('unit.add');
    Route::post('/unit/store', 'UnitStore')->name('unit.store');
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
     
});


// Category All Route 
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'CategoryAll')->name('category.all'); 
    Route::get('/category/add', 'CategoryAdd')->name('category.add');
    Route::post('/category/store', 'CategoryStore')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/category/update', 'CategoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
     
});


// Product All Route 
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all'); 
    Route::get('/product/add', 'ProductAdd')->name('product.add');
    Route::post('/product/store', 'ProductStore')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
     
});


  
// Purchase All Route 
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all'); 
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
    Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
    Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');

    Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report');
    Route::get('/daily/purchase/pdf', 'DailyPurchasePdf')->name('daily.purchase.pdf');
     
});


// Invoice All Route 
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all'); 
    Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
    Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');

    Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
    Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
    Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');

    Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
    Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
    Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');

    Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
    Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
    
     
});





// Stock All Route 
Route::controller(StockController::class)->group(function () {
    Route::get('/stock/report', 'StockReport')->name('stock.report');
    Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf'); 

    Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise'); 
    Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
    Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');

 
});



 }); // End Group Middleware




// // Default All Route 
// Route::controller(DefaultController::class)->group(function () {
//     Route::get('/get-category', 'GetCategory')->name('get-category'); 
//     Route::get('/get-product', 'GetProduct')->name('get-product'); 
//     Route::get('/check-product', 'GetStock')->name('check-product-stock'); 
     
// });


 


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
