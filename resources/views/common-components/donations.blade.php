@php
    $role = Auth::user()->role;
@endphp
<div class="row mb-3 bg-primary pt-2 br-5 " style="border-bottom: 2px solid #219653">
    <div class="col-md-6 order-sm-1 order-1 col-8">
        <h1 class="text-white">Donations</h1>
    </div>
    <div class="col-md-4 order-sm-2 order-3 ">
        <div class="input-affix m-b-10">
            <input type="text" class="form-control" placeholder="Search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div>
    </div>
    <div class="col-md-2 order-sm-3 order-2 col-4 ">
        <div class="dropdown dropdown-animated scale-left">
            <button type="button" class="btn btn-default" data-toggle="dropdown">
                <i class="fas fa-sliders-h"></i>
            <!-- <img src="assets/icons/filter-icon.png"> -->
            <span>Filter</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" type="button">Sort By Lates Funds</button>
                <button class="dropdown-item" type="button">Sort By Higest Funds</button>
            </div>
        </div>
    </div>
</div>


 <div class="row flex-column d-none d-sm-block">
    <div class="table-responsive">
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
                    <td><span class="badge badge-pill badge-pending mr-3">Pending</span><a href='{{route("$role.donor-view")}}'><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></a></td>
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
<div class="m-t-20 d-flex justify-content-center ">
<ul class="pagination justify-content-end">
    <li class="page-item previous"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">6</a></li>
    <li class="page-item"><a class="page-link" href="#">7</a></li>
    <li class="page-item"><a class="page-link" href="#">8</a></li>
    <li class="page-item"><a class="page-link" href="#">9</a></li>
    <li class="page-item"><a class="page-link" href="#">10</a></li>
    <li class="page-item next"><a class="page-link" href="#">Next</a></li>
</ul>
</div>
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