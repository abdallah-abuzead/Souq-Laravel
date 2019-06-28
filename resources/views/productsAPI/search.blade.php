<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<h1 class="text-center" style="margin: 20px">Search</h1>

<form action="/api/products/search" class="form-inline my-2 my-lg-0 custom-control-inline "
      style="margin:30px 400px 30px 500px;" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input class="form-control mr-sm-2" style="width: 300px;"
           name="search" type="search" placeholder="Search by name, price or category" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>