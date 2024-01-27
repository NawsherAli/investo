@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="title-responsive">Create Task</h1>
    </div>
    
</div>
<!-- <div class="row"> -->
    <form method="POST" action="{{route('task.store')}}"  enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="task_title" class="text-primary">Title</label>
                <input type="text" class="form-control" id="task_title" placeholder="Enter Task Title" name="task_title">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-12">
                <label for="task_link" class="text-primary">Link</label>
                <input type="text" class="form-control" id="task_link" name="task_link" placeholder="Enter task link">
            </div><!-- 
            <div class="form-group col-md-6">
                <label for="task_amount" class="text-primary">Amount</label>
                <input type="number" class="form-control" id="task_amount" placeholder="Task amount" name="task_amount">
            </div> -->
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="task_description" class="text-primary">Task Description</label>
                <textarea class="form-control" rows="6" name="task_description" id="task_description">Enter Descriptions</textarea>
                                          
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
<!-- </div> -->
@endsection