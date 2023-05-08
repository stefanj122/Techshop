@extends('admin_base')
@section('page-title')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (session('user'))
        <div>{{ session }}</div>
    @endif
@endsection
@section('content')
    <div class="container horizontal-scrollable">
        <a href="{{ route('product.index') }}">
            <h1>Products:</h1>
        </a>
        <div class='row flex-nowrap text-center' name="horizontal-scrollable">
            @foreach ($products as $product)
                <div class="col-lg-6">
                    <div class="card h-100">
                        <a href="{{ route('product.show', $product->id) }}">
                            @foreach ($product->productImages as $image)
                                @if ($image->isDefault == true)
                                    <img src="{{ asset('storage/product/images/' . $image->name) }}"
                                        class="card-img-top img-thumbnail w-50 mx-auto mt-2" alt="..."
                                        style="max-height: 150px" id="index-images">
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                @if ($product->category)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                @else
                                    <h6 class="card-subtitle mb-2 text-muted">No category</h6>
                                @endif
                                <h5 class="card-title">{{ $product->price }} KM</h5>
                                <p class="card-text">{{ $product->description ? $product->description : 'No description' }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('productCategory.index') }}">
            <h1>Categories:</h1>
        </a>
        <div class='row flex-nowrap text-center' name="horizontal-scrollable">
            @foreach ($categories as $category)
                <div class="col-lg-4">
                    <div class="card" style="height: 90%;">
                        <a href="{{ route('productCategory.show', $category->id) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text">
                                    {{ $category->description ? $category->description : 'No description' }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
