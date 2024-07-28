@include('Layout/Header')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-10 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="{{route('InputResponden')}}"><i class="fa fas-back"></i>
                                    <button class="btn btn-primary">Kembali Ke Halaman Sebelumnya</button>
                                </a>
                            </div>        
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-toggle="tab"
                                        data-target="#result" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Hasil</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-toggle="tab"
                                        data-target="#normalisasi" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Normalisasi Terbobot</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#solusi"
                                        type="button" role="tab" aria-controls="contact" aria-selected="false">Solusi
                                        Ideal</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="result" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row m-md-5">
                                        <div class="col-sm-5 p-2 mt-5">
                                            <h1>Selamat</h1>
                                            <h1>{{ucfirst($data->nama_responden)}}</h1>
                                            <h3>Berikut Rekomendasi Aplikasi Dompet Digital</h3>
                                        </div>
                                        <div class="col-sm-5 m-lg-5 align-content-center">
                                            @php
                                            $no = 1;
                                            $rekom = json_decode($data->rekomendasi);
                                            // dd($rekom);
                                            @endphp
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px;">#</th>
                                                        <th style="text-align:center">Kode Alternatif</th>
                                                        <th style="text-align:center">Nama Kriteria</th>
                                                        <th style="text-align:center">Preferensi Akhir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $no = 1;
                                                    @endphp
                                                    @foreach ($rekom as $key=>$dt)
                                                    <tr>
                                                        <td>{{$no++}}</td>
                                                        <td>{{$rekom[$key]->kode}}</td>
                                                        <td>{{$rekom[$key]->nama}}</td>
                                                        <td>{{$rekom[$key]->preferensi}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th style="width: 10px;">#</th>
                                                    <th style="text-align:center">Kode Alternatif</th>
                                                    <th style="text-align:center">Nama Alternatif</th>
                                                    <th style="text-align:center">Preferensi Akhir</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="normalisasi" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <h3 class="mt-2">Normalisasi Terbobot</h3>
                                    <div class="row">
                                        @foreach ($alternatif as $alkey=>$al)
                                        <div class="col-sm-5 mt-5">
                                            <div class="card">
                                                <div class="card-header">
                                                    Frekuensi {{$al->nama_alternatif}}
                                                </div>
                                                <div class="card-body">
                                                    <table class="table-bordered ml-4">
                                                        <thead>
                                                            <tr>
                                                                <th
                                                                    style="text-align:center; width: 100px; height:30px">
                                                                    #</th>
                                                                <th style="text-align:center; width:100px">Normalisasi
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($subKriteria as $skkey=>$kr)
                                                            @php
                                                            $array = $normalisasi[$al->kode_alternatif]
                                                            @endphp
                                                            <tr>
                                                                <td style="text-align:center; width:50px">
                                                                    <bold>R{{$alkey+1}}{{$skkey+1}}</bold>
                                                                </td>
                                                                <td style="text-align:center; width:100px">
                                                                    {{round($normalisasi[$al->kode_alternatif][$skkey+1],3)}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="solusi" role="tabpanel" aria-labelledby="contact-tab">
                                    <h3 class="mt-2">Solusi Ideal</h3>
                                    <table class="table-bordered ml-4">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center; width: 100px; height:30px">#</th>
                                                <th style="text-align:center; width:100px">Solusi Ideal Positif</th>
                                                <th style="text-align:center; width:100px">Solusi Ideal Negatif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @php
                                            dd($data)
                                            @endphp --}}
                                            @foreach ($subKriteria as $skkey=>$kr)
                                            <tr>
                                                <td style="text-align:center; width:50px">
                                                    <bold>Y{{$skkey+1}}</bold>
                                                </td>
                                                <td style="text-align:center; width:200px">
                                                    {{round($solusi[$kr->kode_sub_kriteria]['positif'],3)}}</td>
                                                <td style="text-align:center; width:200px">
                                                    {{round($solusi[$kr->kode_sub_kriteria]['negatif'],3)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </div>
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

    <script>
        const today = new Date().toISOString().split('T')[0];

document.getElementById('tanggal_lahir').setAttribute('max', today);
    </script>

    <link rel="stylesheet" href="{{asset('css/NextStep.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/NextStep.js')}}"></script>