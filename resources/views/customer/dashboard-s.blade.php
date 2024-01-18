@extends('customer.layouts.layout')
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class=" ">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="d-flex align-items-center">
                            <div class="text-center text-sm-left ">
                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                    <img src="../assets/images/avatars/donor-1.png" alt="">
                                </div>
                            </div>
                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                <h2 class="m-b-5 title-responsive">Hello, Benjamin Parker!</h2>
                                <p class="text-dark m-b-20">Customer</p>
                                <button class="btn btn-primary">View Profile</button>
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
                                            <span class="text-primary">Location: </span> 
                                        </p>
                                        <p class="col font-weight-semibold text-black">Northwest Area</p>
                                    </li>
                                    <li class="row">
                                        <p class=" col-3 font-weight-semibold text-dark m-b-5">
                                            <!-- <i class="m-r-10 text-primary anticon anticon-phone"></i> -->
                                            <span class="text-primary">User ID: </span> 
                                        </p>
                                        <p class="col font-weight-semibold text-black"> 1234</p>
                                    </li>
                                    <li class="row">
                                        <p class="col-3 font-weight-semibold text-dark m-b-5">
                                            <!-- <i class="m-r-10 text-primary anticon anticon-compass"></i> -->
                                            <span class="text-primary">Address: </span> 
                                        </p>
                                        <p class="col-6 font-weight-semibold text-black"> Los Angeles, CA</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </div>
    <div class="row pb-3">
        <div class="col-md-6 col-lg-2 col-6">
            <div class="card bg-primary-light br-tl-br-50">
                <div class="card-body flex-column align-items-center justify-content-center">
                    <div class="">
                        <div class="bg-primary p-5 d-flex justify-content-center align-items-center br-tl-br-20 icon-box">
                            <img src="../assets/icons/cash-out.png">
                        </div>
                        <p class="m-b-0 text-primary" style="font-size: 10px">Total Cashed Out</p>
                    
                        <h2 class="m-b-0 text-primary">
                            <span>$227.99 </span>
                        </h2>
                        <p class="text-primary" style="font-size: 10px">+50$ this week</p>
                    </div>    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-6">
            <div class="card bg-primary-light br-tl-br-50">
                <div class="card-body flex-column align-items-center justify-content-center">
                    <div class="">
                        <div class="bg-primary p-5 d-flex justify-content-center align-items-center br-tl-br-20 icon-box">
                            <img src="../assets/icons/donate.png">
                        </div>
                        <p class="m-b-0 text-primary" style="font-size: 10px">Total Donated </p>
                    
                        <h2 class="m-b-0 text-primary">
                            <span>$43 </span>
                        </h2>
                        <p class="text-primary" style="font-size: 10px">+10$ this week</p>
                    </div>    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-2 col-6">
            <div class="card bg-primary-light br-tl-br-50">
                <div class="card-body flex-column align-items-center justify-content-center">
                    <div class="">
                        <div class="bg-primary p-5 d-flex justify-content-center align-items-center br-tl-br-20 icon-box">
                            <img src="../assets/icons/money-bag.png">
                        </div>
                        <p class="m-b-0 text-primary" style="font-size: 10px">Total Balance</p>
                    
                        <h2 class="m-b-0 text-primary">
                            <span>$32.50 </span>
                        </h2>
                        <p class="text-primary" style="font-size: 10px">+2.24$ this week</p>
                    </div>    
                </div>
            </div>
        </div>
         <div class="col-md-6 col-lg-6 col-6">
            <div class="card border-primary1 br-tl-br-50">
                <div class="card-body flex-column align-items-center justify-content-center">
                    <div class="">
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <h2 class="title-responsive">Quick Actions</h2>
                         </div> 
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary btn-responsive-text">Claim Balance </button>
                         </div> 
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary btn-responsive-text">View Fundraisers</button>
                         </div> 
                         <p></p>
                    </div>    
                </div>
            </div>
        </div>                      
    </div>
<!-- Latest Pickups and donations -->
@include('common-components.latest-pickup-donations')

@endsection