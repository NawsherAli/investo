@extends('fundraiser.layouts.layout')
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
                            <h2 class="m-b-5 title-responsive">Hello, Free Education</h2>
                            <p class="text-dark m-b-20">Personal Fundraiser</p>
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
                                    <p class="col font-weight-semibold text-black"> 432</p>
                                </li>
                                <li class="row">
                                    <p class="col-3 font-weight-semibold text-dark m-b-5">
                                        <!-- <i class="m-r-10 text-primary anticon anticon-compass"></i> -->
                                        <span class="text-primary">Address: </span> 
                                    </p>
                                    <p class="col-9 font-weight-semibold text-black"> address at main boulevard next to big ben and back, st#12,apartment complex to the right</p>
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
                        <img src="../assets/icons/star.png">
                    </div>
                    <p class="m-b-0 text-primary" style="font-size: 10px">Goal</p>
                
                    <h2 class="m-b-0 text-primary">
                        <span>$2300 </span>
                    </h2>
                    <p class="text-primary" style="font-size: 10px">$21068.50</p>
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
                        <img src="../assets/icons/cash-out.png">
                    </div>
                    <p class="m-b-0 text-primary" style="font-size: 10px">Total Balance</p>
                
                    <h2 class="m-b-0 text-primary">
                        <span>$132.50 </span>
                    </h2>
                    <p class="text-primary" style="font-size: 10px">+2.24 this week</p>
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
<div class="row">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
           <ul class="nav nav-tabs" id="myTab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Latest Donations</a>
                </li>
            </ul>
        <button class="btn btn-primary ">View All Donations</button> 
        </div>
           
    <div class="tab-content m-t-15" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

             <div class="table-responsive d-none d-sm-block">
                <table class="table table-sm text-center">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col" class="text-white">ID</th>
                            <th scope="col" class="text-white">Donor Name</th>
                            <th scope="col" class="text-white">Donation Amount</th>
                            <th scope="col" class="text-white">Charity Type</th>
                            <th scope="col" class="text-white">Charity Name</th>
                            <th scope="col" class="text-white">Number of Items Donated</th>
                            <th scope="col" class="text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td><span class="badge badge-pill badge-pending mr-3">Pending</span><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="">
                <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>ID:</b> 432</p>
                         <p class="text-black"><i class="far fa-calendar-alt"></i> 10/10/2023</p>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <h3 class="text-primary">Benjamin Parkar</h3>
                         <h3 class="text-primary">$10</h3>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>Charity Type:</b> School</p>
                         <p class="text-black"><b>Charity Name:</b> School</p>
                     </div>
                     <div class="d-flex justify-content-end align-items-center" >
                         <span class="badge badge-pill badge-success mr-3">Active</span>
                          <i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i> 
                     </div>
                </div>
                <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>ID:</b> 432</p>
                         <p class="text-black"><i class="far fa-calendar-alt"></i> 10/10/2023</p>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <h3 class="text-primary">Benjamin Parkar</h3>
                         <h3 class="text-primary">$10</h3>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>Charity Type:</b> School</p>
                         <p class="text-black"><b>Charity Name:</b> School</p>
                     </div>
                     <div class="d-flex justify-content-end align-items-center" >
                         <span class="badge badge-pill badge-success mr-3">Active</span>
                          <i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i> 
                     </div>
                </div>
                <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>ID:</b> 432</p>
                         <p class="text-black"><i class="far fa-calendar-alt"></i> 10/10/2023</p>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <h3 class="text-primary">Benjamin Parkar</h3>
                         <h3 class="text-primary">$10</h3>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>Charity Type:</b> School</p>
                         <p class="text-black"><b>Charity Name:</b> School</p>
                     </div>
                     <div class="d-flex justify-content-end align-items-center" >
                         <span class="badge badge-pill badge-success mr-3">Active</span>
                          <i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i> 
                     </div>
                </div>
                <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>ID:</b> 432</p>
                         <p class="text-black"><i class="far fa-calendar-alt"></i> 10/10/2023</p>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <h3 class="text-primary">Benjamin Parkar</h3>
                         <h3 class="text-primary">$10</h3>
                     </div>
                     <div class="d-flex justify-content-between" >
                         <p class="text-black"><b>Charity Type:</b> School</p>
                         <p class="text-black"><b>Charity Name:</b> School</p>
                     </div>
                     <div class="d-flex justify-content-end align-items-center" >
                         <span class="badge badge-pill badge-success mr-3">Active</span>
                          <i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i> 
                     </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</div>

@endsection