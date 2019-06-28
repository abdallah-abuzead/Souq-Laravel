<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 1000px;
        margin: auto auto;
    }
</style>

<div class="container">
    <h1 class="text-center">Details for The Selected Product</h1>
    <table class="table table-bordered ">
        <tr>
            <td class="btn-danger">Name</td>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Price</td>
            <td>{{$product->price}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Category ID</td>
            <td>{{$product->cat_id}}</td>
        </tr>
    </table>
    <a href="/products" class="btn btn-primary">Back To Products Page</a>
</div>