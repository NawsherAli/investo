@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">Users Profiles</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <form id="searchForm" method="GET" action="{{ route('user.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
   
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column d-none d-sm-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Name</th>
                    <th scope="col" class="text-white">Email</th>
                    <th scope="col" class="text-white">Password</th>
                    <th scope="col" class="text-white">Phone</th>
                    <th scope="col" class="text-white">Online</th>
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->plan_password}}</td>
                    <td>{{$user->contact}}</td>
                    @if($user->is_online == 'true')
                    <td class="badge badge-pill badge-green">{{$user->is_online}}</td>
                    @else
                    <td class="badge badge-pill badge-red">{{$user->is_online}}</td>
                    @endif
                    @if($user->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$user->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$user->status}}</b></td>
                    @endif
                    <td>
                        <!-- <a href="driver-details.html"><i class="fas fa-edit table-view-icon p-5 badge-success-lighter br-100"></i></a> -->
                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                        <a href="#" onclick="deleteUser({{ $user->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <a href="{{ route('view.user', ['id' => $user->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
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
     @foreach($users as $user)
    <div class="col-12  br-10 border-primary1 pb-2 d-block d-sm-none mb-3">
         <div class="d-flex justify-content-between" >
             <p class="text-black"><b>ID:</b> {{$user->id}}</p>
             <p class="text-black"><i class="far fa-calendar-alt"></i> {{$user->email}}</p>
         </div>
         <div class="d-flex justify-content-between" >
             <h3 class="text-primary">{{$user->name}}</h3>
             <h3 class="text-primary">{{$user->contact}}</h3>
         </div>
         <div class="d-flex justify-content-between" >
             <p class="text-black"><b>is online:</b>{{$user->is_online}}</p>
             <p class="text-black"><b>Status:</b> {{$user->status}}</p>
         </div>
         <div class="d-flex justify-content-end align-items-center" >
                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                <a href="#" onclick="deleteUser({{ $user->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                <a href="{{ route('view.user', ['id' => $user->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a>
         </div>
    </div>
    @endforeach
    {{ $users->links('vendor.pagination.default') }}
</div>

@if(isset($user->id))
<form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this User Record?')) {
            document.getElementById('delete-form-' + userId).submit();
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