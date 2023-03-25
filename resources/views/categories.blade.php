@extends('layouts.main')

@section('container')
    <div class="container-fluid py-3 pt-0 mb-3">
        <div class="container col-lg-9 pt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Semua Kategori</h4>
                    </div>
                </div>
            </div>
            <div style="justify-content: space-between;">
                <div class="row">
                    @foreach ($categories as $cat)
                        <div class=" position-relative overflow-hidden pt-3 px-3" style="height: 250px; width: 200px;">
                            @if ($cat->cover)
                                <img class="img-preview img-fluid h-100" src="{{ asset('storage/' . $cat->cover) }}" style="object-fit: cover;"
                                    id="frame">
                            @else
                                <img class="img-fluid h-100" src="img/buku1.jpg" style="object-fit: cover;">
                            @endif

                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="/books?kategori={{ $cat->name }}">{{ $cat->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
