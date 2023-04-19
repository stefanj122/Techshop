<title>Categories</title>
<script type="text/javascript">
    <?php include resource_path('js/script.js'); ?>
</script>

<style>
    <?php include resource_path('css/app.css'); ?>
</style>

@include('navbar.navbar')
<table style="border: 1px solid">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td><a href='products-category/{{ $category->id }}'>{{ $category->id }}</a></td>
                <td><a href='products-category/{{ $category->id }}'>{{ $category->name }}</a></td>
                <td><a href='products-category/{{ $category->id }}'>{{ $category->description }}</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<h1>Add category</h1>
<div class="form-container">
    <form class="form">
        @csrf
        <label class="label">Name
            <input class="input-box" type='text' name="name" />
        </label>
        <label class="label">Description
            <input class="input-box" type='text' name="description" />
        </label>
    </form>
    <div class="button">
        <button class="btn-submit" onclick="addCategory();">Submit</button>
    </div>
</div>
{{ $categories->links() }}
