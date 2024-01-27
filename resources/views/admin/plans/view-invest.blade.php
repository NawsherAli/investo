@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
                        <div class="col-md-9 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive"><a href="{{route('admin.plans.investments')}}"> <i class="anticon anticon-left text-primary "></i></a> Investment Details </h3>
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
                                                    <img src="{{asset('assets/images/avatars/'.$invest->user->profile_image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="  text-sm-left m-v-15 p-l-30 col-12 col-sm-8 flex-column">
                                                <h2 class="m-b-5 title-responsive">Invester: {{ $invest->user->name }}</h2>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                    <span class=" ">+{{ $invest->user->contact }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                    <span class=" ">{{ $invest->user->email }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                    <span class=" ">{{ $invest->user->status }}</span> 
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
                            <h3 class="title-responsive">Investment Details </h3>
                    </div>
                    <div class="row ">
                        <div class="table-responsive col-md-6">
                            <table class="table table-sm ">
                                <thead>
                                    <tr class="">
                                        <th scope="col">ID</th>
                                        <th scope="row">{{$invest->id}}</th>
                                    </tr>
                                    <tr class="">   
                                        <th scope="col">Plan </th>
                                        <td>{{$invest->plan->name}}</td>
                                    </tr>
                                    <tr class="">
                                        <th scope="col">Investment Amount</th>
                                        <td>{{$invest->amount}}</td>
                                    </tr>   
                                     <tr class="">
                                        <th scope="col">Earn Amount</th>
                                        <td>{{$invest->earn_amount}} PKR</td>
                                    </tr>                                  
                                <tbody>
                                 </tbody>
                            </table>
                        </div>

    
    <form method="POST" action="{{route('invest.update', ['id' => $invest->id])}}"  enctype="multipart/form-data" class="col-md-6">
         @csrf
         @method('PUT')
         <div class="form-row">
        <!-- <div class="form-group col-md-6"> -->
            <input type="number" hidden name="invest_id" value="{{$invest->id}}">
            <label for="invest_status" class="text-primary">Earn From Plan</label>
            <input type="number" name="earn_from_plan" class="form-control" value=" ">
            <label for="invest_status" class="text-primary">Account Status</label>
            <select id="invest_status" class="form-control" name="invest_status">
                <option selected>Choose...</option>
                <option {{ 'active' == $invest->status ? 'selected' : '' }} value="active">Active</option>
                <option {{ 'in-active' == $invest->status ? 'selected' : '' }} value="in-active">In Active</option>
            </select>
            <button type="submit" class=" col-md-12 mt-3 btn  btn-primary showbtn">Update</button>
        </div>
        <div class="form-row">
        <!-- <div class="form-group   d-flex align-items-end justify-content-start"> -->
            
        <!-- </div> -->
        </div>
    </form>
</div>
    </div>

@endsection