<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 40%;
        margin-top: 30px;
    }
</style>

<h1 class="text-center" style="margin: 30px 0">Products</h1>

<form action="/products/search" class="form-inline my-2 my-lg-0 custom-control-inline "
      style="margin:30px 400px 30px 500px;" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input class="form-control mr-sm-2" style="width: 300px;"
           name="search" type="search" placeholder="Search by name, price or category" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<div class="container">
<table class="table table-bordered ">
    <thead class="btn-dark">
    <tr>
        <td>Product Name</td>
        <td>Product Price</td>
        <td>Product Category ID</td>
        <td>Control</td>
    </tr>
    </thead>

@foreach($products as $product)
    <tr>
        <td> {{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->cat_id}}</td>
        <td>
            <a href="/products/{{$product->id}}" class="btn btn-primary">Details</a>
            <a href="/products/{{$product->id}}/edit" class="btn btn-success">Edit</a>
            <form action="/products/{{$product->id}}" method="post" class="custom-control-inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</table>
    <a href="/products/create" class="btn btn-primary">Create New Product</a>
</div>
