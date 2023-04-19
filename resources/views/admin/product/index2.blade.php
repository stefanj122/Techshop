<title>Products</title>
<script type="text/javascript">
    <?php include resource_path('js/script.js'); ?>
</script>

<style>
    <?php include resource_path('css/app.css'); ?>
</style>

@include('navbar.navbar')
<div class="search">
    <input class="input-search" type="text" placeholder="Search products" id="search" />
    <button class="button-search" onclick="searchProducts();">Search</button>
</div>

<div class="products">
    @foreach ($products as $product)
        <div class="product-item">
        <div class="product-test">
            <a class="product-link" href="http://techshop.test/admin/products/{{ $product->id }}">
                <div class="product-show">
                    <h4>Name: {{ $product->name }}</h4>
                </div>
                <div class="product-show">
                    <h4>Description: {{ $product->description }}</h4>
                </div>
                <div class="product-show">
                    <h4>Price: {{ $product->price }}</h4>
                </div>
            </a>
            <a class="product-link" href="http://techshop.test/admin/products-category/{{ $product->category->id }}">
                <div class="product-show">
                    <h4>Category: {{ $product->category->name }}</h4>
                </div>
            </a>
        </div>
        </div>
    @endforeach
</div>

<h1>Add product</h1>
<div class="form-container">
    <form class="form">
        @csrf
        <label class="label">Name
            <input class="input-box" type='text' name="name" id="name" />
        </label>
        <label class="label">Description
            <input class="input-box" type='text' name="description" id="description" />
        </label>
        <label class="label">Price
            <input class="input-box" type='text' name="price" />
        </label>
        <label class="label">Category id
            <input class="input-box" type='text' name="categoryId" />
        </label>
    </form>
    <div class="button">
        <button class="btn-submit" onclick="test();">Submit</button>
    </div>
</div>
@include(' pagination.pagination')
