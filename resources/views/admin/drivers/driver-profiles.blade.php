@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-4 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">Driver Profiles</h1>
    </div>
    <div class="col-md-5 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <form id="searchForm" method="GET" action="{{ route('drivers.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
    <div class="col-md-3 order-sm-3 order-2 col-6 d-flex justify-content-end align-items-center mt-2" >
        <a  href="{{route('drivers.create')}}" class="btn btn-primary mr-2">
                <i class="fas fa-user-plus"></i>
                <span class="hide-xs">Create Driver Profile</span>
        </a>
        <!-- <div class="dropdown dropdown-animated scale-left">
            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                <i class="fas fa-sliders-h"></i> -->
            <!-- <img src="assets/icons/filter-icon.png"> -->
            <!-- <span>Filter</span>
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" type="button">Sort By Lates Funds</button>
                <button class="dropdown-item" type="button">Sort By Higest Funds</button>
            </div>
        </div> -->
    </div>
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column d-none d-sm-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Driver Name</th>
                    <th scope="col" class="text-white">Driver Email</th>
                    <th scope="col" class="text-white">Driver Address</th>
                    <th scope="col" class="text-white">Driver Phone</th>
                    <th scope="col" class="text-white">Vehical</th>
                    <th scope="col" class="text-white">Vehical Number</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($drivers) > 0)
                @foreach($drivers as $driver)
                <tr>
                    <th scope="row">{{$driver->id}}</th>
                    <td>{{$driver->driver_name}}</td>
                    <td>{{$driver->driver_email}}</td>
                    <td>{{$driver->driver_address}}</td>
                    <td>{{$driver->driver_phone}}</td>
                    <td>{{$driver->driver_vehical}}</td>
                    <td>{{$driver->vehical_number_plate}}</td>
                    <td>
                        <!-- <a href="driver-details.html"><i class="fas fa-edit table-view-icon p-5 badge-success-lighter br-100"></i></a> -->
                        <a href="{{ route('drivers.edit', ['id' => $driver->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                        <a href="#" onclick="deleteDriver({{ $driver->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.driver', ['id' => $driver->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
                        <!-- <a href="driver-details.html"><i class="fas fa-external-link-alt table-view-icon p-5 badge-success-lighter br-100"></i></a> -->

                        </td>
                </tr>
                @endforeach
                @else
                    <td>No record found</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="">
     @foreach($drivers as $driver)
    <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
         <div class="d-flex justify-content-between" >
             <p class="text-black"><b>ID:</b> {{$driver->id}}</p>
             <p class="text-black"><i class="far fa-calendar-alt"></i> {{$driver->driver_email}}</p>
         </div>
         <div class="d-flex justify-content-between" >
             <h3 class="text-primary">{{$driver->driver_name}}</h3>
             <h3 class="text-primary">{{$driver->driver_phone}}</h3>
         </div>
         <div class="d-flex justify-content-between" >
             <p class="text-black"><b>Driver Vehical:</b>{{$driver->driver_vehical}}</p>
             <p class="text-black"><b>Driver Number:</b> {{$driver->vehical_number_plate}}</p>
         </div>
         <div class="d-flex justify-content-end align-items-center" >
                <a href="{{ route('drivers.edit', ['id' => $driver->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                <a href="#" onclick="deleteDriver({{ $driver->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                <a href="{{ route('view.driver', ['id' => $driver->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
         </div>
    </div>
    @endforeach
    {{ $drivers->links('vendor.pagination.default') }}
</div>

@if(isset($driver->id))
<form id="delete-form-{{ $driver->id }}" action="{{ route('drivers.destroy', ['id' => $driver->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteDriver(driverId) {
        if (confirm('Are you sure you want to delete this Driver Record?')) {
            document.getElementById('delete-form-' + driverId).submit();
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the search form and search icon elements
        var searchForm = document.getElementById('searchForm');
        var searchIcon = document.getElementById('searchIcon');

        // Add a click event listener to the search icon
        searchIcon.addEventListener('click', function() {
            // Submit the search form when the search icon is clicked
            searchForm.submit();
        });
    });
</script>  
@endsection