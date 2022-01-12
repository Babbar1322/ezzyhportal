<?php
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\frontController;
use App\Http\Controllers\subadminController;
use App\Http\Controllers\dealerController;
use App\Http\Controllers\subdealerController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\subsellerController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketLogController;

use App\Http\Controllers\ChatController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DropshipperController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\capacityController;



use Illuminate\Support\Facades\Auth;
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

Route::get('/', [frontController::class, 'indexpage'])->name('index');
Route::get('/userform/{id}', [frontController::class, 'userformpage'])->name('userform');
Route::post('/storeUserform/{id}', [frontController::class, 'storeUserform'])->name('storeUserform');

Route::get('dealerRegister/{id}', [dealerController::class, 'dregist_page'])->name('dealerRegister');
Route::post('dealerRegister/{id}', [dealerController::class, 'register_dealer'])->name('submitRegister');

Route::get('sellerRegister/{id}', [sellerController::class, 'sregist_page'])->name('sellerRegister');
Route::post('sellerRegister/{id}', [sellerController::class, 'register_seller'])->name('registerSeller');

Route::get('subsellerRegister/{id}', [subsellerController::class, 'subregist_page'])->name('subsellerRegister');
Route::post('subsellerRegister/{id}', [subsellerController::class, 'register_subseller'])->name('registerSubseller');

Route::get('subdealerRegister/{id}', [subdealerController::class, 'subregist_page'])->name('subdealerRegister');
Route::post('subdealerRegister/{id}', [subdealerController::class, 'register_subdealer'])->name('subdealRegister');

Route::get('dropshipperRegister/{id}', [DropshipperController::class, 'dropregist_page'])->name('dropshipperRegister');
Route::post('dropshipperRegister/{id}', [DropshipperController::class, 'register_dropShipper'])->name('dropRegister');


Route::post("/notification",[UserController::class,"notif"])->name("admin.notification");
// Route::get('staffRegister/{id}', [StaffController::class, 'staffregist_page'])->name('staffRegister');
// Route::post('staffRegister/{id}', [StaffController::class, 'register_staff'])->name('stafRegister');


Route::get('contact', [frontController::class, 'contactus_page'])->name('contact');
Route::get('about', [frontController::class, 'aboutus_page'])->name('about');

Route::get('logout', [UserController::class, 'logoutpage'])->name('logout');


Route::get('thankYou', [frontController::class, 'thankU'])->name('thankU');


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get("/IcNoSearch", [CommissionController::class,"index"])->name("commission.index");

