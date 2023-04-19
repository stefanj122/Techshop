@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{route('product.store')}}">
        @csrf
        <label class="form-label">Name</label>
        <input class="form-control" name="name"/>
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
        <label class="form-label">Price</label>
        <input class="form-control" name="price"/>
        <label class="form-label">Category id</label>
        <input class="form-control" name="categoryId"/>
        <input class="btn btn-primary" style="margin-top: 10px;" type="submit" value="Save"/>
    </form>
@endsection
