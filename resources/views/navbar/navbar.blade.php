<script type="text/javascript">
    <?php include resource_path('js/script.js'); ?>
</script>

<nav class="navbar">

    <div class="navbar-expand-lg navbar-collapse" id="navbarSupportedContent">
        <input type="radio" name="product" class="nav-ratio" id="product"  />
        <label class="nav-item" htmlFor="product">
            <a class="nav-link" href="http://techshop.test/admin/products">Products</a>
        </label>
        <input type="radio" name="category" class="nav-ratio" id="category" />
        <label class="nav-item" forHtml="category">
            <a class="nav-link" href="http://techshop.test/admin/products-category">Categories</a>
        </label>
        <input type="radio" name="disable" class="nav-ratio" id="disable" />
        <label class="nav-item" forHtml="disable">
            <a class="nav-link disabled" href="#">Disabled</a>
        </label>
    </div>
</nav>