Route::group(['middleware' => 'auth',  'prefix' => ''], function () {
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/subadmin', subadminController::class);
    Route::resource('/dealer', dealerController::class);
    Route::resource('/subdealer', subdealerController::class);
    Route::resource('/seller', sellerController::class);
    Route::resource('/subseller', subsellerController::class);
    Route::resource('/customer', customerController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/dropshippers', DropshipperController::class);
    
    Route::get('/ticket',[TicketLogController::class,'create'])->name('admin.ticket');
    Route::post('/storeTicket',[TicketLogController::class,'store'])->name('ticket.store');
    Route::get('/tickets',[TicketLogController::class,'index'])->name('ticket.index');
    Route::get('/ticketRequests',[TicketLogController::class,'requests'])->name('ticket.requests');
    Route::get('/ticketReply/{id}',[TicketLogController::class,'reply'])->name('ticket.reply');
    Route::post('/storeReply/{id}',[TicketLogController::class,'storeReply'])->name('ticket.storeReply');
    Route::get('/deleteTicket/{id}',[TicketLogController::class,'delete'])->name('ticket.delete');


    Route::post("/notify",[TicketLogController::class,"notificationRead"])->name("admin.notify");
//    Route::get('/ticket',[TicketController::class,'create'])->name('admin.ticket');
//    Route::post('/storeTicket',[TicketController::class,'store'])->name('ticket.store');
//    Route::get('/tickets',[TicketController::class,'index'])->name('ticket.index');
//    Route::get('/ticketRequests',[TicketController::class,'requests'])->name('ticket.requests');
//    Route::get('/ticketReply/{id}',[TicketController::class,'reply'])->name('ticket.reply');
//    Route::post('/storeReply/{id}',[TicketController::class,'storeReply'])->name('ticket.storeReply');

    Route::get("/newCustomers",[customerController::class,"newCus"])->name('admin.newCustomer');
    Route::get("/followupCustomers",[customerController::class,"followUpCus"])->name('admin.followupCustomers');
    Route::get("/rejectedCusCustomers",[customerController::class,"rejectedCus"])->name('admin.rejectedCusCustomers');
    Route::get("/approvedCustomers",[customerController::class,"approvedCus"])->name('admin.approvedCustomers');
    Route::get("/processingCustomers",[customerController::class,"processCus"])->name('admin.processCustomers');
    Route::get("/singleApproved/{id}",[customerController::class,"singleApp"])->name('admin.singleApproved');
    Route::get("/document/{id}",[customerController::class,"docs"])->name('admin.document');
    
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/mailUser', [HomeController::class, 'mailpage'])->name('admin.mailuser');
    Route::post('/mailUser', [HomeController::class, 'mailsend'])->name('admin.sendmail');

    Route::post('/dealerupdate', [dealerController::class, 'codesend'])->name('admin.codegenereate');
    Route::post("/updateLoanStatus",[customerController::class,'loanStatus'])->name('admin.updateLoanStatus');
    Route::get('/deleteCustomer/{id}',[customerController::class,'deleteCustomer'])->name('admin.deleteCustomer');

    Route::get('export', [customerController::class,'export'])->name('export');
    Route::get('singleUserexport', [customerController::class,'singleExport'])->name('singleExport');

    Route::get('importExportView', [customerController::class,'importExportView']);
    Route::post('import', [customerController::class,'import'])->name('import');

    Route::get("/staffs",[StaffController::class,"index"])->name("admin.staffs");
    Route::get("/createStaffs",[StaffController::class,"create"])->name("staffs.create");
    Route::get("/editStaffs/{id}",[StaffController::class,"edit"])->name("staffs.edit");
    Route::get("/deleteStaffs/{id}",[StaffController::class,"delete"])->name("staffs.delete");
    Route::post("/storeStaffs",[StaffController::class,"store"])->name("staffs.store");
    Route::post("/updateStaffs/{id}",[StaffController::class,"update"])->name("staffs.update");

    Route::get("/staffRoles/",[StaffController::class,"roleIndex"])->name("staffs.roles");
    Route::get("/createStaffRoles/",[StaffController::class,"roleCreate"])->name("staffRole.create");
    Route::get("/deleteStaffRoles/{id}",[StaffController::class,"roleDelete"])->name("staffRole.delete");
    Route::get("/editStaffRoles/{id}",[StaffController::class,"roleEdit"])->name("staffRole.edit");
    Route::post("/storeStaffRoles",[StaffController::class,"storeRole"])->name("staffRole.store");
    Route::post("/updateStaffRoles",[StaffController::class,"roleUpdate"])->name("staffRole.update");

    Route::get("/sellerBanners",[sellerController::class,"Banner"])->name("seller.banners");
    Route::post("/bannerStore",[sellerController::class,"storeBanner"])->name("banner.store");
    
    

    Route::get("/dealercommission",[dealerController::class,"commission"])->name("dealer.commission");
    Route::post("/storeDealerCommission",[dealerController::class,"storeCommission"])->name("store.commission");

    Route::get("/commission_slip", [dealerController::class,"slip"])->name("dealer.slip");
    Route::get("/invoice_slip", [CommissionController::class,"islip"])->name("commission.slip");
    Route::get("/sellerInvoice", [CommissionController::class,"sellerInvoice"])->name("admin.sellerInvoice");
    Route::get("/dealerInvoices/{id}", [CommissionController::class,"dealerInvoice"])->name("admin.dealerInvoice");

    Route::get("/dealerInvoice/{id}", [CommissionController::class,"deleteDealerInvoice"])->name("dealerInvoice.delete");
    Route::get("/sellerInvoice/{id}", [CommissionController::class,"deleteSellerInvoice"])->name("sellerInvoice.delete");


    
    Route::get("/sellerCommissions", [CommissionController::class,"sellerCommissions"])->name("seller.commissions");
    Route::get("/dealerCommissions", [CommissionController::class,"dealerCommissions"])->name("dealer.commissions");

    Route::post("/impersonate/{id}",[UserController::class,"impersonate"])->name('user.impersonate');
    Route::post("/backToAdmin",[UserController::class,"backToAdmin"])->name('user.backToAdmin');

    Route::get("/sellerCommission",[CommissionController::class,"sellerCommission"])->name('seller.commission');
    Route::post("/storeCommission",[CommissionController::class,"storeCommission"])->name('commission.store');
    Route::post("/updateCommission",[CommissionController::class,"updateCommission"])->name('commission.update');

    Route::get('/dropshipperAdd',[DropshipperController::class,'dropshipperAdd'])->name('dropshipper.add');
    Route::post('/dropshipperStore',[DropshipperController::class,'dropshipperStore'])->name('dropshipperStore');
    
    Route::get('/changePass',[HomeController::class,'changepass'])->name('admin.changePass');
    Route::post('/changePass',[HomeController::class,'updatepasword'])->name('admin.passupdate');

    Route::get("/brandAdd",[brandController::class,"create"])->name('product.brandAdd');
    Route::post("/brandStore",[brandController ::class,"store"])->name('product.brandStore');
    Route::get("/brands",[brandController ::class,"index"])->name('product.brands');
    Route::get("/brandDelete/{id}",[brandController ::class,"delete"])->name('brand.delete');

    
    Route::get("/capacityAdd",[capacityController::class,"create"])->name('product.capacityAdd');
    Route::post("/capacityStore",[capacityController ::class,"store"])->name('product.capacityStore');
    Route::get("/capacities",[capacityController ::class,"index"])->name('product.capacities');
    Route::get("/capacityDelete/{id}",[capacityController ::class,"delete"])->name('capacity.delete');
    
    
    Route::get("/settings",[frontController::class, 'frontText'])->name('front.text');
    Route::get("/createText",[frontController::class, 'createText'])->name('front.createText');
    Route::post("/storeText",[frontController::class, 'storeText'])->name('front.storeText');
    Route::get("/frontText/{id}",[frontController::class, 'editText'])->name('front.editText');
    Route::post("/updateTest/{id}",[frontController::class, 'updateText'])->name('front.updateText');
    Route::get("/deleteText/{id}",[frontController::class, 'deleteText'])->name('front.deleteText');

    
//product hide show 
Route::post('/productVisibilty', [ProductController::class,'productVisibilty'])->name('product.showHide');



});

// for user

});


