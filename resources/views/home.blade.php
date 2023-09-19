@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="h3">Dashboard</h4>
        <small class="text-muted float-end"><span class="text-muted float-end fw-bold mx-1"> Dashboard
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="row">
        <style>
        .carousel {
            border-radius: 10px;
            overflow: hidden;
        }

        .carousel-item {
            height: 400px;
            border-radius: 10px;

        }
        </style>

        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="my-2">Fitur Saya</h5>
            </div>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block" src="../../assets/img/carousel_1.jpg" alt="First slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Selamat Datang</h4>
                            <p>Web ini terdapat 3 fitur yang terdiri dari Excel to Database, Transaction Data, dan
                                Indexing Databases</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="../../assets/img/carousel_2.jpg" alt="Second slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Excel to Database</h4>
                            <p>yaitu Insert data secara batch dari file Excel ke database.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="../../assets/img/carousel_3.jpg" alt="Third slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Transaction Data</h4>
                            <p>yaitu fitur ketika melakukan Insert 2 query atau lebih. jika terdapat kondisi salah
                                satu query gagal insert maka query lain pun akan gagal dan tidak terinsert.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="../../assets/img/carousel_4.jpg" alt="Four slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Indexing Database</h4>
                            <p>yaitu untuk meningkatkan performa Query sehingga aplikasi tidak menjadi lamban saat
                                meload Query banyak data.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection