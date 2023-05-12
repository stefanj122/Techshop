@extends('admin_base')

@section('content')
    <form id="form-deleted" enctype="multipart/form-data" class="form-control" method="POST"
        action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <input value="{{ $product->name }}" class="form-control" name="name" />
        @error('name')
            <div class="alert mt-2 alert-danger text-center alert-dismissible fade show">{{ $message }}</div>
        @enderror

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
        @error('description')
            <div class="alert mt-2 alert-danger text-center alert-dismissible fade show">{{ $message }}</div>
        @enderror

        <label class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text">KM</span>
            <input type="number" step="0.1" value="{{ $product->price }}" class="form-control" name="price" />
        </div>
        @error('price')
            <div class="alert mt-2 alert-dismissible fade show alert-danger text-center">{{ $message }}</div>
        @enderror

        <label class="form-label">Category</label>
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option disabled selected>Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($product->category && $category->id == $product->category->id) selected @endif>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-dismissible fade show mt-2 alert-danger text-center">{{ $message }}</div>
        @enderror

        @include('admin.product.images.edit')

        <div class=" text-center">
            <input class="btn btn-primary my-2" type="submit" value="Update" />
            {{-- <button type="button" class="btn btn-danger my-2" data-bs-toggle="modal" data-bs-target="#exampleConfirmModal"> --}}
            {{--     Delete selected images --}}
            {{-- </button> --}}
            <a class="my-2 btn btn-secondary" href="{{ route('product.show', $product->id) }}">Back</a>
        </div>
        @stack('delete-input')
    </form>
@endsection

@section('sidebar')
    <div class="card side-card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            @if ($product->category)
                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
            @else
                <h6 class="card-subtitle mb-2 text-muted">No category</h6>
            @endif
            @if ($product->description)
                <p class="card-text">{{ $product->description }}</p>
            @else
                <p class="card-text">No description</p>
            @endif
            <form action="{{ route('product.delete', $product->id) }}" method="post">
                <input class="btn btn-primary" type="submit" value="Delete" />
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('page-title')
    <div class="pagetitle">
        <h1>Products</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">Products</a></li>
                <li class="breadcrumb-item active"><a class="active"
                        href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
