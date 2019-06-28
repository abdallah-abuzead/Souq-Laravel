<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 1000px;
        margin: auto auto;
    }
</style>

<div class="container">
    <h1 class="text-center">Details for The Selected Clients</h1>
    <table class="table table-bordered ">
        <tr>
            <td class="btn-danger">Name</td>
            <td>{{$client->name}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Email</td>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Phone</td>
            <td>{{$client->phone}}</td>
        </tr>
    </table>
    <a href="/clients" class="btn btn-primary">Back To Clients Page</a>
</div>