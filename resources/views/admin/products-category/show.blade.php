<script type="text/javascript">
    <?php include resource_path('js/script.js'); ?>
</script>

<style>
    <?php include resource_path('css/app.css'); ?>
</style>

<?php include resource_path('views/navbar/navbar.blade.php') ?>
@if($category)
<h1>Name: {{ $category->name }}</h1>
<h1>Description: {{ $category->description }}</h1>

<h1>Edit category</h1>
<div class="form-container">
    <form class="form">
        @csrf
        <label class="label">Name
            <input class="input-box" type='text' name="name" value="{{ $category->name }}">
        </label>
        <label class="label">Description
            <input class="input-box" type='text' name="description" value="{{ $category->description }}">
        </label>
    </form>
    <div class="button">
        <button class="btn-submit" onclick="updateCategory({{ $category->id }})">Edit category</button>
    </div>
    <div class="button">
        <button class="btn-submit" onclick="deleteCategory({{ $category->id }})">Delete product</button>
    </div>
</div>
@else
    <div>
        <h1>Category does not exist!</h1>
    </div>
@endif
