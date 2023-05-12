@error('error')
    <div class="alert mt-2 alert-danger text-center">{{ $message }}</div>
@enderror
<label class="form-label mt-2">Current photos:</label>
<div class="row text-center mb-2">
    @foreach ($product->productImages as $image)
        <div class="col-lg-4 product-images">
            <img class="m-2 img-thumbnail create-img" src="{{ asset('storage/product/images/' . $image->name) }}"
                width="400px")>
            <input type="radio" class="isdefault-btn" name="isDefault-radio"value="{{ $image->id }}"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Set default image"
                @if ($image->isDefault == true) checked @endif>
            @if ($image->isDefault == true)
                <span class="checkbox-img" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Default image can't be deleted">
                    <input type="checkbox" class="form-check-input" id="{{ $image->id }}" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Select image to delete" disabled>
                </span>
            @else
                <input type="checkbox" class="checkbox-img form-check-input" id="{{ $image->id }}"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Select image to delete">
            @endif
            {{-- <form method="post" action="{{ route('product.images.delete', $image->id) }}"> --}}
            {{--     @csrf --}}
            {{--     @method('DELETE') --}}
            {{--     <button id="delete" type="submit" class="bi bi-trash-fill delete-btn" data-bs-toggle="tooltip" --}}
            {{--         data-bs-placement="top" title="Delete images"></button> --}}
            {{-- </form> --}}
        </div>
    @endforeach
</div>

<label for="inputGroupFile02" class="form-label mt-3">Upload images</label>
<div class="input-group">
    <input type="file" name="productImages[]" class="form-control" id="inputGroupFile02" accept="image/*" multiple>
    <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div>
@error('productImages.*')
    <div class="alert mt-2 alert-danger text-center">{{ $message }}</div>
@enderror

<div class="container mt-4">
    <div class="row mb-2"id="uploadContainer">
    </div>
</div>
<input type="hidden" id="isDefault" name="isDefault">

@push('delete-input')
    <!-- Confirm modal -->
    <div class="modal fade" id="exampleConfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete selected images?
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <form method="POST" action="{{ route('product.images.delete', $product->id) }}" id="form-deleted"> --}}
                    {{--     @csrf --}}
                    {{--     @method('DELETE') --}}
                    <button class="btn btn-danger m-2">Delete images</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endpush
