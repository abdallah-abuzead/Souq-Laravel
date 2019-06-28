<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 40%;
        margin: auto auto;
    }
</style>

<dev class="container">
<table class="table table-bordered ">
    <thead class="btn-dark">
    <tr>
        <td>Category Name</td>
        <td>Category Description</td>
        <td>Control</td>
    </tr>
    </thead>

@foreach($cats as $cat)
    <tr>
        <td> {{$cat->name}}</td>
        <td>{{$cat->desc}}</td>
        <td>
            <a href="/categories/{{$cat->id}}" class="btn btn-primary">Details</a>
            <a href="/categories/{{$cat->id}}/edit" class="btn btn-success">Edit</a>
            <form action="/categories/{{$cat->id}}" method="post" class="custom-control-inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</table>
</dev>
<a href="/categories/create" class="btn btn-primary">Create New Category</a>