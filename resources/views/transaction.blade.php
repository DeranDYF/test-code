@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Transaction</h4>
        <small class="text-muted float-end">Dashboard /<span class="text-muted float-end fw-bold mx-1"> Transaction
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="card mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List Data</h5>
            <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal" data-bs-target="#modalAddData">Add Data
            </button>
        </div>
    </div>

    <!-- Modal Add Data -->
    <div class="modal fade" id="modalAddData" tabindex="2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="add">
            <div class="modal-content">
                <form method="POST" action="{{ route('add') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Add Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_depan" class="form-label required">Nama Depan</label>
                                <input type="text" name="nama_depan" id="nama_depan" class="form-control mb-3" placeholder="Masukan Nama Depan" required />
                                <label for="nama_belakang" class="form-label required">Nama Belakang</label>
                                <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" placeholder="Masukan Nama Belakang" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary" id="addUser">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Depan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1 @endphp
                                @foreach($depan as $dp)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dp->nama_depan}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Belakang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1 @endphp
                                @foreach($belakang as $bl)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$bl->nama_belakang}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection