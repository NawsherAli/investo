<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver; // Make sure to import your Driver model
use Illuminate\Support\Facades\Storage;
class DriverController extends Controller
{
   
   	public function index()
    {
    	// $drivers = Driver::all();
         $drivers = Driver::paginate(2);
        return view('admin.drivers.driver-profiles',compact('drivers'));
    }

    public function create()
    {
        return view('admin.drivers.create-driver-profile');
    }

    public function store(Request $request)
    {
    	// dd($request->all());
        // Validate the form data
        $validatedData = $request->validate([
            'driver_name' => 'required',
            'driver_email' => 'required|email',
            'driver_address' => 'required',
            'driver_phone' => 'required|numeric',
            'driver_vehical' => 'required',
            'vehical_number_plate' => 'required',
            'driver_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload if a picture is provided
        if ($request->hasFile('driver_picture')) {
            // Upload the file and store the path in the database
            $path = $request->file('driver_picture')->store('driver_pictures','public');
            $validatedData['driver_picture'] = $path;
        }

        Driver::create($validatedData);

        return redirect()->route('drivers.create')->with('success', 'Driver added successfully');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.drivers.edit-driver', compact('driver'));
    }

    public function update(Request $request, $id)
    {
            // Validate the form data
        $validatedData = $request->validate([
            'driver_name' => 'required|string|max:255',
            'driver_email' => 'required|email|max:255',
            'driver_address' => 'required|string|max:255',
            'driver_phone' => 'required|numeric',
            'driver_vehical' => 'required|in:Van,Truck',
            'vehical_number_plate' => 'required|string|max:20',
            'driver_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the driver by ID
        $driver = Driver::findOrFail($id);

        // Update the driver details
        $driver->update([
            'driver_name' => $validatedData['driver_name'],
            'driver_email' => $validatedData['driver_email'],
            'driver_address' => $validatedData['driver_address'],
            'driver_phone' => $validatedData['driver_phone'],
            'driver_vehical' => $validatedData['driver_vehical'],
            'vehical_number_plate' => $validatedData['vehical_number_plate'],
        ]);

        if ($request->hasFile('driver_picture')) {
            $imagePath = $request->file('driver_picture')->store('driver_pictures', 'public');
            Storage::disk('public')->delete($driver->driver_picture);
             $driver->update(['driver_picture' => $imagePath]);
        }
        // Redirect to the driver details page or any other appropriate page
        return redirect()->route('drivers.index', ['id' => $driver->id])->with('success', 'Driver details updated successfully');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }

    //View single driver details
    public function viewDriver($id)
    {
        $driver = Driver::find($id);

        // You can handle the case when the driver is not found, for example:
        if (!$driver) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.drivers.view-driver', ['driver' => $driver]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $drivers = Driver::where('driver_name', 'like', "%$search%")->paginate(10);

        return view('admin.drivers.driver-profiles', compact('drivers'));
    }
}

