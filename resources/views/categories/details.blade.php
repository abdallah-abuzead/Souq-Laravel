<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 1000px;
        margin: auto auto;
    }
</style>

<div class="container">
    <h1 class="text-center">Details for The Selected Category</h1>
    <table class="table table-bordered ">
        <tr>
            <td class="btn-danger">Name</td>
            <td>{{$cat->name}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Description</td>
            <td>{{$cat->desc}}</td>
        </tr>
    </table>
    <a href="/categories" class="btn btn-primary">Back To Categories Page</a>
</div>