<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
class CustomerController extends Controller
{
    public function index()
    {
    	// $drivers = Driver::all();
         $customers = User::where('role', '=', 'customer')->with('customer')->paginate(1);
        return view('admin.drivers.customers',compact('customers'));
    }

    public function edit($id)
    {
        $user = User::with('customer')->findOrFail($id);
        return view('admin.drivers.edit-customer', compact('user'));
    }

    public function update(Request $request, $id)
	{
	    $request->validate([
	        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
	        'name' => 'required|string',
	        'email' => 'required|email',
	        'contact' => 'nullable|numeric|digits:11',
	        'e_transfer_no' => 'nullable|numeric',
	        'address' => 'nullable|string',
	    ]);

	    // Fetch the user
	    $user = User::findOrFail($id);

	    // Handle image upload if a new image is provided
	    if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $imageName = time() . '.' . $image->getClientOriginalExtension();
	        $image->move(public_path('assets/images/avatars'), $imageName);
	        $user->profile_image = $imageName;
	    }

	    // Update other user information
	    $user->name = $request->input('name');
	    $user->email = $request->input('email');
	    $user->contact = $request->input('contact');
	    $user->e_transfer_no = $request->input('e_transfer_no');
	    $user->role = $request->input('role');
	    $user->status = $request->input('status');
	    $user->save();

	    // Fetch the associated customer
	    $customer = Customer::where('user_id', '=', $user->id)->first();

	    // Check if customer exists before attempting to update
	    if ($customer) {
	        $customer->update([
	            'address' => $request->input('address'),
	        ]);
	    }

	    return redirect()->back()->with('success', 'Profile updated successfully!');
	}

	//View single customer details
    public function viewCustomer($id)
    {
        $user = User::with('customer')->findOrFail($id);
       
        return view('admin.drivers.view-customer', ['user' => $user]);
    }

    public function destroy($id)
    {
    	try {
		    $user = User::findOrFail($id);
		    $customer = Customer::where('user_id', $user->id)->first();

		    if ($customer) {
		        $customer->delete();
		    }

		    $user->delete();

		    return redirect()->back()->with('success', 'User and associated customer record deleted successfully!');
		} catch (\Exception $e) {
		    return redirect()->back()->with('error', 'Error deleting user and associated customer.');
		}
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $customers = User::where('name', 'like', "%$search%")->where('role', '=', 'customer')->paginate(10);

        return view('admin.drivers.customers', compact('customers'));
    }
}
