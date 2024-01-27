<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Deposit;
use App\Models\Deposithelp;
use App\Models\User; 
use App\Mail\DepositConfirmation;
class DepositController extends Controller
{
    public function createDeposit()
    {
    	$id = Auth::user()->id;
    	$deposits = Deposit::where('user_id','=',$id)->get();
        return view('customer.deposit',compact('deposits'));
    }

    public function createHelpDeposit()
    {
        $id = Auth::user()->id;
        $deposits = Deposit::where('user_id','=',$id)->get();
        return view('customer.helpdeposit',compact('deposits'));
    }

    public function store(Request $request)
    {
    	// dd($request->all());
        // Validate the form data
         $request->validate([
            'amount' => 'nullable|numeric',
            'transaction_no' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('transaction_pictures','public');
        $id = Auth::user()->id;
        $task = Deposit::create([
        	'user_id'=>$id,
            'amount' => $request->input('amount'),
            'transaction' => $request->input('transaction_no'),
            'description' => $request->input('task_description'),
            'image'=> $path,
        ]);
        
        $user = auth()->user();
        Mail::to($user->email)->send(new DepositConfirmation($user));

        return redirect()->route('user.create.deposit')->with('success', 'Your deposit will be approved within 25 minutes');
    }

    public function helpStore(Request $request)
    {
        // dd($request->all());
        // Validate the form data
         $request->validate([
            'amount' => 'nullable|numeric',
            'transaction_no' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('transaction_pictures','public');
        $id = Auth::user()->id;
        $task = Deposithelp::create([
            'user_id'=>$id,
            'amount' => $request->input('amount'),
            'transaction' => $request->input('transaction_no'),
            'description' => $request->input('task_description'),
            'image'=> $path,
        ]);


        return redirect()->route('user.create.Helpdeposit')->with('success', 'Your deposit received successfully, after review it will goes to complete state');
    }


    public function adminIndex()
    {
        // $users = User::all();
         // $users = User::paginate(2);
        $deposits= Deposit::with('user')->orderBy('created_at', 'desc')
    ->paginate(10);
        return view('admin.deposits.index',compact('deposits'));
    }

    public function adminHelpIndex()
    {
        // $users = User::all();
         // $users = User::paginate(2);
        $deposits= Deposithelp::with('user')->orderBy('created_at', 'desc')
    ->paginate(10);
        return view('admin.deposits.helpindex',compact('deposits'));
    }


    public function viewDeposit($id)
    {
        $deposit= Deposit::with('user')->find($id);

        // You can handle the case when the driver is not found, for example:
        if (!$deposit) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.deposits.view-deposit', ['deposit' => $deposit]);
    }
    public function viewHelpDeposit($id)
    {
        $deposit= Deposithelp::with('user')->find($id);

        // You can handle the case when the driver is not found, for example:
        if (!$deposit) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.deposits.view-helpdeposit', ['deposit' => $deposit]);
    }


      public function depositUpdate(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'deposit_id' => 'required|string|max:255',
            'deposit_status' => 'required|in:pending,completed',
        ]);

        // Find the deposit by ID
        $deposit = Deposit::findOrFail($id);
        $amount = $deposit->amount;

        // Find the user associated with the deposit
        $userid = $deposit->user_id;


        $user= User::findOrFail($userid);
        
        // Update the deposit with the new status
        $deposit->update([
            'status' => $request->input('deposit_status'),
        ]);
        // dd($user->total_balance+ $amount);
        // Update the user's total_amount and current_amount
        $user->update([
            'total_balance' => ($user->total_balance) + $amount,
            'current_balance' => ($user->current_balance) + $amount,
        ]);

        // Redirect the user to another page with a success message
        return redirect()->route('admin.deposits.index')->with('success', 'Deposit updated successfully');
    }

    public function helpDepositUpdate(Request $request, $id)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'deposit_id' => 'required|string|max:255',
            'deposit_status' => 'required|in:pending,completed',
         ]);

        // Find the task by ID
        $deposit = Deposithelp::findOrFail($id);
        $amount  = $deposit->amount;
        // Update the task with the new data
        $deposit->update([
            'status' => $request->input('deposit_status'),
        ]);


        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.deposits.helpindex')->with('success', 'Deposit updated successfully updated successfully');
    }



    public function depositDestroy($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return redirect()->route('admin.deposits.index')->with('success', 'Deposit deleted successfully');
    }
    public function helpDepositDestroy($id)
    {
        $deposit = Deposithelp::findOrFail($id);
        $deposit->delete();

        return redirect()->route('admin.deposits.helpindex')->with('success', 'Deposit deleted successfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $deposits = Deposit::where('transaction', 'like', "%$search%")->paginate(10);

        return view('admin.deposits.index', compact('deposits'));
    }

    public function helpsearch(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $deposits = Deposithelp::where('transaction', 'like', "%$search%")->paginate(10);

        return view('admin.deposits.helpindex', compact('deposits'));
    }
}
