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
<h1 class="text-center">Update Category</h1>

<form action="/api/categories/{{$cat->id}}" method="post">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$cat->id}}">
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" value="{{$cat->name}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc" value="{{$cat->desc}}" class="form-control">
    </div>
    <input type="submit" name="save" value="Save" class="btn btn-primary">
    <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
</form>