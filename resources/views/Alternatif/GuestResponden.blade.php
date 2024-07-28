@include('Layout/Header')
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card">
                        @if ($message = Session::get('exist'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible show fade" role="alert">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{$message}}
                            </div>
                        </div>
                        @endif {{-- Tabel data panitia --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="needs-validation" novalidate="" action="{{route('GuessInsert')}}" method="POST" id="regForm">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="tab">
                                        <h4>Input Responden</h4>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="inputEmail4">Nama</label>
                                              <input type="text" class="form-control" name="nama" id="inputName" placeholder="Masukkan Nama">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="inputPassword4">NIM</label>
                                              <input type="number" class="form-control" name="nim" id="inputNumber4" placeholder="Masukkan Nomor Induk Mahasiswa">
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="inputEmail4">Email</label>
                                              <input type="Email" class="form-control" name="email" id="inputEmail" placeholder="Masukkan Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label for="inputPassword4">No HP</label>
                                              <input type="text" class="form-control" name="nohp" id="inputNumber4" placeholder="Masukkan Nomor Handphone">
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            {{-- <div class="form-group col-md-6">
                                              <label for="inputEmail4">Angkatan</label>
                                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="angkatan">
                                                <option selected>Pilih Angkatan...</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                              </select>
                                            </div> --}}
                                            <div class="form-group col-md-6">
                                              <label for="inputPassword4">Jenis Kelamin</label>
                                              <div class="form-row ml-4 mt-2">
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kelamin" id="gridRadios2" value="Laki-Laki">
                                                        <label class="form-check-label" for="gridRadios2">
                                                          Laki-Laki
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kelamin" id="gridRadios2" value="Perempuan">
                                                        <label class="form-check-label" for="gridRadios2">
                                                          Perempuan
                                                        </label>
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="inputPassword4">Pilihan Kriteria</label>
                                            <div class="row">
                                                <select name="kriteria"  class="form-control">
                                                    <option disabled>Pilih Kriteria Pilihan</option>
                                                    @foreach ($kriteria as $kr)
                                                    <option value="{{$kr->kode_kriteria}}">{{$kr->nama_kriteria}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="inputPassword4">Tanggal Lahir</label>
                                            <div class="row">
                                                <input type="date" class="form-control" name="tgl_lahit" placeholder="Masukkan Nomor Handphone" id="tanggal_lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <h4>Pertanyaan Kriteria</h4>
                                        <hr>
                                        {{-- SubKriteria 1 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        1.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Menurut saya, tata letak menu dari aplikasi dompet digital sudah terorganisir dengan kategori yang jelas dan terurut. Sehingga membuat saya dapat dengan mudah menemukan fitur yang sedang saya butuhkan.</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C01" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C01" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C01" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C01" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C01" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria2 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        2.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi memiliki dukungan obrolan langsung atau layanan dukungan pelanggan 24/7, sehingga saya dapat bertanya atau menyampaikan keluhan pada saat menggunakan aplikasi nya.</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C02" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C02" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C02" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C02" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C02" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 3 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        3.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi memberikan panduan penggunakan bagi pengguna nya, sehingga dapat membantu saya dalam memahami cara untuk  menggunakan aplikasi nya.</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C03" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C03" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C03" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C03" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C03" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 4 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        4.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Jenis transaksi yang ada pada aplikasi sudah beragam dan dapat memenuhi kebutuhan saya dalam bertransaksi secara online</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C04" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C04" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C04" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C04" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C04" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 5 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        5.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi sudah memiliki fitur pencarian dan filter yang dapat memudahkan saya untuk menemukan menu atau fitur yang sedang saya butuhkan</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C05" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C05" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C05" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C05" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C05" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 6 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        6.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi bekerja sama dengan beragam mitra merchant yang umum dibutuhkan oleh pengguna nya, sehingga memudahkan saya dalam melakukan transaksi pembayaran. .</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C06" id="sangatsetuju06" value="5">
                                                            <label class="form-check-label" for="sangatsetuju06">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C06" id="setuju06" value="4">
                                                            <label class="form-check-label" for="setuju06">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C06" id="netral06" value="3">
                                                            <label class="form-check-label" for="netral06">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C06" id="kurangsetuju06" value="2">
                                                            <label class="form-check-label" for="kurangsetuju06">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C06" id="sangattidaksetuju06" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju06">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 7 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        7.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi selalu mengadakan kegiatan promosi dan diskon menarik untuk para pengguna nya, sehingga membuat saya tertarik untuk melakukan transaksi pembelian pada mitra merchant yang ada pada aplikasi.</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C07" id="sangatsetuju07" value="5">
                                                            <label class="form-check-label" for="sangatsetuju07">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C07" id="setuju07" value="4">
                                                            <label class="form-check-label" for="setuju07">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C07" id="netral07" value="3">
                                                            <label class="form-check-label" for="netral07">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C07" id="kurangsetuju07" value="2">
                                                            <label class="form-check-label" for="kurangsetuju07">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C07" id="sangattidaksetuju07" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju07">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 8 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        8.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi memiliki keamanan otentikasi dua faktor yang berfungsi dengan baik sehingga menurut saya lebih terjaga tingkat keamanan nya</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C08" id="sangatsetuju" value="5">
                                                            <label class="form-check-label" for="sangatsetuju">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C08" id="setuju" value="4">
                                                            <label class="form-check-label" for="setuju">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C08" id="netral" value="3">
                                                            <label class="form-check-label" for="netral">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C08" id="kurangsetuju" value="2">
                                                            <label class="form-check-label" for="kurangsetuju">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C08" id="sangattidaksetuju" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 9 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        9.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi dapat memberikan saya opsi atau rekomendasi untuk menggunakan sandi yang kuat dan autentikasi biometrik</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C09" id="sangatsetuju09" value="5">
                                                            <label class="form-check-label" for="sangatsetuju09">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C09" id="setuju09" value="4">
                                                            <label class="form-check-label" for="setuju09">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C09" id="netral09" value="3">
                                                            <label class="form-check-label" for="netral09">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C09" id="kurangsetuju09" value="2">
                                                            <label class="form-check-label" for="kurangsetuju09">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C09" id="sangattidaksetuju09" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju09">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 10 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        10.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi memberikan jaminan terlindungi dan terawasi oleh lembaga tinggi negara </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C10" id="sangatsetuju10" value="5">
                                                            <label class="form-check-label" for="sangatsetuju10">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C10" id="setuju10" value="4">
                                                            <label class="form-check-label" for="setuju10">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C10" id="netral10" value="3">
                                                            <label class="form-check-label" for="netral10">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C10" id="kurangsetuju10" value="2">
                                                            <label class="form-check-label" for="kurangsetuju10">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C10" id="sangattidaksetuju10" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju10">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 11 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        11.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Aplikasi  memberikan saya penjelasan dan persetujuan bagaimana data saya diambil, kemudian digunakan, lalu dilindungi pada aplikasi nya</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C11" id="sangatsetuju11" value="5">
                                                            <label class="form-check-label" for="sangatsetuju11">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C11" id="setuju11" value="4">
                                                            <label class="form-check-label" for="setuju11">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C11" id="netral11" value="3">
                                                            <label class="form-check-label" for="netral11">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C11" id="kurangsetuju11" value="2">
                                                            <label class="form-check-label" for="kurangsetuju11">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C11" id="sangattidaksetuju11" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju11">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- SubKriteria 12 --}}
                                        <div class="form-row">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1 float-right">
                                                        12.
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <label for="kriteria1">Setiap kegiatan transaksi pada aplikasi, dikenakan biaya tambahan atau biaya administrasi</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C12" id="sangatsetuju12" value="5">
                                                            <label class="form-check-label" for="sangatsetuju12">
                                                            Sangat Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C12" id="setuju12" value="4">
                                                            <label class="form-check-label" for="setuju12">
                                                            Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C12" id="netral12" value="3">
                                                            <label class="form-check-label" for="netral12">
                                                            Netral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C12" id="kurangsetuju12" value="2">
                                                            <label class="form-check-label" for="kurangsetuju12">
                                                            Kurang Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="C12" id="sangattidaksetuju12" value="1">
                                                            <label class="form-check-label" for="sangattidaksetuju12">
                                                            Sangat Tidak Setuju
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary"  id="prevBtn" onclick="nextPrev(-1)">Sebelumnya </button>
                                    <button type="button" class="btn btn-secondary" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->

                                <div style="text-align:center;margin-top:40px;">
                                    @for($i= 0;$i<=2 ; $i++)
                                        <span class="step"></span>
                                    @endfor
                                </div>
                            </form>
                            <a href="{{route('Login')}}"><i class="fa fas-back"></i>
                                <button  class="btn btn-primary">Kembali Ke Halaman Login</button>
                            </a>
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