// Route::get('/', [usercontroller::class, 'indexpage'])->name('index');
// Route::get('logout', [usercontroller::class, 'logoutpage'])->name('logout');
// Route::get('admin/login', [LoginController::class, 'login_page'])->name('admin.login');
// Route::get('dealerRegister', [usercontroller::class, 'dregist_page'])->name('dealerRegister');

// Auth::routes();

// Route::group(['middleware' => 'auth',  'prefix' => ''], function () {
//     Route::group(['middleware' => 'is_admin',  'prefix' => 'admin'], function () {
//         Route::get('/role', [PermissionControlle::class, 'Permission']);
//         Route::get('/dashboard', [HomeController::class, 'dashboard_page'])->name('admin.dashboard');
//         Route::get('/icons', [HomeController::class, 'icon_page'])->name('admin.icons');
//         Route::get('/map', [HomeController::class, 'map_page'])->name('admin.map');
//         Route::get('/notification', [HomeController::class, 'notification_page'])->name('admin.notification');
//         Route::get('/profile', [HomeController::class, 'profile_page'])->name('admin.profile');
//         Route::get('/table', [HomeController::class, 'table_page'])->name('admin.table');
//         Route::get('/support', [HomeController::class, 'support_page'])->name('admin.support');
//         Route::get('/typograph', [HomeController::class, 'typograph_page'])->name('admin.typograph');
//     });

//     Route::get('/brand', [usercontroller::class, 'brandpage'])->name('brand');
// });
// // this route is default without condition redirect to login
// Route::get('/userform', [usercontroller::class, 'userformpage'])->name('userform');
// Route::get('/product', [usercontroller::class, 'productpage'])->name('product');
