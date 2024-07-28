@include('Layout/Header')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center p-5">

            <div class="col-xl-6 col-lg-6 col-md-9 p-5">

                <div class="card o-hidden border-0 shadow-lg my-6">
                    <div class="card-body p-0 ">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                                    </div>
                                    @if ($message = Session::get('gagal'))
                                        <p class="text-danger fs-6 justify text-center">{{$message}}</p>
                                    @elseif($message = Session::get('sukses'))
                                        <p class="text-success fs-6 justify text-center">{{$message}}</p>
                                    @endif
                                    <form class="user needs-validation" novalidate method="POST" action="{{route('ResetPassword')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Masukkan Username..." name="username">
                                                <div class="invalid-feedback">
                                                    Maaf Form Tidak Boleh Kosong
                                                </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('Index')}}">Kembali Ke Halaman Login</a>
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
