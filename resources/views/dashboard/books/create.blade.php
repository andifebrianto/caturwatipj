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
                                        <h2>TAMBAH BUKU</h2>
                                    </div>
                                    <p>Silahkan isi form untuk menambahkan data buku ke dalam database.</p>
                                    <form action="/dashboard/books" method="post">
                                        @csrf
                                        
                                        <div class="form-floating">
                                            {{-- <label><strong>Judul Buku</strong></label> --}}
                                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror rounded-top" placeholder="Masukkan judul" autofocus id="judul" value="{{ old('judul') }}" required>
                                            <label for="judul"><strong>JUDUL</strong></label>
                                            @error('judul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Slug</strong></label><br><em>Ketik ulang judul jika slug tidak muncul</em> --}}
                                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="slug" id="slug" value="{{ old('slug') }}" required>
                                            <label for="slug"><strong>SLUG</strong> (Jika error, buat slug baru)</label>
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Kategori</strong></label> --}}
                    
                                            <select name="category_id" class="form-select" id="floatingSelect">
                                                @foreach ($categories as $cat)
                                                    @if (old('category_id') == $cat->id)
                                                        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                                    @else
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>

                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect"><strong>KATEGORI</strong></label>
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Nama Penulis</strong></label><br><em>Jika 2 penulis atau lebih gunakan enter</em> --}}
                                            <textarea name="penulis" class="form-control @error('penulis') is-invalid @enderror" placeholder="Masukkan nama penulis" required id="floatingTextarea" style="height: 100px">{{ old('penulis') }}</textarea>
                                            <label for="floatingTextarea1"><strong>PENULIS</strong> (Jika 2 penulis atau lebih gunakan enter)</label>
                                            @error('penulis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Penerbit</strong></label><br><em>Jika 2 penerbit atau lebih gunakan enter</em> --}}
                                            <textarea name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="Masukkan penerbit" required id="floatingTextarea2" style="height: 100px">{{ old('penerbit') }}</textarea>
                                            <label for="floatingTextarea2"><strong>PENERBIT</strong> (Jika 2 penerbit atau lebih gunakan enter)</label>
                                            @error('penerbit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Tahun</strong></label> --}}
                                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Masukkan tahun" value="{{ old('tahun') }}" required id="floatingTahun">
                                            <label for="floatingTahun"><strong>TAHUN</strong></label>
                                            @error('tahun')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating">
                                            {{-- <label><strong>Jumlah</strong></label> --}}
                                            <input type="number" value="{{ old('jumlah') }}" placeholder="Masukkan jumlah buku" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror rounded-bottom" required id="floatingJumlah">
                                            <label for="floatingJumlah"><strong>JUMLAH</strong></label>
                                            @error('jumlah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary my-3">SIMPAN</button>
                                        {{-- <input type="submit" class="btn btn-primary" value="Simpan"> --}}
                                        <a href="" class="btn btn-default">KEMBALI</a>
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

{{-- <script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function(){
        fetch('/dashboard/books/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script> --}}

{{-- slug tanpa cek duplikat --}}
<script>
    const judul = document.querySelector("#judul");
    const slug = document.querySelector("#slug");

    judul.addEventListener("keyup", function() {
        let preslug = judul.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });
</script>
    
@endsection