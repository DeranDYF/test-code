@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Excel to Database</h4>
        <small class="text-muted float-end">Dashboard /<span class="text-muted float-end fw-bold mx-1"> Excel to
                Database
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List Data</h5>
            <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal"
                data-bs-target="#modalAddData">Add Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="datatables-user table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kanwil</th>
                            <th>Serial Number</th>
                        </tr>
                    </thead>
                    @php $no = 1 @endphp
                    @foreach($excel as $xl)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $xl->kanwil }}</td>
                        <td>{{ $xl->serial_number }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddData" tabindex="2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <form method="POST" action="{{ route('import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add New Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Upload File Excel</label>
                            <input type="file" name="excels" accept=".xlsx" id="excels" class="form-control mb-3"
                                required />
                            <div class="form-text">Jenis file xlsx. Ukuran file
                                maksimal
                                <b>5 MB</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="addData">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Role -->
@endsection