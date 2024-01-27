@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
                        <div class="col-md-9 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive"><a href="{{route('admin.users')}}"> <i class="anticon anticon-left text-primary "></i></a> User Details </h3>
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
                                                    <img src="{{asset('assets/images/avatars/'.$user->profile_image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="  text-sm-left m-v-15 p-l-30 col-12 col-sm-8 flex-column">
                                                <h2 class="m-b-5 title-responsive">Hello, {{ $user->name }}!</h2>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                    <span class=" ">+{{ $user->contact }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                    <span class=" ">{{ $user->email }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                    <span class=" ">{{ $user->status }}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        
                    </div>
                    <div class="row ">
                        <div class="table-responsive col-md-12">
                            <table class="table table-sm ">
                                <thead>
                                    <tr class="">
                                        <th scope="col">Role:</th>
                                        <th scope="row">{{$user->role}}</th>
                                    </tr>
                                    <tr class="">
                                        <th scope="col">Referal Code:</th>
                                        <th scope="row">{{$user->referal_code}}</th>
                                    </tr>
                                    <tr class="">
                                        <th scope="col">Referal by:</th>
                                        <th scope="row">{{$user->refer_by}}</th>
                                    </tr>
                                    <tr class="">
                                        <th scope="col">Total Amount:</th>
                                        <th scope="row">{{$user->total_balance}}</th>
                                    </tr>
                                    <tr class="">
                                        <th scope="col">Current Amount:</th>
                                        <th scope="row">{{$user->current_balance}}</th>
                                    </tr>
                                <tbody>
                                 </tbody>
                            </table>
                        </div>
                    </div>
@endsection