@extends('partials.header')
    @section('content')
    <div class="w-100 p-3">
        <!-- <div class="d-flex justify-content-between"> -->
            <div class="div">
                <h2>Manage User Role</h2>
            </div>
                
            <div class="d-flex justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item ">User Account</li>
                        <li class="breadcrumb-item ">User Role</li>
                    </ol>
                </nav>
                <a href="{{ route('user-role.create') }}"class="btn btn-success">Add</a>
            </div>
    </div>        
    @endsection