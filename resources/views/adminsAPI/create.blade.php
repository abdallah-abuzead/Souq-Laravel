<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>
<style>
    form{
        width: 40%;
        margin: auto auto;
    }
</style>
<div class="text-center">
    <h1>Create New Admin</h1>
    <h3>Please Fill in The Following</h3>
</div>
{{--@if($errors->any())--}}
    {{--@foreach($errors->all() as $error)--}}
        {{--<div class="container alert alert-danger">--}}
            {{--{{$error}}--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}
<form action="/api/admins" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="username">Userame</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
    </div>
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" class="form-control">
    </div>
    <input type="submit" name="save" value="Save" class="btn btn-primary">
    <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
</form>