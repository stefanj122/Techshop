@extends('admin_base')
@section('content')
    <div class="container text-center">
        <div class="row row-cols-2">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card">
                        <a href="{{ route('productCategory.show', $category->id) }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                @if ($category->description)
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $category->description }}</h6>
                                @else
                                    <h6 class="card-subtitle mb-2 text-muted">No description</h6>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container text-center">
        <a class="btn btn-primary" href="{{ route('productCategory.create') }}">
            Add category
        </a>
    </div>
@endsection

@section('sidebar')
    <h3>Total categories: {{ $categories->total() }}</h3>
@endsection

@section('page-title')
    <div class="pagetitle">
        <h1>Category</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a class="active"
                        href="{{ route('productCategory.index') }}">Category</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
