@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid col-lg-9 mb-3">
    <div class="container py-4 col-12 mb-3">
        <div class="section-title col-md-12 mb-0">
            <div class="col-12">
                <div class="page-header clearfix">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-header">
                                        <h2>UBAH DATA BUKU</h2>
                                    </div>
                                    <p>Silahkan masukan pembaruan yang diperlukan.</p>
                                    <form action="/dashboard/books/{{ $book->slug }}" method="post" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        
                                        <div class="form-floating">
                                            {{-- <label><strong>Judul Buku</strong></label> --}}
                                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror rounded-top" placeholder="Masukkan judul" autofocus id="judul" value="{{ old('judul', $book->judul) }}" required>
                                            <label for="judul"><strong>JUDUL</strong></label>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Slug</strong></label><br><em>Ketik ulang judul jika slug tidak muncul</em> --}}
                                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="slug" id="slug" value="{{ old('slug', $book->slug) }}" required>
                                            <label for="slug"><strong>SLUG</strong> (Jika error, buat slug baru)</label>
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Kategori</strong></label> --}}
                    
                                            <select name="category_id" class="form-select" id="floatingSelect">
                                                @foreach ($categories as $cat)
                                                    @if (old('category_id', $book->category_id) == $cat->id)
                                                        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                                    @else
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect"><strong>KATEGORI</strong></label>
                                        </div>
                                        <div class="mb-3 form-floating">
                                            <input class="form-control @error('cover') is-invalid @enderror" type="file" id="cover" name="cover" onchange="previewImage()">
                                            <label for="cover"><strong>COVER BUKU</strong> (max: 2MB)</label>
                                            @if ($book->cover)
                                                <img class="img-preview img-fluid col-sm-5" src="{{ asset('storage/' . $book->cover) }}" id="frame">
                                            @else
                                                <img class="img-preview img-fluid col-sm-5" id="frame">
                                            @endif

                                            @error('cover')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Nama Penulis</strong></label><br><em>Jika 2 penulis atau lebih gunakan enter</em> --}}
                                            <textarea name="penulis" class="form-control @error('penulis') is-invalid @enderror" placeholder="Masukkan nama penulis" required id="floatingTextarea" style="height: 100px">{{ old('penulis', $book->penulis) }}</textarea>
                                            <label for="floatingTextarea1"><strong>PENULIS</strong> (Jika 2 penulis atau lebih gunakan enter)</label>
                                            @error('penulis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Penerbit</strong></label><br><em>Jika 2 penerbit atau lebih gunakan enter</em> --}}
                                            <textarea name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Masukkan penerbit" required id="floatingTextarea2" style="height: 100px">{{ old('penerbit', $book->penerbit) }}</textarea>
                                            <label for="floatingTextarea2"><strong>PENERBIT</strong> (Jika 2 penerbit atau lebih gunakan enter)</label>
                                            @error('penerbit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Tahun</strong></label> --}}
                                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Masukkan tahun" value="{{ old('tahun', $book->tahun) }}" required id="floatingTahun">
                                            <label for="floatingTahun"><strong>TAHUN</strong></label>
                                            @error('tahun')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Jumlah</strong></label> --}}
                                            <input type="number" value="{{ old('jumlah', $book->jumlah) }}" placeholder="Masukkan jumlah buku" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror rounded-bottom" required id="floatingJumlah">
                                            <label for="floatingJumlah"><strong>JUMLAH</strong></label>
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3">UPDATE BUKU</button>
                                        {{-- <input type="submit" class="btn btn-primary" value="Simpan"> --}}
                                        <a href="" class="btn btn-default">BATAL</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/dashboard/books/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    function previewImage() {
            frame.src=URL.createObjectURL(event.target.files[0]);
        }
</script>

{{-- slug tanpa cek duplikat --}}
{{-- <script>
    const judul = document.querySelector("#judul");
    const slug = document.querySelector("#slug");

    judul.addEventListener("keyup", function() {
        let preslug = judul.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script> --}}
    
@endsection