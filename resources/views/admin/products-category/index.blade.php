@extends('admin_base')
@section('content')
    @foreach ($categories as $category)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                @if ($category->description)
                    <h6 class="card-subtitle mb-2 text-muted">{{ $category->description }}</h6>
                @else
                    <h6 class="card-subtitle mb-2 text-muted">No description</h6>
                @endif
                <a href="{{ route('productCategory.show', $category->id) }}" class="card-link">Edit category</a>
                <form action="{{ route('productCategory.delete', $category->id) }}" method="post">
                    <input class="btn btn-primary" type="submit" value="Delete" />
                    @method('delete')
                    @csrf
                </form>
            </div>
        </div>
    @endforeach
@endsection

@section('sidebar')
    <h3>Sidebar content</h3>
@endsection
