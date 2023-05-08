@extends('admin_base')
@section('content')
    <div class="container text-center" id=test>
        <div class="row row-cols-2">
            @foreach ($products as $product)
                <div class="col mt-4">
                    <a href="{{ route('product.show', $product->id) }}">
                        <div class="card h-100">
                            @foreach ($product->productImages as $image)
                                @if ($image->isDefault == true)
                                    <img src="{{ asset('storage/product/images/' . $image->name) }}"
                                        class="card-img-top  w-75 mx-auto mt-2 index-images" alt="..."
                                        style="max-height: 200px">
                                @endif
                            @endforeach
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                @if ($product->category)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                                @else
                                    <h6 class="card-subtitle mb-2 text-muted">No category</h6>
                                @endif
                                <h5 class="card-title">{{ $product->price }} KM</h5>
                                <p class="card-text">
                                    {{ $product->description ? $product->description : 'No description' }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container text-center mt-4">
        <a class="btn btn-primary" href="{{ route('product.create') }}">
            Add product
        </a>
    </div>
    {{--    @include('admin._includes.pagination', ['data' => $products]) --}}
    <div class=" mt-2 text-center d-flex justify-content-center">
        {{ $products->withQueryString()->links() }}
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
    <div class="card side-card">
        <div class="card-body justify-content-center text-center">
            <form class="form mt-4" action="{{ route('product.index', ['search' => 'hp']) }}">
                <label class="form-label fs-5" for="sortBy">Sort by</label>
                <select class="form-select" id="sortBy" name="sortBy" aria-label="Default select example">
                    <option value="id:ASC" @if (request()->sortBy == 'id:ASC') selected @endif>Select order by</option>
                    <option value="created_at:DESC" @if (request()->sortBy == 'created_at:DESC') selected @endif>Latest added</option>
                    <option value="price:DESC" @if (request()->sortBy == 'price:DESC') selected @endif>Price high to low</option>
                    <option value="price:ASC" @if (request()->sortBy == 'price:ASC') selected @endif>Price low to high</option>
                </select>
                <label class="form-label fs-5 mt-2" for="lowPrice">Price</label>
                <div class="row row-cols-4 g-1 justify-content-center ">
                    <div class="col-sm-2">
                        <label for="lowPrice" class="col-form-label">From</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" @if (request()->has('lowPrice')) value="{{ request()->lowPrice }}" @endif
                            name="lowPrice" id="lowPrice" class="form-control" />
                    </div>
                    <div class="col-sm-1">
                        <label for="highPrice" class="col-form-label">To</label>
                    </div>
                    <div class="col-sm-4">

                        <input type="text" @if (request()->has('highPrice')) value="{{ request()->highPrice }}" @endif
                            name="highPrice" id="highPrice" class="form-control" />
                    </div>
                </div>
                <label for="category" class="form-label fs-5 mt-2">Category</label>
                <select class="form-select" id="category" name="category" aria-label="Default select example">
                    <option value="0">Select category</option>
                    @foreach ($categories as $category)
                        @if (request()->has('category') && $category->id == request()->category)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="search" id="search" value="{{ request()->search }}" />
                <button class="btn btn-primary mt-4">Filter</button>
            </form>
        </div>
    </div>
@endsection
