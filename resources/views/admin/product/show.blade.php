@extends('admin_base')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            Product
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
        </div>
        <div class="card-footer text-muted">
            {{ $product->updated_at }}
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary m-2">Edit product</a>
        <form method="POST" action="{{ route('product.delete', $product->id) }}">
            @csrf
            @method('DELETE')
            <button href="{{ route('product.delete', $product->id) }}" class="btn btn-danger m-2">Delete product</button>
        </form>
    </div>
@endsection

@section('sidebar')
    <h6>Created:{{ $product->created_at }}</h6>
    <h6>Updated:{{ $product->updated_at }}</h6>
    @if ($product->category)
        <a class="link-dark" href="{{ route('productCategory.show', $product->category->id) }}">
            <h6>Category:{{ $product->category->name }}</h6>
        </a>
    @else
        <h6>Category:No category</h6>
    @endif
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
