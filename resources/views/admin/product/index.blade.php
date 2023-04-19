@extends('admin_base')
@section('content')
    @foreach ($products as $product)
        <div class="card" style="width: 25rem;">
            <a href="{{ route('product.show', $product->id) }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    @if ($product->category)
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                    @else
                        <h6 class="card-subtitle mb-2 text-muted">No category</h6>
                    @endif
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('product.edit', $product->id) }}"
                        class="btn btn-primary">Edit product</a>
                </div>
            </a>
        </div>
    @endforeach
@endsection

@section('sidebar')
    <h3>Sidebar content</h3>
@endsection
