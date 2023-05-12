<label for="inputGroupFile02" class="form-label mt-3">Upload images</label>
<div class="input-group">
    <input type="file" name="productImages[]" class="form-control" id="inputGroupFile02" accept="image/*" multiple
        required>
    <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div>
@error('productImages.*')
    <div class="alert mt-2 alert-danger text-center alert-dismissible fade show">{{ $message }}</div>
@enderror
<div class="image-area mt-4">
    <div class="row mb-2"id="uploadContainer">
    </div>
</div>
<input type="hidden" id="isDefault" name="isDefault">
