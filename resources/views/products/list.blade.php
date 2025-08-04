<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Crud System</a>

            <!-- Toggle button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">

                <!-- Centered Search Bar -->
                <form class="d-flex mx-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search here" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

                <!-- Right-side Links -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <div class="container mt-5">
        <div class="row justify-content-center">

            @if (Session::has('success'))
                <div class="col-md-8">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            <div class="col-md-8 d-flex justify-content-end">
                <a href="{{ route('products.create') }}" class="btn btn-success">Creat Product</a>
            </div>
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <div class="card-header bg-dark">
                        <h4 class="text-center mb-4  text-white">Products</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>

                            @if($products->isNotEmpty())
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if($product->image != "")
                                                <img width="50" src="{{ asset('uploads/products/' . $product->image) }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M,Y') }}</td>
                                        <td>
                                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ 'delete/' . $product->id}}" class="btn btn-danger">Delete</a>

                                        </td>



                                    </tr>

                                @endforeach


                            @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>