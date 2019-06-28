<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<style>
    /*table{*/
        /*width: 60%;*/
        /*margin: auto auto;*/
    /*}*/
</style>
<h1 class="text-center">Admins</h1>
<div class="container">
<table class="table table-bordered ">
    <thead class="btn-dark">
    <tr>
        <td>Username</td>
        <td>Email</td>
        <td>Full Name</td>
        <td>Control</td>
    </tr>
    </thead>

@foreach($admins as $admin)
    <tr>
        <td> {{$admin->username}}</td>
        <td>{{$admin->email}}</td>
        <td>{{$admin->fullname}}</td>
        <td>
            <a href="/admins/{{$admin->id}}" class="btn btn-primary">Details</a>
            <a href="/admins/{{$admin->id}}/edit" class="btn btn-success">Edit</a>
            <form action="/admins/{{$admin->id}}" method="post" class="custom-control-inline">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</table>
    <a href="/admins/create" class="btn btn-primary">Create New Admin</a>
</div>
