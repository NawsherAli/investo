<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Withdraw;
use App\Models\WithdrawInfo;
use App\Models\User; 
use App\Models\UserTask;
use App\Models\Task;  
use App\Mail\WithdrawalConfirmation;
use App\Mail\WithdrawalProcessed;
class WithdrawController extends Controller
{   

    public function withdrawindex(){
        $withdrawsinfos = WithdrawInfo::all();
        return view('admin.withdraw-info.index',compact('withdrawsinfos'));
    }

    public function createWithdrawInfo()
    {
        // $id = Auth::user()->id;
        // $deposits = Deposit::where('user_id','=',$id)->get();
        return view('admin.withdraw-info.create-withdraw-info');
    }  


    public function create()
    {
    	$id = Auth::user()->id;
    	// $deposits = Deposit::where('user_id','=',$id)->get();
        $withdrawsinfos = WithdrawInfo::where('status','=','active')->first();
        $user_withdraws = Withdraw::where('user_id','=',$id )->get();
        // dd($withdrawsinfos->all());
        return view('customer.withdraw',compact('withdrawsinfos','user_withdraws'));
    }

     public function withdrawInfostore(Request $request)
    {   
        $request->validate([
            'minimum_withdraw'=>'required|numeric',
            'withdraw_commission' => 'required|numeric',
        ]);

        $task = WithdrawInfo::create([
                'minimum_withdraw'=>$request->input('minimum_withdraw'),
                'commission' => $request->input('withdraw_commission'),
            ]);

        return redirect()->route('admin.withdraw.info.index')->with('success', 'Your Withdraw Saved successfully');
    }   

        public function withdrawInfoEdit($id)
        {
            $withdrawinfo= WithdrawInfo::find($id);

            // You can handle the case when the driver is not found, for example:
            if (!$withdrawinfo) {
                abort(404); // or redirect to a custom error page
            }

            return view('admin.withdraw-info.edit-withdraw-info', ['withdrawinfo' => $withdrawinfo]);
        }


        public function withdrawInfoUpdate(Request $request, $id){
                $request->validate([
                'minimum_withdraw'=>'required|numeric',
                'withdraw_commission' => 'required|numeric',
                 'status' => 'required|in:active,in-active',
            ]);
                // dd($request->all());
                $withdrawinfo = WithdrawInfo::findOrFail($id);

                $withdrawinfo->update([
                    'minimum_withdraw' => $request->input('minimum_withdraw'),
                    'commission' => $request->input('withdraw_commission'),
                    'status' => $request->input('status'),
                ]);
                return redirect()->route('admin.withdraw.info.index')->with('success', 'Withdraw Info updated successfully');
        }


        public function withdrawInfoDestroy($id)
        {
            // dd($id);
            $withdraw = WithdrawInfo::findOrFail($id);
            $withdraw->delete();

            return redirect()->route('admin.withdraw.info.index')->with('success', 'Withdraw Info deleted successfully');
        }


    public function store(Request $request)
    {
    	
        $current_balaance = Auth::user()->current_balance;
        $user_id = Auth::user()->id;
        
        $completedTasks = Usertask::where('user_id', $user_id)
        ->where('status', 'completed')
        ->pluck('task_id')
        ->toArray();

        $requiredTasks = Task::pluck('id')->toArray();
        $incompleteTasks = array_diff($requiredTasks, $completedTasks);

        if (!empty($incompleteTasks)) {
            return redirect()->back()->with('error', 'You must complete all tasks before withdrawing.');
        } else {
          

            // dd($request->all());
            // Validate the form data
             $request->validate([
                'real_name'=>'required',
                'amount_after' => 'required|numeric',
                'phoneNumber' => 'required',
                'accountType' => 'required',
                'other_account_number' => 'required',
            ]);

            if ($current_balaance == 0) {
                 return redirect()->route('user.withdraw.create')->with('success', 'Your account balance is 0 PKR');
             }elseif ($current_balaance < $request->input('amount_after') ) {
                return redirect()->route('user.withdraw.create')->with('success', 'You have not enough amount to withdraw');
            }else{
                $id = Auth::user()->id;
                $task = Withdraw::create([
                    'user_id'=>$id,
                    'real_name'=>$request->input('real_name'),
                    'amount' => $request->input('amount_after'),
                    'contact' => $request->input('phoneNumber'),
                    'accounttype' => $request->input('accountType'),
                    'other_acount_number' => $request->input('other_account_number'),
               ]);
                $user = auth()->user();
                 Mail::to($user->email)->send(new WithdrawalConfirmation($user));


                 return redirect()->route('user.withdraw.create')->with('success', 'Your Withdraw request received successfully');
            }
         }
    }

     public function index()
    {
        // $users = User::all();
         // $users = User::paginate(2);
        $withdraws= Withdraw::with('user')->orderBy('created_at', 'desc')
    ->paginate(10);
        return view('admin.withdraws.index',compact('withdraws'));
    }

    public function viewWithdraw($id)
    {
        $withdraw= Withdraw::with('user')->find($id);

        // You can handle the case when the driver is not found, for example:
        if (!$withdraw) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.withdraws.view-withdraw', ['withdraw' => $withdraw]);
    }

     public function withdrawUpdate(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'withdraw_id' => 'required|max:255',
            'withdraw_status' => 'required|in:pending,completed',
            'indays' => 'required|numeric',
        ]);

        // Find the deposit by ID
        $withdraw = Withdraw::findOrFail($id);
        $amount = $withdraw->amount;

        // Find the user associated with the deposit
        $userid = $withdraw->user_id;


        $user = User::findOrFail($userid);
        
        // Update the deposit with the new status
        $withdraw->update([
            'status' => $request->input('withdraw_status'),
            'indays' => $request->input('indays'),
        ]);
        // dd($user->total_balance+ $amount);
        // Update the user's total_amount and current_amount
        $user->update([
             'current_balance' => ($user->current_balance) - $amount,
        ]);

        $data = ['user_name' => $user->name,'days' =>$request->input('indays')];
        Mail::to($user->email)->send(new WithdrawalProcessed($data));
        // Redirect the user to another page with a success message
        return redirect()->route('admin.withdraw.index')->with('success', 'Withdraw updated successfully');
    }

    public function withdrawDestroy($id)
    {
        // dd($id);
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->delete();

        return redirect()->route('admin.withdraw.index')->with('success', 'Withdraw deleted successfully');
    }
}
