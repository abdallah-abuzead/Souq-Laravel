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
<h1 class="text-center">Update Admin</h1>
{{--@if($errors->any())--}}
    {{--@foreach($errors->all() as $error)--}}
        {{--<div class="container alert alert-danger">--}}
            {{--{{$error}}--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}
<form action="/api/admins/{{$admin->id}}" method="post">
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="id" value="{{$admin->id}}">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{$admin->username}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{$admin->email}}" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
    </div>
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" value="{{$admin->fullname}}" class="form-control">
    </div>
    <input type="submit" name="save" value="Save" class="btn btn-primary">
    <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
</form>