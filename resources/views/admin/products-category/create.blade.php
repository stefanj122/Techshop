@extends('admin_base')

@section('content')
    <form class="form-control" method="POST" action="{{route('productCategory.store')}}">
        @csrf
        <label class="form-label">Name</label>
        <input class="form-control" name="name"/>
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
        <input class="btn btn-primary" style="margin-top: 10px;" type="submit" value="Save"/>
    </form>
@endsection
