@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PUT')
        <label class="form-label">Name</label>
        <input value="{{ $product->name }}" class="form-control" name="name" />
        <label class="form-label">Description</label>
        <textarea value="{{ $product->description }}" class="form-control" name="description"></textarea>
        <label class="form-label">Price</label>
        <input value="{{ $product->price }}" class="form-control" name="price" />
        <label class="form-label">Category id</label>
        <input value="{{ $product->category->id }}" class="form-control" name="category_id" />
        <input class="btn btn-primary" style="margin-top: 10px;" type="submit" value="Update" />
    </form>
@endsection

@section('sidebar')
    <div class="card" style="width: 15rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            @if ($product->category)
                <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
            @else
                <h6 class="card-subtitle mb-2 text-muted">No category</h6>
            @endif
            @if ($product->description)
                <p class="card-text">{{ $product->description }}</p>
            @else
                <p class="card-text">No description</p>
            @endif
            <form action="{{ route('product.delete', $product->id) }}" method="post">
                <input class="btn btn-primary" type="submit" value="Delete" />
                @method('delete')
                @csrf
            </form>
        </div>
    </div>
@endsection
