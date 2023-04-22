@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('product.store') }}">
        @csrf
        <label class="form-label">Name</label>
        <input class="form-control" name="name" />
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label class="form-label">Price</label>
        <input class="form-control" name="price" />
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label class="form-label">Category</label>
        <select class="form-select" name="categoryId" aria-label="Default select example">
            <option value="0" selected>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <div class=" text-center">
            <input class="mt-4 btn btn-primary" type="submit" value="Save" />
        </div>
    </form>
@endsection

@section('page-title')
    <div class="pagetitle">
        <h1>Products</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Products</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
