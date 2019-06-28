<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    table{
        width: 300px;
        margin: auto auto;
    }
</style>

<div class="container">
    <h1 class="text-center">Details for The Selected Admin</h1>
    <table class="table table-bordered ">
        <tr>
            <td class="btn-danger">Username</td>
            <td>{{$admin->username}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Email</td>
            <td>{{$admin->email}}</td>
        </tr>
        <tr>
            <td class="btn-danger">Full Name</td>
            <td>{{$admin->fullname}}</td>
        </tr>
    </table>
    <a href="/admins" class="btn btn-primary">Back To Admins Page</a>
</div>