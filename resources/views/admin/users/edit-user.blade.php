@extends('admin.layouts.layout')
@section('contents')
<div class="col-12">
        <div class=" ">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="d-flex align-items-center">
                        <div class="text-center text-sm-left ">
                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                                <img src="{{asset('assets/images/avatars/'.$user->profile_image)}}" alt="">
                            </div>
                        </div>
                        <div class="text-center text-sm-left m-v-15 p-l-30">
                            <h2 class="m-b-5 title-responsive">Hello,{{$user->name}} </h2>
                            <p class="text-dark m-b-20">{{$user->email}}</p>
                            <label for="user_picture" class="btn btn-primary">Upload Profile Picture</label>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class=" d-md-block d-none    col-1" style="border-left:1px solid #219653;"></div>
                        <div class="col-12 d-sm-none" style="border-top:1px solid #219653;"></div>

                        <div class="col">
                            <ul class="list-unstyled m-t-10">
                                <li class="row">
                                    <p class=" col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-mail"></i> -->
                                        <span class="text-primary">Contact: </span> 
                                    </p>
                                    <p class="col font-weight-semibold text-black">{{$user->contact}}</p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <form method="POST" action="{{route('user.update', ['id' => $user->id])}}"  enctype="multipart/form-data">
         @csrf
         @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name" class="text-primary">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter User Name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="email" class="text-primary">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Driver Email" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-row ">
            <div class="form-group col-md-6">
                <label for="phone" class="text-primary">Phone</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter Driver Phone" name="phone" value="{{$user->contact}}">
            </div>
            <div class="form-group col-md-6">
                <label for="status" class="text-primary">Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected>Choose...</option>
                    <option {{ 'active' == $user->status ? 'selected' : '' }} value="active">Active</option>
                    <option {{ 'in-active' == $user->status ? 'selected' : '' }} value="in-active">In Active</option>
                </select>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <!-- <label for="driver_picture" class="text-primary">Driver Picture</label> -->
                <input type="file" hidden class="form-control" id="user_picture" name="user_picture">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection