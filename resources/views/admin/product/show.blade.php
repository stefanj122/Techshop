@extends('admin_base')
@section('content')
    <div class="card text-center mx-auto" style="width: 70%">
        <div class="card-header">
            Product
        </div>
        <div id="carouselExampleFade" class="carousel slide carousel-fade w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    @foreach ($product->productImages as $image)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/product/images/' . $image->name) }}" class="d-block w-100 "
                                    alt="...">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('storage/product/images/' . $image->name) }}" class="d-block w-100 "
                                    alt="...">
                            </div>
                        @endif
                    @endforeach
                </a>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <h5 class="card-title">{{ $product->price }} KM</h5>
        </div>
        <div class="card-footer text-muted">
            {{ $product->updated_at }}
        </div>
    </div>
    <div class="d-flex text-center justify-content-center">
        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary m-2">Edit product</a>
        <form method="POST" action="{{ route('product.delete', $product->id) }}">
            @csrf
            @method('DELETE')
            <button href="{{ route('product.delete', $product->id) }}" class="btn btn-danger m-2">Delete
                product</button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"style="min-width:70%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Total images: {{ count($product->productImages) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($product->productImages as $image)
                                @if ($loop->first)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/product/images/' . $image->name) }}"
                                            class="d-block mx-auto w-100 modal-img" alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/product/images/' . $image->name) }}"
                                            class="d-block mx-auto w-100 modal-img" alt="...">
                                    </div>
                                @endif
                            @endforeach
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <div class="card side-card">
        <div class="card-body">
            <h3 class="card-text mt-4">Created:{{ $product->created_at }}</h3>
            <h3 class="card-text mt-4">Updated:{{ $product->updated_at }}</h3>
            @if ($product->category)
                <a class="link-dark" href="{{ route('productCategory.show', $product->category->id) }}">
                    <h3 class="card-text mt-4">Category:{{ $product->category->name }}</h3>
                </a>
            @else
                <h3 class="card-text mt-4">Category:No category</h3>
            @endif
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
