@extends('admin_base')

@section('content')
    <form class="form-control" enctype="multipart/form-data" method="POST" action="{{ route('product.images.store', $id) }}">
        @csrf
        @method('POST')
        <label for="inputGroupFile02" class="form-label mt-3">Upload images</label>
        <div class="input-group">
            <input type="file" name="productImages[]" class="form-control" id="inputGroupFile02" accept="image/*" multiple
                required>
            <label class="input-group-text" for="inputGroupFile02">Uploa</label>
        </div>
        <div class="image-area mt-4">
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
