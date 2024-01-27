@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Edit Task</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('task.update', ['id' => $task->id])}}"  enctype="multipart/form-data">
       @csrf
         @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="task_title" class="text-primary">Title</label>
                <input type="text" class="form-control" id="task_title" placeholder="Enter Task Title" name="task_title" value="{{$task->title}}">
            </div>
        
            <div class="form-group col-md-6">
                <label for="task_link" class="text-primary">Link</label>
                <input type="text" class="form-control" id="task_link" name="task_link" placeholder="Enter task link" value="{{$task->link}}">
            </div>
        </div>
        <div class="form-row ">
            <!-- <div class="form-group col-md-6">
                <label for="task_amount" class="text-primary">Amount</label>
                <input type="number" class="form-control" id="task_amount" placeholder="Task amount" name="task_amount" value="{{$task->amount}}">
            </div> -->
            <div class="form-group col-md-12">
                <label for="status" class="text-primary">Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected>Choose...</option>
                    <option {{ 'active' == $task->status ? 'selected' : '' }} value="active">Active</option>
                    <option {{ 'in-active' == $task->status ? 'selected' : '' }} value="in-active">In Active</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="task_description" class="text-primary">Task Description</label>
                <textarea class="form-control" rows="6" name="task_description" id="task_description">{{$task->description}}</textarea>
            </div>
         </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<!-- </div> -->
@endsection