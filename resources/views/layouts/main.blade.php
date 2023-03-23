<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    {{-- css online --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    {{-- {{ URL::asset('/') }} --}}
    <link href="{{ URL::asset('/') }}css/style.css" rel="stylesheet">


</head>
<body>
    

    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-6">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class=""></small></a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Caturwati<span class="text-secondary font-weight-normal">Library</span></h1>
                </a>
            </div>
        </div>
    </div>


    @include('partials.navbar')

    
    @yield('container')


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-2 mt-0">
        <div class="row py-2">
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="mb-3">
                    <div class="mb-2">
                    </div>
                </div>
                <div class="mb-3">

                    <div class="mb-2">
                    </div>
                </div>
                <div class="">
                    <div class="mb-2">

                    </div>                
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold text-center">Caturwati Library</h5>
                <p class="font-weight-medium text-center"><i class="fa fa-map-marker-alt mr-2"></i>{{ $profil[0]->alamat }}</p>
                <p class="font-weight-medium text-center"><i class="fa fa-phone-alt mr-2"></i>{{ $profil[0]->telepon }}</p>
                <p class="font-weight-medium text-center"><i class="fa fa-envelope mr-2"></i>{{ $profil[0]->email }}</p>
                <div class="col card-header text-center">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold text-center">Categories</h5>
                <div class="m-n1">
                    <div class="col card-header text-center">
                        {{-- @for ($i = 0; $i < 20; $i++)  --}}
                        @foreach ($categories as $cat)
                            <a href="/books?kategori={{ $cat->name }}" class="btn btn-sm btn-secondary m-1">{{ $cat->name }}</a>
                        @endforeach
                        {{-- @endfor --}}
                   </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer End -->
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center"><a href="#">Caturwati Library</a> &copy; 2023 All Rights Reserved.</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    {{-- js online --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>