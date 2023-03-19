@extends('layouts.main')

@section('container')


        <div class="container-fluid col-lg-6 mb-3">
            <div class="container py-5 col-8 mb-3">
                <div class="section-title col-md-12">
                    <div class="col-12">
                        <div class="page-header clearfix">
                            <div class="input-group mb-3" style="width: 100%;">
                                <main class="form-registration w-100 m-auto text-center">
                                    <h1 class="h3 mb-3 fw-normal">SILAHKAN REGISTRASI</h1>
                                    <form action="/register" method="post">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                                            <label for="floatingInputGroup1">Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                                            <label for="floatingInputGroup1">Username</label>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com" required value="{{ old('email') }}">
                                            <label for="floatingInputGroup1">email@example.com</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                            <label for="floatingInputGroup1">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">REGISTRASI</button>
                                    </form>
                                    <small class="d-block text-center mt-3">Sudah Registrasi?<a href="/login"> Masuk Sekarang!</a></small>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection