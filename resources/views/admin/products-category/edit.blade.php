@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('productCategory.update', $category->id) }}">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <input value="{{ $category->name }}" class="form-control" name="name" />
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
        <div class=" text-center">
            <input class="btn btn-primary" style="margin-top: 10px;" type="submit" value="Update" />
        </div>
    </form>
@endsection

@section('sidebar')
    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            @if ($category->description)
                <p class="card-text">{{ $category->description }}</p>
            @else
                <p class="card-text">No description</p>
            @endif
            <form action="{{ route('productCategory.delete', $category->id) }}" method="post">
                <input class="btn btn-primary" type="submit" value="Delete" />
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('page-title')
    <div class="pagetitle">
        <h1>Category</h1>
        <i class="bi bi-caret-left-fill toggle-right-btn move-right-btn"></i>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('productCategory.index') }}">Category</a></li>
                <li class="breadcrumb-item active"><a class="active"
                        href="{{ route('productCategory.show', $category->id) }}">{{ $category->name }}</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
@endsection
