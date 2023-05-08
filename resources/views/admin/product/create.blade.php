@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('product.store') }}">
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
            {{-- <select id="categories" class="form-select" name="categoryId" aria-label="Default select example"> --}}
            {{--     <option value="0" selected>Select category</option> --}}
            {{--     @foreach ($categories as $category) --}}
            {{--         @if ($category->id == old('categoryId')) --}}
            {{--             <option selected value="{{ $category->id }}">{{ $category->name }}</option> --}}
            {{--         @else --}}
            {{--             <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
            {{--         @endif --}}
            {{--     @endforeach --}}
            {{-- </select> --}}
            <input class="form-control" type="text" autocomplete="off" placeholder="Category" id="input-category">
            <label for="categories" class="form-label">Category</label>
        </div>
        <input type="hidden" name="categoryId" id="input-category-hiden">
        <ul class="list-group" id="list-category"></ul>
        @error('categoryId')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <div class=" text-center">
            <input class="mt-4 btn btn-primary" type="submit" value="Next" />
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
