<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Luckydraw; 
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
class LuckydrawController extends Controller
{
    public function create(){
    	return view('customer.luckydraw');
    }

    public function storeLuckydraw(Request $request)
    {
        // dd($request->all());
        $current_balaance = Auth::user()->current_balance;

        if ($current_balaance == 0) {
             return redirect()->back()->with('success', 'Your account balance is 0 PKR');
         }elseif ($current_balaance > ($request->input('amount_invest')) ) {
           // Validate the form data
                 $request->validate([
                    'name' => 'required',
                    'easypisa_number' => 'required|numeric',
                    'whatsapp_number' => 'required|numeric',
                    'amount_invest' => 'required|numeric',
                ]);

                $lucky = Luckydraw::create([
                    'name' => $request->input('name'),
                    'easypaisa_number'=>$request->input('easypisa_number'),
                    'whatsapp_number'=>$request->input('whatsapp_number'),
                     'invest_amount'=>$request->input('amount_invest'),
                 ]);

                $userid = Auth::user()->id;
                $user= User::findOrFail($userid);
                $user->update([
                     'current_balance' => ($user->current_balance) - $request->input('amount_invest'),
                ]);

                return redirect()->back()->with('success', 'Your Luckydraw received successfully, after review it will goes to complete state');


            
        }else{
               return redirect()->back()->with('success', 'Your amount exceed from your current balance!'); 
            }
    }

     public function index()
    {
        // $users = User::all();
         // $users = User::paginate(2);
        $luckydraws= Luckydraw::orderBy('created_at', 'desc')
    ->paginate(10);
        return view('admin.luckydraws.index',compact('luckydraws'));
    }

    

    public function luckydrawDestroy($id)
    {
        // dd($id);
        $luckydraw = Luckydraw::findOrFail($id);
        $luckydraw->delete();

        return redirect()->route('admin.luckydraw.index')->with('success', 'luckydraw deleted successfully');
    }

    public function viewLuckydraw($id)
    {
        $luckydraw= Luckydraw::findOrFail($id);

        // You can handle the case when the driver is not found, for example:
        if (!$luckydraw) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.luckydraws.view-luckydraw', ['luckydraw' => $luckydraw]);
    }

    public function luckydrawUpdate(Request $request, $id)
    {
        // dd($request->all());
        // Validate the form data
        $request->validate([
            'luckydraw_id' => 'required|max:255',
            'luckydraw_status' => 'required|in:active,inactive',
         ]);

        // Find the deposit by ID
        $withdraw = Luckydraw::findOrFail($id);
        $amount = $withdraw->amount;

        // Update the deposit with the new status
        $withdraw->update([
            'status' => $request->input('luckydraw_status'),
       ]);
        
        // Redirect the user to another page with a success message
        return redirect()->route('admin.luckydraw.index')->with('success', 'LuckyDraw updated successfully');
    }

    public function luckydrawsearch(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $luckydraws = Luckydraw::where('name', 'like', "%$search%")->paginate(10);

        return view('admin.luckydraws.index', compact('luckydraws'));
    }
}
