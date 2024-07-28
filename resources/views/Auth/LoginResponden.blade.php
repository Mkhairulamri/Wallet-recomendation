@include('Layout/Header')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SPK Dompet Digital!</h1>
                                        <h5 class="text-gray-900 mb-4">Verifikasi Edit Edit Rekomendasi</h5>
                                    </div>
                                    @if ($message = Session::get('gagal'))
                                        <p class="text-danger fs-6 justify text-center">{{$message}}</p>
                                    @endif
                                    <form class="user needs-validation" novalidate method="POST" action="{{route('VerifyResponden')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="nim" placeholder="Masukkan NIM...">
                                                <div class="invalid-feedback">
                                                    Maaf Form Tidak Boleh Kosong
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user"
                                                id="exampleInputPassword" name="tanggalLahir" placeholder="Masukkan Tanggal Lahir...">
                                                <div class="invalid-feedback">
                                                    Maaf Form Tidak Boleh Kosong
                                                </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{route('InputResponden')}}">Cari Rekomendasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('Layout/Footer')
