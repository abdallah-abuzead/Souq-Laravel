<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>
<style>
    form{
        width: 40%;
        margin: auto auto;
    }
    h1{
        margin:30px;
    }
</style>
<h1 class="text-center">Update Product</h1>

<form action="/api/products/{{$product->id}}" method="post">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name" value="{{$product->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="category">Category ID</label>
        <input type="text" name="category" id="category" value="{{$product->cat_id}}" class="form-control">
    </div>
    <input type="submit" name="save" value="Save" class="btn btn-primary">
    <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
</form>
<form action="/api/products/{{$product->id}}" method="post" class="text-center">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete" class="btn btn-danger">
</form>