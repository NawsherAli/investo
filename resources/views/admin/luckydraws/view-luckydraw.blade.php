@extends('admin.layouts.layout')
@section('contents')
 <div class="row mb-3" style="border-bottom: 2px solid #219653">
                        <div class="col-md-9 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive"><a href="{{route('admin.luckydraw.index')}}"> <i class="anticon anticon-left text-primary "></i></a> LuckyDraw Details </h3>
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
                        <div class="col-6">
                            <div class=" ">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="  text-sm-left m-v-15 p-l-30 col-12 col-sm-8 flex-column">
                                                <h2 class="m-b-5 title-responsive">Participant: {{ $luckydraw->name }}</h2>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                    <span class=" ">+{{ $luckydraw->easypaisa_number }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                    <span class=" ">{{ $luckydraw->whatsapp_number }}</span> 
                                                </p>
                                                <p class="font-weight-semibold text-dark m-b-5">
                                                    <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                    <span class=" ">{{ $luckydraw->invest_amount}}</span> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6 order-sm-1 order-1 col-6 ">
                            <h3 class="title-responsive">Update status </h3>
                               <form method="POST" action="{{route('luckydraw.update', ['id' => $luckydraw->id])}}"  enctype="multipart/form-data">
                                 @csrf
                                 @method('PUT')
                                 <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="number" hidden name="luckydraw_id" value="{{$luckydraw->id}}">
                                    <label for="luckydraw_status" class="text-primary">Account Status</label>
                                    <select id="luckydraw_status" class="form-control" name="luckydraw_status">
                                        <option selected>Choose...</option>
                                        <option {{ 'active' == $luckydraw->status ? 'selected' : '' }} value="active">Active</option>
                                        <option {{ 'inactive' == $luckydraw->status ? 'selected' : '' }} value="inactive">In Active</option>
                                    </select><!-- 
                                    <label for="in_days" class="text-primary">In Days</label>
                                    <input type="number" name="indays" class="form-control" > -->
                                </div>
                                <div class="form-group  col-12  d-flex align-items-end justify-content-start">
                                    <button type="submit" class="col-md-12 btn  btn-primary showbtn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    

 
    
    </div>

@endsection