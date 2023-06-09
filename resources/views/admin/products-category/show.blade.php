@extends('admin_base')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            Category
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
        </div>
        <div class="card-footer text-muted">
            {{ $category->updated_at }}
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('productCategory.edit', $category->id) }}" class="btn btn-primary m-2">Edit category</a>
        <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#exampleConfirmModal">
            Delete category
        </button>
    </div>
    <!-- Confirm modal -->
    <div class="modal fade" id="exampleConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route('productCategory.delete', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-2">Delete category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    <div class="card side-card">
        <div class="card-body">
            <h3 class="card-title">Created:{{ $category->created_at }}</h3>
            <h3 class="card-title">Updated:{{ $category->updated_at }}</h3>
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
