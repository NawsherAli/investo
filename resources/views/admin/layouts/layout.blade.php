@include('common-components.header')
@include('common-components.top-nav')
@include('common-components.admin-side-nav')

<!-- Page Container START -->
    <div class="page-container">
<!-- Content Wrapper START -->
        <div class="main-content">
        	<div class="container">
			@if(session('error'))
			    <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
			        <p class="text-red-700">{{ session('error') }}</p>
			    </div>
			@endif
			@if(session('success'))
			    <div id="successMessage" class="alert alert-success">
			        {{ session('success') }}
			    </div>
			@endif
			@if($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
            @yield('contents')
        </div>
<!-- Content Wrapper END -->
    </div>
<!-- Page Container END -->
@include('common-components.footer')