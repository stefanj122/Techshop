@extends('admin_base')
@section('page-title')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (session('user'))
        <div>{{ session }}</div>
    @endif
@endsection
@section('content')
    <h1>Thanks for wisiting my website!!!</h1>
@endsection
