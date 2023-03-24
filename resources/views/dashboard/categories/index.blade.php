@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid col-lg-9 mb-3 py-4">
        {{-- <div class="container py-4 col-12 mb-3"> --}}
        <div class="section-title col-md-12 mb-0">
            {{-- <div class="col-12"> --}}
            {{-- <div class="page-header clearfix"> --}}
            {{-- <div class="wrapper"> --}}
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-12"> --}}
                    <div class="page-header">
                        <a href="/dashboard/categories/create" class="btn btn-primary font-weight-bold mb-3 ">TAMBAH KATEGORI</a>

                        {{-- <button type="button" class="btn btn-primary font-weight-bold mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">TAMBAH KATEGORI</button> --}}


                        @if ($categories->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center text-uppercase">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kategori</th>
                                            <th>Cover</th>
                                            <th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $cat)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $cat->name }}</td>
                                                <td>
                                                    @if ($cat->cover)
                                                        <img class="img-preview img-fluid col-sm-5"
                                                            src="{{ asset('storage/' . $cat->cover) }}">
                                                    @else
                                                        <img class="img-preview img-fluid col-sm-5">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/dashboard/categories/{{ $cat->slug }}/edit"
                                                        class="badge badge-warning">Edit </a>
                                                    <form action="/dashboard/categories/{{ $cat->slug }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onClick="return confirm('Hapus data?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="col-md-12 text-center">
                                <h4>KATEGORI TIDAK ADA!</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">


                        <div class="form-floating">
                            {{-- <label><strong>Judul Buku</strong></label> --}}
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror rounded-top"
                                placeholder="Masukkan name" autofocus id="name" value="{{ old('name') }}" required>
                            <label for="name"><strong>KATEGORI</strong></label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-floating">
                            <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover"
                                name="cover" onchange="previewImage()">
                            <label for="cover"><strong>IMAGE</strong> (max: 2MB)</label>
                            <img class="img-preview img-fluid col-sm-5" id="frame">
                            @error('cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KEMBALI</button>
                        <button type="submit" class="btn btn-primary">TAMBAH</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
