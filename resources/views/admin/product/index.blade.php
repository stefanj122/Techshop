@extends('admin_base')
@section('content')
    <div class="container text-center">
        <div class="row row-cols-2">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card" style="height: 90%;">
                        <a href="{{ route('product.show', $product->id) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @if ($product->category)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                @else
                                    <h6 class="card-subtitle mb-2 text-muted">No category</h6>
                                @endif
                                <p class="card-text">{{ $product->description ? $product->description : 'No description' }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container text-center">
        <a class="btn btn-primary" href="{{ route('product.create') }}">
            Add product
        </a>
        <div class="d-flex align-items-center  flex-column mt-3 justify-content-center">
            {{ $products->links() }}
        </div>
    @endsection

    @section('page-title')
        <div class="pagetitle">
            <h1>Products</h1>
            <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a class="active" href="{{ route('product.index') }}">Products</a>
                    </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
    @endsection

    @section('sidebar')
        <h3>Total products: {{ $products->total() }}</h3>
    @endsection
