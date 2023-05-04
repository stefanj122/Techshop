@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('productCategory.store') }}">
        @csrf
        <label class="form-label" for="name">Name</label>
        <input value="{{ old('name') }}" class="form-control" id="name" name="name" />
        @error('name')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description"> {{ old('email') }}</textarea>
        @error('description')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <div class=" text-center">
            <input class="btn btn-primary mt-4" type="submit" value="Save" />
            <a class="btn btn-danger mt-4" href="{{ route('productCategory.index') }}">Back</a>
        </div>
    </form>
@endsection

@section('page-title')
    <div class="pagetitle">
        <h1>Category</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('productCategory.index') }}">Category</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
