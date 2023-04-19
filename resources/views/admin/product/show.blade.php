<script type="text/javascript">
    <?php include resource_path('js/script.js'); ?>
</script>

<style>
    <?php include resource_path('css/app.css'); ?>
</style>

<?php include resource_path('views/navbar/navbar.blade.php'); ?>
@if ($product)
    <div class="product">
        <h1>Name: {{ $product->name }}</h1>
        <h1>Description: {{ $product->description }}</h1>
        <h1>Price: {{ $product->price }}</h1>
        <h1>Category: {{ $product->category->name }}</h1>
    </div>

<h1>Edit product</h1>
<div class="form-container">
    <form class="form">
        @csrf
        <label class="label">Name
            <input class="input-box" type='text' name="name" value="{{ $product->name }}" />
        </label>
        <label class="label">Description
            <input class="input-box" type='text' name="description" value="{{ $product->description }}" />
        </label>
        <label class="label">Price
            <input class="input-box" type='text' name="price" value="{{ $product->price }}" />
        </label>
        <label class="label">Category id
            <input class="input-box" type='text' name="category_id" value="{{ $product->category_id }}" />
        </label>
    </form>
    <div class="button">
        <button class="btn-submit" onclick="editProduct({{ $product->id }})">Edit product</button>
    </div>
    <div class="button">
        <button class="btn-submit" onclick="deleteProduct({{ $product->id }})">Delete product</button>
    </div>
</div>
@else
    <div>
        <h1>Product does not exist!</h1>
    </div>
@endif
