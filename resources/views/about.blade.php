@extends('layouts.main')

@section('container')
    
<div class="container-fluid py-3 pt-0 mb-3">
    <div class="container col-lg-6 pt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase text-center font-weight-bold">Tentang Kami</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <h5 class="text-uppercase font-weight-bold">Caturwati Library</h5>
                        <p class="mb-4">{{ $deskripsi }}</p>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                <h5 class="font-weight-bold mb-0">Alamat</h5>
                            </div>
                            <p class="m-0"></i>{{ $alamat }}</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-envelope-open text-primary mr-2"></i>
                                <h5 class="font-weight-bold mb-0">Email</h5>
                            </div>
                            <p class="m-0">{{ $email }}</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-phone-alt text-primary mr-2"></i>
                                <h5 class="font-weight-bold mb-0">Telepon</h5>
                            </div>
                            <p class="m-0">{{ $telepon }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection