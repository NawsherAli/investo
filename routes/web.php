<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\LuckydrawController;
use App\Http\Controllers\WithdrawController;
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
//Login page route
Route::get('/', function () {
    return view('auth.login');
})->name('/');

////////////////////// ADMIN ROUTES /////////////////////////
Route::middleware('auth', 'role:admin')->group(function () {
  //Admin Dashboard Route
  Route::get('/dashboard', [DashboardController::class, 'adminindex'])->middleware(['auth', 'verified'])->name('admin.dashboard');
 
  //AdminProfile edit routes
    Route::get('/admin/profile', [ProfileController::class, 'adminEdit'])->name('admin.profile.edit');
 //AdminProfile update routes
    Route::patch('/admin/profile', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');

 //Admin Users Routes
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
    Route::delete('/users/{id}',[UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
    //View single user
    Route::get('/view-user/{id}',[UsersController::class, 'viewUser'])->name('view.user');
    //search user
    Route::get('/user/search', [UsersController::class, 'search'])->name('user.search');
//Admin Plans Routes
    Route::get('/admin/plans', [PlansController::class, 'index'])->name('admin.plans.index');
    Route::get('/admin/create/plan', [PlansController::class, 'createPlan'])->name('admin.plans.create_plan');
    Route::post('/plan/store', [PlansController::class, 'store'])->name('plan.store');
    Route::delete('/plan/{id}',[PlansController::class, 'destroy'])->name('plan.destroy');
    Route::get('/plan/{id}/edit', [PlansController::class, 'edit'])->name('plan.edit');
    Route::put('/plan/{id}', [PlansController::class, 'update'])->name('plan.update');
     //search plan
    Route::get('/plan/search', [PlansController::class, 'search'])->name('plan.search');

 //Admin Investments Routes 
    Route::get('/admin/plans/investments', [PlansController::class, 'investmentIndex'])->name('admin.plans.investments');
    Route::get('/view-invest/{id}',[PlansController::class, 'viewInvest'])->name('view.invest');
    Route::put('/invest/{id}', [PlansController::class, 'investUpdate'])->name('invest.update');
    Route::delete('/invest/{id}',[PlansController::class, 'investDestroy'])->name('invest.destroy');  

//Admin Tasks Route
    Route::get('/admin/tasks', [TasksController::class, 'index'])->name('admin.tasks.index');
    Route::get('/admin/create/task', [TasksController::class, 'createTask'])->name('admin.tasks.create');
    Route::post('/task/store', [TasksController::class, 'store'])->name('task.store');
    Route::delete('/task/{id}',[TasksController::class, 'destroy'])->name('task.destroy');
    Route::get('/task/{id}/edit', [TasksController::class, 'edit'])->name('task.edit');
    Route::put('/task/{id}', [TasksController::class, 'update'])->name('task.update');
     //search task
    Route::get('/task/search', [TasksController::class, 'search'])->name('task.search');
//Admin UserTask  Routes
    Route::get('/admin/user/tasks', [TasksController::class, 'userTaskindex'])->name('admin.tasks.userTaskIndex');
    Route::delete('/user/task/{id}',[TasksController::class, 'userTaskDestroy'])->name('usertask.destroy');
    Route::get('/view-user-task/{id}',[TasksController::class, 'viewuserTask'])->name('view.usertask');
    Route::put('/update-user-task/{id}', [TasksController::class, 'userTaskUpdate'])->name('usertask.update');

//Admin Deposits Routes
    Route::get('/admin/deposits', [DepositController::class, 'adminIndex'])->name('admin.deposits.index');
    Route::get('/view-deposit/{id}',[DepositController::class, 'viewDeposit'])->name('view.deposit');
    Route::put('/deposit/{id}', [DepositController::class, 'depositUpdate'])->name('deposit.update');
    Route::delete('/deposit/{id}',[DepositController::class, 'depositDestroy'])->name('deposit.destroy');
      //search task
    Route::get('/deposit/search', [DepositController::class, 'search'])->name('deposit.search');

//Admin Help Deposits Routes
    Route::get('/admin/help/deposits', [DepositController::class, 'adminHelpIndex'])->name('admin.deposits.helpindex');
    Route::get('/view-helpdeposit/{id}',[DepositController::class, 'viewHelpDeposit'])->name('view.helpdeposit');
    Route::put('/helpdeposit/{id}', [DepositController::class, 'helpDepositUpdate'])->name('helpdeposit.update');
    Route::delete('/helpdeposit/{id}',[DepositController::class, 'helpDepositDestroy'])->name('helpdeposit.destroy');
    Route::get('/helpdeposit/search', [DepositController::class, 'helpsearch'])->name('helpdeposit.search');

//Admin Withdraws Routes
    Route::get('/admin/withdraw', [WithdrawController::class, 'index'])->name('admin.withdraw.index');
    Route::get('/view-withdraw/{id}',[WithdrawController::class, 'viewWithdraw'])->name('view.withdraw');
    Route::put('/withdraw/{id}', [WithdrawController::class, 'withdrawUpdate'])->name('withdraw.update');
    Route::delete('/delete-withdraw/{id}',[WithdrawController::class, 'withdrawDestroy'])->name('withdraw.destroy');

//Admin Luckydraw Routes
    Route::get('/admin/luckydraw', [LuckydrawController::class, 'index'])->name('admin.luckydraw.index');
    Route::get('/view-luckydraw/{id}',[LuckydrawController::class, 'viewLuckydraw'])->name('view.luckydraw');
    Route::put('/luckydraw/{id}', [LuckydrawController::class, 'luckydrawUpdate'])->name('luckydraw.update');
    Route::delete('/delete-luckydraw/{id}',[LuckydrawController::class, 'luckydrawDestroy'])->name('luckydraw.destroy');

    Route::get('/luckydraw/search', [LuckydrawController::class, 'luckydrawsearch'])->name('luckydraw.search');
//Admin Withdraw info Routes
    Route::get('/admin/withdraw/info', [WithdrawController::class, 'withdrawindex'])->name('admin.withdraw.info.index');
    Route::get('/admin/create/withdraw/info', [WithdrawController::class, 'createWithdrawInfo'])->name('admin.withdraw.info.create');
    Route::post('/admin/store/withdraw/info', [WithdrawController::class, 'withdrawInfostore'])->name('withdraw-info.store');

    Route::get('/admin/withdraw/info/{id}/edit', [WithdrawController::class, 'withdrawInfoEdit'])->name('admin.withdraw.info.edit');
    Route::put('/admin/withdraw/info/update/{id}', [WithdrawController::class, 'withdrawInfoUpdate'])->name('withdraw-info.update');
    Route::delete('/admin/withdraw/info/delete/{id}',[WithdrawController::class, 'withdrawInfoDestroy'])->name('withdraw-info.destroy');
});

//////////////////// CUSTOMER ROUTES //////////////////////////
Route::middleware('auth', 'role:customer')->group(function () {
    // Customer Dashboard Route
    Route::get('/investors/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('investors.dashboard');
    //Customer Profile Edit Route
    Route::get('/customer/profile', [ProfileController::class, 'customerEdit'])->name('customer.profile.edit');
    //Customer Profile Update Route
    Route::patch('/customer/profile', [ProfileController::class, 'customerUpdate'])->name('customer.profile.update');

    //Customer Deposits Routes
    Route::get('/user/create/deposit', [DepositController::class, 'createDeposit'])->name('user.create.deposit');
    Route::post('/user/store/deposit', [DepositController::class, 'store'])->name('deposit.store');

    //Customer Heplp Deposits Routes
    Route::get('/user/create/help/deposit', [DepositController::class, 'createHelpDeposit'])->name('user.create.Helpdeposit');
    Route::post('/user/store/helpdeposit', [DepositController::class, 'helpStore'])->name('helpdeposit.store');

    //Customer Plans Routes
    Route::get('/user/plans', [PlansController::class, 'userIndex'])->name('user.plan.index');

    //Customer Tasks Route
    Route::get('/user/tasks', [TasksController::class, 'userIndex'])->name('user.tasks.index');
    Route::get('/user/do/{id}/task', [TasksController::class, 'doTask'])->name('user.do.task');
    Route::post('/user/store/dotask', [TasksController::class, 'storetask'])->name('dotask.store');

    //Customer Invest Routes
    Route::get('/user/invest/{id}/', [PlansController::class, 'userInvest'])->name('user.invest');
    Route::post('/user/store/invest', [PlansController::class, 'storeInvest'])->name('invest.store');

    //Customer Luckydraw Routes
    Route::get('/user/luckydraw', [LuckydrawController::class, 'create'])->name('user.luckydraw.create');
    Route::post('/user/store/luckydraw', [LuckydrawController::class, 'storeLuckydraw'])->name('luckydraw.store');

    //Customer Withdraw Routes
    Route::get('/user/withdraw', [WithdrawController::class, 'create'])->name('user.withdraw.create');
    Route::post('/user/store/withdraw', [WithdrawController::class, 'store'])->name('withdraw.store');

    //Customer Invester Routes
    Route::get('/investors/team', [DashboardController::class, 'team'])->middleware(['auth', 'verified'])->name('user.team');
});


require __DIR__.'/auth.php';
