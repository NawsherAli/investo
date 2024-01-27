@extends('admin.layouts.layout')
@section('contents')

<div class="row mb-3">
    <div class="col-md-6 order-sm-1 order-1 col-6 mt-2" >
        <h1 class="title-responsive">All Tasks</h1>
    </div>
    <div class="col-md-6 order-sm-2 order-3 d-flex justify-content-end align-items-center mt-2" >
        <!-- <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <i class="suffix-icon anticon anticon-search"></i>
        </div> -->
        <form id="searchForm" method="GET" action="{{ route('task.search') }}">
            <div class="input-affix  ">
            <input type="text" class="form-control" placeholder="Search task by title" name="search">
                <i class="suffix-icon anticon anticon-search" id="searchIcon"></i>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Search</button> -->
        </form>
    </div>
   
</div>
<div class="pb-3 " style="border-top:2px solid #219653;"></div>
<div class="row flex-column  d-block">
    <div class="table-responsive">
        <table class="table table-sm text-center">
            <thead>
                <tr class="bg-primary">
                    <th scope="col" class="text-white">ID</th>
                    <th scope="col" class="text-white">Titlt</th>
                    <th scope="col" class="text-white">Description</th>
                    <th scope="col" class="text-white">link</th>
                    <!-- <th scope="col" class="text-white">amount</th> -->
                    <th scope="col" class="text-white">Status</th>
                    <th scope="col" class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($tasks) > 0)
                @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->link}}</td>
                    @if($task->status == 'active')
                    <td><b class="badge badge-pill badge-green">{{$task->status}}</b></td>
                    @else
                   <td><b class="badge badge-pill badge-red">{{$task->status}}</b></td>
                    @endif
                    <td>
                        <!-- <a href="driver-details.html"><i class="fas fa-edit table-view-icon p-5 badge-success-lighter br-100"></i></a> -->
                        <a href="{{ route('task.edit', ['id' => $task->id]) }}" class="badge badge-pill badge-blue"><i class="fas fa-edit    br-100"></i></a>
                        <a href="#" onclick="deleteTask({{ $task->id }})" class="badge badge-pill badge-red"><i class="fas fa-trash-alt   br-100"></i></a>
                        <!-- <a href="{{ route('view.user', ['id' => $task->id]) }}" class="badge badge-pill badge-green"><i class="fas fa-external-link-alt    br-100"></i></a> -->
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
    
    {{ $tasks->links('vendor.pagination.default') }}
</div>

@if(isset($task->id))
<form id="delete-form-{{$task->id}}" action="{{ route('task.destroy', ['id' => $task->id]) }}" method="post" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endif
<script>
    function deleteTask(taskId) {
        if (confirm('Are you sure you want to delete this Task Record?')) {
            document.getElementById('delete-form-' + taskId).submit();
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