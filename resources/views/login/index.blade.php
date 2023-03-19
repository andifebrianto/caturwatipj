@extends('layouts.main')

@section('container')


        <div class="container-fluid col-lg-6 mb-3">
            <div class="container py-5 col-8 mb-3">
                <div class="section-title col-md-12">
                    <div class="col-12">
                        <div class="page-header clearfix">
                            <div class="input-group mb-3" style="width: 100%;">

                                @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <main class="form-signin w-100 m-auto text-center">
                                    <h1 class="h3 mb-3 fw-normal">SILAHKAN LOGIN</h1>
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="floatingInput" placeholder="email@example.com" autofocus required value="{{ old('email') }}">
                                            <label for="floatingInputGroup1">Email Address</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control rounded-bottom" id="floatingPassword" placeholder="Password" required>
                                            <label for="floatingInputGroup1">Password</label>
                                        </div>
                                        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">LOGIN</button>
                                    </form>
                                    <small class="d-block text-center mt-3">Belum Registrasi?<a href="/register"> Registrasi Sekarang!</a></small>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection