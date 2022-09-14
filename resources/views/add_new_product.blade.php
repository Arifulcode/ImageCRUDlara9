<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}


    {{-- <title>ImageCrud</title> --}}
    <title>{{ __('Laravel 9 ImageCrud') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- <h2>Image CRUD laravel9</h2> --}}
    <h2 class="text-center">{{ __('Image CRUD laravel 9') }}</h2>
    <hr>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div style="float:left;">
                            <h2>{{ __('ImageCRUD') }}</h2>
                        </div>
                        <div style="float:right;">
                            {{-- <h2>{{ __('ImageCRUD') }}</h2> --}}
                            <a href="{{ route('all.product') }}"
                                class="btn btn-dark btn-sm ">{{ __('All Products') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('msg'))
                            <p class="btn btn-success">{{ Session::get('msg') }}</p>
                        @endif
                        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    id="name" placeholder="Enter your Product Name">
                            </div>
                            <div class="form-group ">
                                <label for="image">Product Image</label>
                                <input type="file" name="image" class="form-control form-control-sm"
                                    id="image" placeholder="Choose your Product Image">
                            </div>
                            <button type="submit" class="btn btn-dark btn-sm mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>
