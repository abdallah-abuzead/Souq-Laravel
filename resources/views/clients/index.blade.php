<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    /*table{*/
        /*width: 60%;*/
        /*margin: auto auto;*/
    /*}*/
</style>
<h1 class="text-center">Clients</h1>
<div class="container">
<table class="table table-bordered ">
    <thead class="btn-dark">
    <tr>
        <td>Client Name</td>
        <td>Client Email</td>
        <td>Client Phone</td>
        <td>Control</td>
    </tr>
    </thead>

@foreach($clients as $client)
    <tr>
        <td> {{$client->name}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->phone}}</td>
        <td>
            <a href="/clients/{{$client->id}}" class="btn btn-primary">Details</a>
            <a href="/clients/{{$client->id}}/edit" class="btn btn-success">Edit</a>
            <form action="/clients/{{$client->id}}" method="post" class="custom-control-inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</table>
    <a href="/clients/create" class="btn btn-primary">Create New Product</a>
</div>
