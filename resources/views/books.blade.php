@extends('layouts.main')

@section('container')

{{-- @dd($books) --}}
<div class="container-fluid py-4 pt-3 mb-3" id="container">
    <div class="container py-4">
        <div class="section-title">
            @if ($books->count() > 0)
                
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h6 style="text-align: right;" class="pull-left">TOTAL BUKU : {{ $books->total() }}
                    {{-- <br>TOTAL JUDUL : ..</h6> --}}
                    <h4 style="text-align: center;"><strong>{{ $header }}</strong></h4>
                </div>
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
                                {{-- <th>Pengaturan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)   
                            <tr>
                                <td>{{ $books->count() * ($books->currentPage() - 1) + $loop->iteration }}</td>
                                <td><a href="/books?kategori={{ $book->categories->name }}">{{ $book->categories->name }}</a></td>
                                <td>{{ $book->judul }}</td>
                                <td>{{ $book->penulis }}</td>
                                <td>{{ $book->penerbit }}</td>
                                <td>{{ $book->tahun }}</td>
                                <td>{{ $book->jumlah }}</td>
                                {{-- <td>
                                    <a href=""> Update </a>
                                    <a href="">Delete</a>
                                </td> --}}
                            </tr>
                            @endforeach
                    
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $books->onEachSide(1)->links() }}
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
</div>
  

@endsection