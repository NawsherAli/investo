@extends('customer.layouts.layout')
@section('contents')
<div class="row mb-3 bg-primary br-10" style="border-bottom: 2px solid #219653">
    <div class="col-md-12 order-sm-1 order-1 col-8 ">
        <h1 class="text-white title-responsive">Pickup Request</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Contact & Pickup Information &nbsp;</h3>
   </div>
</div>
<form>
    <div class="form-row">
        <div class="form-group col-md-8">
            <div class="d-flex justify-content-between">
                <label for="driver-name " class="text-primary">Pickup Location </label>
                <button type="button" class="" data-container="body" data-toggle="popover" data-placement="left" data-content="If you want to call the pickup for someone else enter the address otherwise your default address will be used" style="background-color: #fff; border: none"><img src="../assets/icons/info.png"></button>
            </div>
            
           <!--  <i style="width: 40px; height:40px; border-radius: 100%; background-color: red">!</i> -->
            
            <input type="text" class="form-control" id="driver-name" placeholder="Enter Pickup Location" name="driver-name">
        </div>
        <div class="form-group col-md-4">
            <label for="driver-email" class="text-primary">Pickup Date</label>
            <input type="date" class="form-control" id="driver-email" placeholder="Enter Driver Email" name="driver-email">
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-md-8">
            <div class="d-flex justify-content-between">
                <label for="driver-name " class="text-primary">Pickup Location </label>
                <button type="button" class="" data-container="body" data-toggle="popover" data-placement="left" data-content="If you want to call the pickup for someone else enter the phone number for contacting the person otherwise your number will be  used" style="background-color: #fff; border: none"> <img src="../assets/icons/info.png"></button>
            </div>
            <input type="number" class="form-control" id="driver-phone" placeholder="Enter Contact Number" name="driver-phone">
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Type of Services &nbsp;</h3>
   </div>
</div>


 <div class="form-row">
    <div class="form-group col-md-3 ">
        <div class="radio">
            <input id="radio1" name="role" type="radio" checked="">
            <label for="radio1">Resident</label>
         </div>
    </div>
    <div class="form-group col-md-3 ">
        <div class="radio">
            <input id="radio2" name="role" type="radio" checked="">
            <label for="radio2">Condo</label>
         </div>
    </div>
    <div class="form-group col-md-3 ">
        <div class="radio">
            <input id="radio3" name="role" type="radio" checked="">
            <label for="radio3">Commercial</label>
         </div>
    </div>
 </div>


 <div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Refundable Items &nbsp;</h3>
   </div>
</div>
<div class="row mb-3 p-3">
    <div class="col-md-12 bg-primary-light br-5 p-2">
        <div class="d-flex align-items-center p">
            <img src="../assets/icons/exclimation.png">
            <h5 class=" pl-1 pt-2 text-primary">How to pack your items</h5>
        </div>
        <div class="d-flex align-items-center p">
            <!-- <img src="../assets/icons/exclimation.png"> -->

            <p class="pl-5 text-dark">All glass items are to be placed in boxes and all plastic items are to be placed in bags.</p>
        </div>
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="driver-name " class="text-primary">Number Of Bags</label>
        <input type="text" class="form-control" id="driver-name" placeholder="Enter Numbers of Bags" name="driver-name">
    </div>
    <div class="form-group col-md-6">
        <label for="driver-email" class="text-primary">Number Of Boxes</label>
        <input type="text" class="form-control" id="driver-email" placeholder="Enter Number Of Boxes" name="driver-email">
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-6">
        <label for="driver-phone" class="text-primary">Request Number Of Boxes</label>
        <input type="number" class="form-control" id="driver-phone" placeholder="Enter Required Number of Boxes" name="driver-phone">
    </div>

    <div class="form-group col-md-6 bg-primary-light br-5">
        <div class="d-flex align-items-center p">
            <img src="../assets/icons/exclimation.png">
            <h5 class=" pl-1 pt-2 text-primary">Don’t Have A Box?</h5>
        </div>
        <div class="d-flex align-items-center p">
            <!-- <img src="../assets/icons/exclimation.png"> -->

            <p class="pl-5 text-dark">Request the amount of boxes that you need and our driver will come with the boxes.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Clothes &nbsp;</h3>
   </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="driver-name " class="text-primary">Number Of Bags</label>
        <input type="text" class="form-control" id="driver-name" placeholder="Enter Numbers of Bags" name="driver-name">
    </div>
    <div class="form-group col-md-6">
        <label for="driver-email" class="text-primary">Number Of Boxes</label>
        <input type="text" class="form-control" id="driver-email" placeholder="Enter Number Of Boxes" name="driver-email">
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-6">
        <label for="driver-phone" class="text-primary">Request Number Of Boxes</label>
        <input type="number" class="form-control" id="driver-phone" placeholder="Enter Required Number of Boxes" name="driver-phone">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Electronics &nbsp;</h3>
   </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="driver-name " class="text-primary">Number Of Bags</label>
        <input type="text" class="form-control" id="driver-name" placeholder="Enter Numbers of Bags" name="driver-name">
    </div>
    <div class="form-group col-md-6">
        <label for="driver-email" class="text-primary">Number Of Boxes</label>
        <input type="text" class="form-control" id="driver-email" placeholder="Enter Number Of Boxes" name="driver-email">
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-6">
        <label for="driver-phone" class="text-primary">Request Number Of Boxes</label>
        <input type="number" class="form-control" id="driver-phone" placeholder="Enter Required Number of Boxes" name="driver-phone">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Select Payment Options</h3>
   </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3 ">
        <div class="radio">
            <input id="radio4" name="role" type="radio" checked="">
            <label for="radio4">Cashout</label>
         </div>
    </div>
    <div class="form-group col-md-3 ">
        <div class="radio">
            <input id="radio5" name="role" type="radio" checked="">
            <label for="radio5">Donate</label>
         </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <h3 class="title-with-line title-responsive">Select Charity &nbsp;</h3>
   </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="driver-vehical" class="text-primary">Charity Type</label>
        <select id="driver-vehical" class="form-control" name="driver-vehical">
            <option selected>Select Charity Type</option>
            <option>Abc</option>
            <option>Xyz</option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="driver-vehical" class="text-primary">Organization Name</label>
        <select id="driver-vehical" class="form-control" name="driver-vehical">
            <option selected>Select Charity Organization</option>
            <option>Abc</option>
            <option>Xyz</option>
        </select>
    </div>
</div>        
<div class="form-row">
    <div class="form-group col-md-6 bg-primary-light br-5">
        <div class="d-flex align-items-center p">
            <img src="../assets/icons/exclimation.png">
            <h5 class=" pl-1 pt-2 text-primary">Notice</h5>
        </div>
        <div class="d-flex align-items-center p">
            <!-- <img src="../assets/icons/exclimation.png"> -->

            <p class="pl-5 text-dark">if you have larg items or large size electronics please call for a special request</p>
        </div>
    </div>
    <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
        <button class="btn  border-primary1" style="width: 200px">Cancel</button>
    </div>
    <div class="form-group col-md-3 col-6  d-flex align-items-end justify-content-end">
        <button class="btn  btn-primary"  style="width: 200px">Create</button>
    </div>
</div>
@endsection