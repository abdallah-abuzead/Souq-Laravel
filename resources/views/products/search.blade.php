<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
<script src="{{asset('js/bootstrap.js')}}"></script>

<h1 class="text-center">Search Result</h1>

<div class="container">
    <table class="table table-bordered ">
        <thead class="btn-dark">
        <tr>
            <td>Product Name</td>
            <td>Product Price</td>
            <td>Product Category ID</td>
            <td>Control</td>
        </tr>
        </thead>

        @foreach($products as $product)
            <tr>
                <td> {{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->cat_id}}</td>
                <td>
                    <a href="/products/{{$product->id}}" class="btn btn-primary">Details</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
