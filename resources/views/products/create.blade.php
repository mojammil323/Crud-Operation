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
            <div class="col-md-7 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-success"> All Product</a>
            </div>
            <div class="col-md-7">
                <div class="card shadow p-4">
                    <h4 class="text-center mb-4">Product Form</h4>
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div class="mb-2">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" value="{{ old('name') }}" class="@error('name') is-invalid @enderror
                             form-control" name="name">
                            @error('name')
                                <p class="inviled-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- SKU -->
                        <div class="mb-2">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" value="{{ old('sku') }}" class="@error('sku') is-invalid @enderror
                            form-control" name="sku">
                            @error('sku')
                                <p class="inviled-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-2">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" value="{{ old('price') }}" class="@error('price') is-invalid @enderror
                            form-control" name="price">
                            @error('price')
                                <p class="inviled-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-2">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" value="{{ old('description') }}" name="description"
                                rows="3"></textarea>
                                  @error('desciption')
                                <p class="inviled-feedback">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-2">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>