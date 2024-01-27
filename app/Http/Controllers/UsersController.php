<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
class UsersController extends Controller
{
    public function index()
    {
    	// $users = User::all();
         // $users = User::paginate(2);
    	$users = User::where('role', '=', 'customer')->paginate(2);
        return view('admin.users.users-profiles',compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
            // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'status' => 'required|in:active,in-active',
            'user_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the driver by ID
        $user = User::findOrFail($id);

        // Update the driver details
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['phone'],
            'status' => $validatedData['status'],
        ]);
		
		// Handle image upload if a new image is provided
        if ($request->hasFile('user_picture')) {
            $image = $request->file('user_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/avatars'), $imageName);
            $user->profile_image = $imageName;
        }
        // Redirect to the driver details page or any other appropriate page
        return redirect()->route('admin.users', ['id' => $user->id])->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

        //View single user details
    public function viewUser($id)
    {
        $user = user::find($id);

        // You can handle the case when the driver is not found, for example:
        if (!$user) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.users.view-user', ['user' => $user]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $users= User::where('name', 'like', "%$search%")->where('role', '=', 'customer')->paginate(10);

        return view('admin.users.users-profiles', compact('users'));
    }
}
