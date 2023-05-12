@extends('admin_base')

@section('content')
    <form enctype="multipart/form-data" class="form-control" method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input value="{{ old('name') }}" class="form-control" name="name" placeholder="Name" />
            <label class="form-label">Name</label>
        </div>
        @error('name')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <textarea id="description" class="form-control" placeholder="description" name="description">{{ old('description') }}</textarea>
            <label for="description">Description</label>
        </div>
        @error('description')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror

        <div class="input-group mb-3">
            <span class="input-group-text">KM</span>
            <div class="form-floating">
                <input type="number" placeholder="Price" value="{{ old('price') }}" class="form-control" name="price"
                    step="0.1" />
                <label class="form-label">Price</label>
            </div>
        </div>
        @error('price')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-3">
            <input class="form-control" type="text" autocomplete="off" placeholder="Category" id="input-category">
            <label for="categories" class="form-label">Category</label>
        </div>
        <input type="hidden" name="categoryId" id="input-category-hiden">
        <ul class="list-group" id="list-category"></ul>
        @error('categoryId')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror

        @include('admin.product.images.upload')

        <div class=" text-center">
            <input class="my-2 btn btn-primary" type="submit" value="Save" />
            <a href="{{ route('product.index') }}" class="btn btn-secondary my-2">Back</a>
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
