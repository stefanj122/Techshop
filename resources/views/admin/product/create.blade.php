@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('product.store') }}">
        @csrf
        <label class="form-label">Name</label>
        <input value="{{ old('name') }}" class="form-control" name="name" />
        @error('name')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"> {{ old('description') }}</textarea>
        @error('description')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <label class="form-label">Price</label>
        <input type="number" value="{{ old('price') }}" class="form-control" name="price" step="0.1" />
        @error('price')
            <div class="alert alert-danger alert-dismissible fade show">{{ $message }}</div>
        @enderror
        <label for="categories" class="form-label">Category</label>
        <select id="categories" class="form-select" name="categoryId" aria-label="Default select example">
            <option value="0" selected>Select category</option>
            @foreach ($categories as $category)
                @if ($category->id == old('categoryId'))
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
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
