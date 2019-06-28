<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>
<style>
    form{
        width: 40%;
        margin: auto auto;
    }
</style>
<dev class="text-center">
    <h1>Create New Category</h1>
    <h3>Please Fill in The Following</h3>
</dev>
{{--@if($errors->any())--}}
    {{--@foreach($errors->all() as $error)--}}
        {{--<div class="container alert alert-danger">--}}
            {{--{{$error}}--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--@endif--}}
<form action="/api/categories" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc" class="form-control">
    </div>
    <input type="submit" name="save" value="Save" class="btn btn-primary">
    <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
</form>