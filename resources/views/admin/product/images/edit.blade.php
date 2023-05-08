@extends('admin_base')

@section('content')
    <h2>Current photos:</h2>
    <div class="row text-center mb-2">
        @foreach ($product->productImages as $image)
            <div class="col-lg-4 product-images">
                <img class="mx-2 img-thumbnail" src="{{ asset('storage/product/images/' . $image->name) }}" width="400px")>
                <input type="radio" class="isdefault-btn" name="isDefault-radio"value="{{ $image->id }}"
                    @if ($image->isDefault == true) checked @endif>
                <form method="post" action="{{ route('product.images.delete', $image->id) }}">
                    @csrf
                    @method('DELETE')
                    <button id="delete" type="submit" class="bi bi-trash-fill delete-btn" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Delete images"></button>
                </form>
            </div>
        @endforeach
    </div>
    <form class="form-control" enctype="multipart/form-data" method="POST"
        action="{{ route('product.images.update', $product->id) }}">
        @csrf
        @method('PUT')
        <label for="inputGroupFile02" class="form-label mt-3">Upload images</label>
        <div class="input-group">
            <input type="file" name="productImages[]" class="form-control" id="inputGroupFile02" accept="image/*"
                multiple>
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <div class="container mt-4">
            <div class="row mb-2"id="uploadContainer">
            </div>
        </div>
        <input type="hidden" id="isDefault" name="isDefault">
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
                <li class="breadcrumb-item active">Images</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
