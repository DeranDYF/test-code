@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Indexing Data</h4>
        <small class="text-muted float-end">Dashboard /<span class="text-muted float-end fw-bold mx-1"> Indexing Data
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List Buku</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="datatables-user table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                        </tr>
                    </thead>
                    @php $no = 1 @endphp
                    @foreach($buku as $bk)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $bk->judul }}</td>
                        <td>{{ $bk->penulis }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection