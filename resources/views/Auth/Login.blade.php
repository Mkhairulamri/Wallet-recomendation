@include('Layout/Header')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-10 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{asset('asset/mobile-wallet_12261819.png')}}" alt="icon" style="width: 50%; height: 100%; margin-left: 100px">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text-center">
                                                <h1 class="h1 text-gray-900 mb-4">SIREKOM</h1>
                                                <h5 class="text-gray-900 mb-4">Sistem Rekomendasi Dompet Digital!</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @if ($message = Session::get('gagal'))
                                        <p class="text-danger fs-6 justify text-center">{{$message}}</p>
                                    @endif
                                    <form class="user needs-validation mt-5" novalidate method="POST" action="{{route('LoginProcess')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username" placeholder="Masukkan Username...">
                                                <div class="invalid-feedback">
                                                    Maaf Form Tidak Boleh Kosong
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Masukkan Password...">
                                                <div class="invalid-feedback">
                                                    Maaf Form Tidak Boleh Kosong
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                {{-- <a href=""><p>Lupa password?</p></a> --}}
                                            </div>
                                            <div class="col">
                                                <div class="float-right">
                                                    <a href="{{route('VerifResponden')}}"><p>Edit Rekomendasi</p></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-primary btn-user w-25" style="margin-left: 600px">
                                                Login
                                            </button>
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{route('InputResponden')}}"><button class="btn btn-primary">Cari rekomendasi</button></a>
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
