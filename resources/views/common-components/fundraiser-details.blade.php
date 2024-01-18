@php
    $role = Auth::user()->role;
@endphp
<div class="row mb-3 bg-primary pt-2 br-5 " style="border-bottom: 2px solid #219653">
    <div class="col-md-10 order-sm-1 order-1 col-10">
        <h1 class="text-white title-responsive"><i class="fas fa-arrow-alt-circle-left mr-3"></i>School Charity</h1>
    </div>
    <div class="col-md-2 order-sm-3 order-2 col-2 ">
        @if($role == 'customer')
        <div class="dropdown dropdown-animated scale-left">
            <a href="{{url('/donate')}}" class="btn btn-default  " >
                <i class="fas fa-bars"></i>
            <!-- <img src="assets/icons/filter-icon.png"> -->
            <span class="hide-xs">Donate Now</span>
            </a>
        </div>
        @endif
    </div>
</div>

<!-- Row 3 -->
<div class="row mb-3" style="border-bottom: 2px solid #219653">
    <div class="col-md-12 order-sm-1 order-1 col-12">
        <h3>Charity Information</h3>
    </div>
</div>

<!-- Row 4 -->
<div class="row border border-primary bg-primary-light mb-3 br-10 p-2">
    <div class="col-md-8 d-flex align-items-center justify-content-center" style="">
        <div style=" width: 75%">
            <div class="mb-3 " style="border-bottom: 2px solid #219653">
                    <div class="">
                        <h3>Make a Difference</h3>
                    </div>
            </div>
                <p class="text-dark">When you recycle with us, you're not just being kind to the planet; you're also making a real impact by supporting a cause that matters</p>
        </div>
    </div>    
    <div class="col-md-4 d-flex align-items-center justify-content-center">
        <div class="">
            <img src="{{asset('assets/images/others/personal-fundraising.png')}}">
        </div>
    </div>
</div>

<!-- Row 5 -->
<div class="row border border-primary bg-primary-light p-10 mb-3" style="border-radius: 10px">

    <div class="col-md-3 d-flex align-items-center justify-content-center">
        <div class="">
            <img src="../assets/icons/personal-fundrasing.png">
        </div>
    </div>
    <div class="col-md-8 d-flex align-items-center justify-content-center" style="">
        <div style=" width: 75%">
            <div class="mb-3 " style="border-bottom: 2px solid #219653">
                    <div class="">
                        <h3>Address</h3>
                    </div>
            </div>
                <p class="text-dark">When you recycle with us, you're not just being kind to the planet; you're also making a real impact by supporting a cause that matters</p>
        </div>
    </div>
</div>