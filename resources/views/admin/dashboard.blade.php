@extends('admin.layouts.layout')
@section('contents')
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card bg-primary br-10">
            <div class="card-body">
                <p class="m-b-0 text-white">Total Deposits Collected</p>
                <div class="d-flex   align-items-center">
                    <h2 class="m-b-0 text-white">
                        <span>PKR: {{$alldeposits}}</span>
                    </h2>
                    <!-- <p class="text-white pt-3 ml-1"> Updated 30m ago</p> -->
                </div>    
                <!-- <p class="text-white">+50$ this week</p> -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card bg-primary br-10">
            <div class="card-body">
                <p class="m-b-0 text-white">Submitted Tasks</p>
                <div class="d-flex   align-items-center">
                    <h2 class="m-b-0 text-white">
                        <span>{{$alltasks}} </span>
                    </h2>
                    <!-- <p class="text-white pt-3 ml-1"> Updated 30m ago</p> -->
                </div>    
                <!-- <p class="text-white">+50$ this week</p> -->
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="card bg-primary br-10">
            <div class="card-body">
                <p class="m-b-0 text-white">Plans Investments</p>
                <div class="d-flex   align-items-center">
                    <h2 class="m-b-0 text-white">
                        <span>PKR: {{$allInvests}}</span>
                    </h2>
                    <!-- <p class="text-white pt-3 ml-1"> Updated 30m ago</p> -->
                </div>    
                <!-- <p class="text-white">+50$ this week</p> -->
            </div>
        </div>
    </div>
</div>
<!-- Latest Pickups and donations -->
@include('common-components.latest-pickup-donations')

@endsection 