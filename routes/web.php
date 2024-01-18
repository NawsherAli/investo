<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//Admin dashboard route
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

//Fundraiser dashboard route
Route::get('/fundraiser/dashboard', function () {
    return view('fundraiser.dashboard');
})->middleware(['auth', 'verified'])->name('fundraiser.dashboard');

//Customer dashboard route
Route::get('/investors/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('customer.dashboard');

Route::middleware('auth')->group(function () {
 
	//Profile edit routes
	Route::get('/admin/profile', [ProfileController::class, 'adminEdit'])->name('admin.profile.edit');

    Route::get('/customer/profile', [ProfileController::class, 'customerEdit'])->name('customer.profile.edit');
    Route::get('/fundraiser/profile', [ProfileController::class, 'fundraiseredit'])->name('fundraiser.profile.edit');

    //Profile update routes
    Route::patch('/admin/profile', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');
    Route::patch('/customer/profile', [ProfileController::class, 'customerUpdate'])->name('customer.profile.update');


    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Customer Routes
Route::get('/pickup/request', function () {
    return view('customer.pickup-request.index');
});
Route::get('/donations', function () {
    return view('customer.donations.index');
});
Route::get('/chat', function () {
    return view('customer.chat.index');
});
Route::get('/fundraiser', function () {
    return view('customer.fundraiser.index');
});
Route::get('/fundraiser/details', function () {
    return view('customer.fundraiser.fundraiser-details');
})->name('customer.view.fundraiser');

Route::get('/donate', function () {
    return view('customer.fundraiser.donate-now');
});
Route::get('customer/view/donor', function () {
    return view('customer.donations.donar-details');
})->name('customer.donor-view');


//Admin Driver Routes 
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/drivers/create', [DriverController::class, 'create'])->name('drivers.create');
Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');
Route::get('/drivers/{id}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
Route::put('/drivers/{id}', [DriverController::class, 'update'])->name('drivers.update');
Route::delete('/drivers/{id}',[DriverController::class, 'destroy'])->name('drivers.destroy');

//View single Driver
Route::get('/view-driver/{id}',[DriverController::class, 'viewDriver'])->name('view.driver');
//search driver
Route::get('/drivers/search', [DriverController::class, 'search'])->name('drivers.search');


//Admin customer routes
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/view-customer/{id}',[CustomerController::class, 'viewCustomer'])->name('view.customer');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
//search driver
Route::get('/customer/search', [CustomerController::class, 'search'])->name('customer.search');



Route::get('/admin/donations', function () {
    return view('admin.donations.index');
});
Route::get('admin/view/donor', function () {
    return view('admin.donations.donar-details');
})->name('admin.donor-view');

Route::get('admin/fundraiser/donation', function () {
    return view('admin.fundraiser-donation.index');
})->name('admin.fundraiser.donations');

Route::get('admin/charities', function () {
    return view('admin.fundraiser-donation.view-charity');
})->name('admin.view.fundraiser');

Route::get('admin/view/charities', function () {
    return view('admin.fundraiser-donation.charities');
})->name('admin.charities');



Route::get('admin/pickup/list', function () {
    return view('admin.pickup-request.index');
})->name('admin.pickup');

Route::get('admin/chat', function () {
    return view('admin.chat.index');
})->name('admin.chat');


//Fundraiser
Route::get('/fundraiser/donations', function () {
    return view('fundraiser.donations.index');
});

Route::get('fundraiser/view/donor', function () {
    return view('fundraiser.donations.donar-details');
})->name('fundraiser.donor-view');

Route::get('fundraiser/chat', function () {
    return view('fundraiser.chat.index');
})->name('fundraiser.chat');



//Test Routs
Route::get('/test', function () {
    return view('test');
});

require __DIR__.'/auth.php';
