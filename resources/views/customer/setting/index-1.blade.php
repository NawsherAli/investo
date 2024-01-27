@extends('customer.layouts.layout')
@section('contents')

<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<div class="container">
    <header>
        <h1>Change Profile</h1>
    </header>
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


@endsection