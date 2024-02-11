<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan; 
use Illuminate\Support\Facades\Auth;
use App\Models\Invest;
use App\Models\User; 
 
class PlansController extends Controller
{
    public function index()
    {
    	// $users = User::all();
         $plans = Plan::paginate(10);
    	// $users = User::where('role', '=', 'customer')->paginate(2);
        return view('admin.plans.index',compact('plans'));
    }

    public function investmentIndex()
    {
        // $users = User::all();
         $invests = Invest::with('user','plan')->orderBy('created_at', 'desc')
        ->paginate(10);
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('admin.plans.invest-index',compact('invests'));
    }

    public function userIndex()
    {
        // $users = User::all();
        $plans = Plan::where('status','active')->get();
        $user_id = Auth::user()->id;
        $user_plans = Invest::where('user_id','=',$user_id)->get();
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('customer.plans',compact('plans','user_plans'));
    }


    public function createPlan()
    {
        return view('admin.plans.create-plan');
    }

        public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_minimum' => 'required|numeric',
            'plan_maximum' => 'required|numeric',
            'plan_for' => 'required|numeric',
            'plan_capital' => 'required|in:yes,no',
            'plane_level_1' => 'required|numeric',
            'plane_level_2' => 'required|numeric',
            'plane_level_3' => 'required|numeric',
            'per_day_earn' => 'required|numeric',
        ]);

        // Create a new Plan instance and save it to the database
        $plan = new Plan([
            'name' => $request->input('plan_name'),
            'manimum' => $request->input('plan_minimum'),
            'maximum' => $request->input('plan_maximum'),
            'times' => $request->input('plan_for'),
            'capital_back' => $request->input('plan_capital'),
            'valid_for' => $request->input('valid_for'),
            'level_1' => $request->input('plane_level_1'),
            'level_2' => $request->input('plane_level_2'),
            'level_3' => $request->input('plane_level_3'),
            'per_day_earn'=> $request->input('per_day_earn'),
            // Add other fields as needed
        ]);

        $plan->save();

        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit-plan', compact('plan'));
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'plan_minimum' => 'required|numeric',
            'plan_maximum' => 'required|numeric',
            'plan_for' => 'required|numeric',
            'plan_capital' => 'required|in:yes,no',
            'valid_for' => 'required|numeric',
            'plane_level_1' => 'required|numeric',
            'plane_level_2' => 'required|numeric',
            'plane_level_3' => 'required|numeric',
            'status' => 'required|in:active,in-active',
            'per_day_earn' => 'required|numeric',
        ]);

        // Find the plan by ID
        $plan = Plan::findOrFail($id);

        // Update the plan with the new data
        $plan->update([
            'name' => $request->input('plan_name'),
            'manimum' => $request->input('plan_minimum'),
            'maximum' => $request->input('plan_maximum'),
            'times' => $request->input('plan_for'),
            'capital_back' => $request->input('plan_capital'),
            'valid_for' => $request->input('valid_for'),
            'level_1' => $request->input('plane_level_1'),
            'level_2' => $request->input('plane_level_2'),
            'level_3' => $request->input('plane_level_3'),
            'status' => $request->input('status'),
            'per_day_earn'=> $request->input('per_day_earn'),
            // Add other fields as needed
        ]);

        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully');
    }


    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plan deleted successfully');
    }

    public function investDestroy($id)
    {
        $invest = Invest::findOrFail($id);
        $invest->delete();

        return redirect()->route('admin.plans.invest-index')->with('success', 'Investments deleted successfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $plans = Plan::where('name', 'like', "%$search%")->paginate(10);

        return view('admin.plans.index', compact('plans'));
    }

    public function userInvest($id)
    {
         $plan = Plan::findOrFail($id);
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('customer.invest',compact('plan'));
    }

     public function storeInvest(Request $request)
    {
        // dd($request->all());
        // Validate the form data
         $request->validate([
            'amount' => 'required|numeric',
        ]);

        $current_balaance = Auth::user()->current_balance;

        if ($current_balaance == 0) {
             return redirect()->back()->with('error', 'Your account balance is 0 PKR');
        }elseif ($current_balaance > ($request->input('amount')) ) {

             $plan = Plan::find($request->plan_id);

             $level_1_amount  = ($request->input('amount') * $plan->level_1)/100;
             $level_2_amount  = ($request->input('amount') * $plan->level_2)/100;
             $level_3_amount  = ($request->input('amount') * $plan->level_3)/100;

             $login_user= Auth::user();

             if( !empty($login_user->level_1)){
                // dd($level_1_amount); 
                $level_1_user = User::where('referal_code','=', $login_user->level_1)->first(); 
                $level_1_user->update([
                         'current_balance' => ($level_1_user->current_balance) + $level_1_amount ,
                         'referal_invest_earn' => ($level_1_user->referal_invest_earn) + $level_1_amount ,
                    ]);


                if( !empty($login_user->level_2)){

                    $level_2_user = User::where('referal_code','=', $login_user->level_2)->first();
           
                    $level_2_user->update([
                     'current_balance' => ($level_2_user->current_balance) + $level_2_amount ,
                     'referal_invest_earn' => ($level_2_user->referal_invest_earn) + $level_2_amount ,
                     ]);


                    if( !empty($login_user->level_3)){

                        $level_3_user = User::where('referal_code','=', $login_user->level_3)->first();
           
                        $level_3_user->update([
                        'current_balance' => ($level_3_user->current_balance) + $level_3_amount,
                        'referal_invest_earn' => ($level_3_user->referal_invest_earn) + $level_3_amount ,
                        ]);

                     }
                }
            }       

            $id = Auth::user()->id;
            $plan = Invest::create([
                'user_id'=>$id,
                'plan_id' => $request->input('plan_id'),
                'amount'=>$request->input('amount'),
                'invest_date'=>now(),
                'valid_for_days'=>$plan->valid_for,
             ]);

                $user= User::findOrFail($id);
                $user->update([
                     'current_balance' => ($user->current_balance) - $request->input('amount'),
                ]);

            return redirect()->back()->with('success', 'Your Investment received successfully');

        }else{
               return redirect()->back()->with('error', 'Your amount exceed from your current balance!'); 
            }
    }

    public function viewInvest($id)
    {
         
        // $deposit= Deposit::with('user')->find($id);
         $invests = Invest::with('user','plan')->find($id);
        // You can handle the case when the driver is not found, for example:
        if (!$invests) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.plans.view-invest', ['invest' => $invests]);
    }

    public function investUpdate(Request $request, $id)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'invest_id' => 'required|string|max:255',
            'earn_from_plan' => 'required|numeric',
            'invest_status' => 'required|in:active,in-active',
         ]);

        // Find the task by ID
        $invest = Invest::findOrFail($id);
        $user= User::findOrFail($invest->user_id);
        $earn_amount  = ($invest->earn_amount)+($request->input('earn_from_plan'));
        // Update the task with the new data
        $invest->update([
            'status' => $request->input('invest_status'),
            'earn_amount' => $earn_amount,
        ]);
        $user->update([
                     'total_balance' => ($user->total_balance) + $request->input('earn_from_plan'),
                     'current_balance' => ($user->current_balance) + $request->input('earn_from_plan'),
                ]);

        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.plans.investments')->with('success', 'Investment updated successfully updated successfully');
    }
}
