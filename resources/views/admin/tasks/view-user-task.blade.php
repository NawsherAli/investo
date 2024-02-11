@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
                        <div class="col-md-9 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive"><a href="{{route('admin.tasks.userTaskIndex')}}"> <i class="anticon anticon-left text-primary "></i></a> User Task Details </h3>
                        </div>
                        <div class="col-md-3 order-sm-3 order-2 col-6 ">
                            <div class="dropdown dropdown-animated scale-left">
                                <!-- <button type="button" class="btn badge-pending br-50" data-toggle="dropdown">
                                 <span>Status: Pending</span>
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class=" ">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="text-center text-sm-left col-12 col-sm-3  flex-column align-items-center">
                                                <div class="avatar avatar-image flex-column align-items-center" style="width: 150px; height:150px">
                                                    <img src="{{asset('assets/images/avatars/'.$tasks->user->profile_image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="  text-sm-left m-v-15 p-l-30 col-12 col-sm-8 flex-column">
                                                <h2 class="m-b-5 title-responsive">User Name: {{ $tasks->user->name }}</h2>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                    <span class=" ">+{{ $tasks->user->contact }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                    <span class=" ">{{ $tasks->user->email }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                    <span class=" ">{{ $tasks->user->status }}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    <div class="col-md-9 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive">Task Details </h3>
                    </div>
                    <div class="row ">
                        <div class="table-responsive col-md-6">
                            <table class="table table-sm ">
                                <thead>
                                    <tr class="">
                                        <th scope="col">ID</th>
                                        <th scope="row">{{$tasks->id}}</th>
                                    </tr>
                                    <tr class="">   
                                        <th scope="col">Name</th>
                                        <td>{{$tasks->task->title}}</td>
                                    </tr>
                                    <!-- <tr class="">
                                        <th scope="col">amount</th>
                                        <td>{{$tasks->task->amount}}</td>
                                    </tr> -->
                                    <tr class="">
                                        <th scope="col">Date</th>
                                        <td>{{$tasks->created_at}}</td>
                                    </tr>
                                    
                                <tbody>
                                 </tbody>
                            </table>
                        </div>
                        <div class="table-responsive col-md-6">
                            <table class="table table-sm ">
                                <thead>
                                <tr class="">
                                        <th scope="col">Task Image</th>
                                </tr>
                                <tr>
                                        <td><img src="{{ asset('assets/images/tasks_pictures/' . $tasks->image) }}" alt=""></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
</div>
    @if($tasks->status=='pending')
    <form method="POST" action="{{route('usertask.update', ['id' => $tasks->id])}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-row">
        <div class="form-group col-md-6">
            <input type="number" hidden name="task_id" value="{{$tasks->id}}">
            <label for="task_status" class="text-primary">Account Status</label>
            <select id="task_status" class="form-control" name="task_status">
                <option selected>Choose...</option>
                <option {{ 'pending' == $tasks->status ? 'selected' : '' }} value="pending">Pending</option>
                <option {{ 'completed' == $tasks->status ? 'selected' : '' }} value="completed">Completed</option>
            </select>
<!-- 
             <label for="deposit_status" class="text-primary">Task Amount</label>
             <input type="number" name="task_amount" class="form-control" placeholder="Enter task amount" required> -->
        </div>
        <div class="form-group  col-6  d-flex align-items-end justify-content-start">
            <button type="submit" class="col-md-3 btn  btn-primary showbtn">Update</button>
        </div>
    </form>
    @endif
    </div>

@endsection