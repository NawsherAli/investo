<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTask; 
use App\Models\Task; 
use App\Models\User; 
// use App\Models\UserTask; 
use Illuminate\Support\Facades\Auth;
class TasksController extends Controller
{
     public function index()
    {
    	// $users = User::all();
         $tasks = Task::paginate(2);
    	// $users = User::where('role', '=', 'customer')->paginate(2);
        return view('admin.tasks.index',compact('tasks'));
    }
     public function userTaskindex()
    {
        // $users = User::all();
         $tasks = UserTask::with('user','task')->orderBy('created_at', 'desc')
    ->paginate(10);
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('admin.tasks.user-tasks-index',compact('tasks'));
    }
     public function userIndex()
    {
        // $users = User::all();
         $tasks = Task::where('status','=','active')->get();
          $user_id = Auth::user()->id;
         $user_tasks = UserTask::where('user_id','=',$user_id)->get();
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('customer.tasks',compact('tasks','user_tasks'));
    }

     public function doTask($id)
    {
         $task = Task::findOrFail($id);
        // $users = User::where('role', '=', 'customer')->paginate(2);
        return view('customer.dotask',compact('task'));
    }

    public function storetask(Request $request)
    {
        // dd($request->all());
        // Validate the form data
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('task_pictures','public');
        $id = Auth::user()->id;
        $task = UserTask::create([
            'user_id'=>$id,
            'task_id' => $request->input('task_id'),
            'image'=> $path,
        ]);


        return redirect()->back()->with('success', 'Your task received successfully, after review it will goes to complete state');
    }


    public function createTask()
    {
        return view('admin.tasks.create-task');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_link' => 'nullable|string|max:255',
            // 'task_amount' => 'nullable|numeric',
            'task_description' => 'nullable|string',
        ]);

        // Create a new Task instance and save it to the database
        $task = Task::create([
            'title' => $request->input('task_title'),
            'link' => $request->input('task_link'),
            // 'amount' => $request->input('task_amount'),
            'description' => $request->input('task_description'),
        ]);

        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.tasks.index')->with('success', 'Task created successfully');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('admin.tasks.edit-task', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'task_title' => 'required|string|max:255',
            'task_link' => 'nullable|string|max:255',
            // 'task_amount' => 'nullable|numeric',
            'status' => 'required|in:active,in-active',
            'task_description' => 'nullable|string',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);

        // Update the task with the new data
        $task->update([
            'title' => $request->input('task_title'),
            'link' => $request->input('task_link'),
            // 'amount' => $request->input('task_amount'),
            'status' => $request->input('status'),
            'description' => $request->input('task_description'),
        ]);

        // You can add a success message or redirect the user to another page here
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted successfully');
    }

    public function userTaskDestroy($id)
    {
        $task = UserTask::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.tasks.userTaskIndex')->with('success', 'User Task deleted successfully');
    }

    public function viewuserTask($id)
    {
        
        $tasks = UserTask::with('user','task')->find($id);
        // You can handle the case when the driver is not found, for example:
        if (!$tasks) {
            abort(404); // or redirect to a custom error page
        }

        return view('admin.tasks.view-user-task', ['tasks' => $tasks]);
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        // Use Eloquent to retrieve drivers based on the search term
        $tasks = Task::where('title', 'like', "%$search%")->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function userTaskUpdate(Request $request, $id)
    {
        // Validate the form data
        // dd($request->all());
        $request->validate([
            'task_id' => 'required|string|max:255',
            'task_status' => 'required|in:pending,completed',
            // 'task_amount' => 'required|numeric',
        ]);

        // Find the deposit by ID
        $userTask = UserTask::findOrFail($id);
        // $amount = $request->input('task_amount');

        // Find the user associated with the deposit
        $userid = $userTask->user_id;


        $user= User::findOrFail($userid);
        
        // Update the deposit with the new status
        $userTask->update([
            'status' => $request->input('task_status'),
        ]);
        // dd($user->total_balance+ $amount);
        // Update the user's total_amount and current_amount
        // $user->update([
        //     'total_balance' => ($user->total_balance) + $amount,
        //     'current_balance' => ($user->current_balance) + $amount,
        // ]);

        // Redirect the user to another page with a success message
        return redirect()->route('admin.tasks.userTaskIndex')->with('success', 'User Task updated successfully');
    }
}
