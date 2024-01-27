<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Invest;
use App\Models\Plan;
use App\Models\UserTask;
use App\Models\Task;
use App\Models\Withdraw;
use Carbon\Carbon;
class DashboardController extends Controller
{   
    //     public function investmentsUpdate()
    // {
    //     $investments = Invest::where('status', 'active')->get();
       
    //     dd($investments->all());
    //     foreach ($investments as $investment) {
    //         $investDate = Carbon::parse($investment->invest_date);
    //         $validForDays = $investment->valid_for_days;

    //         $daysDifference = now()->diffInDays($investDate);

    //         if ($daysDifference >= $validForDays) {
    //             // Update the status to 'inactive'
                

    //             $plan_invest_amount = $investments->amount;
    //             $per_day_ern_percentage =Plans::find($investments->plan_id);

    //             $total_days_pers = ($investments->valid_for_days * $per_day_ern_percentage->per_day_earn);

    //             $total_earn_amount = ($total_days_pers * $plan_invest_amount) / 100;

    //             $investment->update(['status' => 'in-active','earn_amount'=>$total_earn_amount]);

    //             $user = User::find($investments->user_id);
    //             $user->update([
    //                 'total_balance' => ($user->total_balance) + $total_earn_amount,
    //                 'current_balance' => ($user->current_balance) + $total_earn_amount,
    //             ]);

    //         }
    //     }

    //     // $this->info('Investment status checked and updated successfully.');
    
    // }








    public function adminindex(){
            
            ///Investments Update code starts
                $investments = Invest::where('status', 'active')->get();
               
                // dd($investments->all());
                foreach ($investments as $investment) {
                    $investDate = Carbon::parse($investment->invest_date);
                    $validForDays = $investment->valid_for_days;

                    $daysDifference = now()->diffInDays($investDate);

                    if ($daysDifference >= $validForDays) {
                        // Update the status to 'inactive'
                        

                        $plan_invest_amount = $investment->amount;
                        $per_day_ern_percentage =Plan::find($investment->plan_id);

                        $total_days_pers = ($investment->valid_for_days * $per_day_ern_percentage->per_day_earn);

                        $total_earn_amount = ($total_days_pers * $plan_invest_amount) / 100;

                        $investment->update(['status' => 'in-active','earn_amount'=>$total_earn_amount]);

                        $user = User::find($investment->user_id);
                        $user->update([
                            'total_balance' => ($user->total_balance) + $total_earn_amount,
                            'current_balance' => ($user->current_balance) + $total_earn_amount,
                        ]);

                    }
                }

            ///Investments Update code end


        $alldeposits = Deposit::all()->sum('amount');
        $allInvests = Invest::all()->sum('amount');
        $tasks = UserTask::all();
        $alltasks = count($tasks);
        $deposits= Deposit::with('user')->orderBy('created_at', 'desc')
    ->paginate(10);
        $withdraws= Withdraw::with('user')->orderBy('created_at', 'desc')
    ->paginate(10);
        // investmentsUpdate();
        return view('admin.dashboard',compact('alldeposits','allInvests','deposits','withdraws','alltasks'));
    }
    public function index()
    {	


        ///Investments Update code starts
        $investments = Invest::where('status', 'active')->get();
       
        // dd($investments->all());
        foreach ($investments as $investment) {
            $investDate = Carbon::parse($investment->invest_date);
            $validForDays = $investment->valid_for_days;

            $daysDifference = now()->diffInDays($investDate);

            if ($daysDifference >= $validForDays) {
                // Update the status to 'inactive'
                

                $plan_invest_amount = $investment->amount;
                $per_day_ern_percentage =Plan::find($investment->plan_id);

                $total_days_pers = ($investment->valid_for_days * $per_day_ern_percentage->per_day_earn);

                $total_earn_amount = ($total_days_pers * $plan_invest_amount) / 100;

                $investment->update(['status' => 'in-active','earn_amount'=>$total_earn_amount]);

                $user = User::find($investment->user_id);
                $user->update([
                    'total_balance' => ($user->total_balance) + $total_earn_amount,
                    'current_balance' => ($user->current_balance) + $total_earn_amount,
                ]);

            }
        }

        ///Investments Update code end
    	 $user = Auth::user();
         // investmentsUpdate();
    	// Ensure the user is authenticated
    	if ($user) {
        // Retrieve the sum of all amounts for the authenticated user
        	$alldeposits = $user->deposits()->sum('amount');
        	$allwithdraws = $user->withdraws()->where('status', '=', 'completed')->sum('amount');
        	$allpendingwithdraws = $user->withdraws()->where('status', '=', 'pending')->sum('amount');
        	$allinvests = $user->invests()->sum('amount');
        	$allcurrentinvests = $user->invests()->where('status', '=', 'active')->sum('amount');
            $allearnfrominvest = $user->invests()->sum('earn_amount');
             
    	}
         $userid = Auth::user()->id;
         $user_invests = Invest::with('user','plan')->where('user_id', '=',$userid)->where('status', '=','active')        ->get();
        $user_tasks = UserTask::where('status', '=', 'completed')->where('id','=',$userid)->get();
        // dd($user_invests);
        $task_amount = 0;

        foreach ($user_tasks as $usertask) {
            // Assuming there is a relationship between UserTask and Task, e.g., 'task'
            $task = $usertask->task;

            // Check if the task exists
            if ($task) {
                $task_amount += $task->amount;
            }
        }
        

         

        return view('customer.dashboard',compact('alldeposits','allwithdraws','allinvests','allpendingwithdraws','allcurrentinvests','allearnfrominvest','task_amount','user_invests' ));
    }

    public function team(){

        $user_refercode = Auth::user()->referal_code;

        // Assuming you have a relationship named 'invests' in your User model
        $teammembers = User::with('invests')->where('refer_by', '=', $user_refercode)->get();
        return view('customer.team', compact('teammembers'));
    }
}
