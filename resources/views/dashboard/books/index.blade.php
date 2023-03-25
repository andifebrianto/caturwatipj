@extends('dashboard.layouts.main')

@section('container')

{{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
    <span>My Books</span>
    <a class="link-secondary" href="#" aria-label="Add a new report">
      <span data-feather="plus-circle" class="align-text-bottom"></span>
    </a>
</h6> --}}
  
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="section-title">
        
        @if ($books->count() > 0)
            
        <div class="col-md-12">
            
            <div class="page-header clearfix">
                <h6 style="text-align: right;" class="pull-left">TOTAL JUDUL : {{ $books->total() }}
                <br>TOTAL BUKU : {{ $totalbuku }}</h6>
                <h4 style="text-align: center;"><strong>{{ $header }}</strong></h4>
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif
            <a href="/dashboard/books/create" class="btn btn-primary font-weight-bold mb-3">Tambah Buku</a>
            <div class="table-responsive table-hover">
                <table class='table table-bordered table-striped text-center text-uppercase'>
                    <thead class='thead-dark'>
                        <tr>
                            <th><center>No.</center></th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)   
                        <tr>
                            {{-- <td>{{ $books->count() * ($books->currentPage() - 1) + $loop->iteration }}</td> --}}
                            <td>{{ ++$i }}</td>
                            <td><a href="/dashboard/books?kategori={{ $book->categories->name }}" class="text-decoration-none">{{ $book->categories->name }}</a></td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td>{{ $book->penerbit }}</td>
                            <td>{{ $book->tahun }}</td>
                            <td>{{ $book->jumlah }}</td>
                            <td>
                                {{-- <a href="" class="badge badge-info">View </a> --}}
                                <a href="/dashboard/books/{{ $book->slug }}/edit" class="badge badge-warning">Edit </a>
                                <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge badge-danger border-0" onClick="return confirm('Hapus data?')">Delete</button>
                                </form>
                                {{-- <a href="" class="badge badge-danger">Delete</a> --}}
                            </td>
                        </tr>
                        @endforeach
                
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $books->onEachSide(0)->links() }}
                </div>
            </div>
        </div>

        @else
        <div class="col-md-12 text-center">
            <h4>BOOK NOT FOUND!</h4>
        </div>

        @endif
    </div>
</div>
    
@endsection