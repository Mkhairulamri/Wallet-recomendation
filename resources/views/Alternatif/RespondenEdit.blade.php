@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Input Responden</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Responden</a></li>
                    <li class="breadcrumb-item active">Input</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- @dd($data); --}}
                        <form class="needs-validation" novalidate="" action="{{route('RespondenUpdate')}}" method="POST" id="regForm">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="tab">
                                    {{-- @dd($data->nama_responden); --}}
                                    <h4>Info Responden</h4>
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Nama</label>
                                          <input type="text" class="form-control" name="nama" value="{{$data->nama_responden}}" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">NIM</label>
                                          <input type="number" class="form-control" name="nim" value="{{$data->nim}}" placeholder="Masukkan Nomor Induk Mahasiswa">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Email</label>
                                          <input type="Email" class="form-control" name="email" value="{{$data->email}}" placeholder="Masukkan Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">No HP</label>
                                          <input type="text" class="form-control" name="nohp" value="{{$data->no_hp}}" placeholder="Masukkan Nomor Handphone">
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Angkatan</label>
                                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="angkatan">
                                            <option selected>Pilih Angkatan...</option>
                                            <option value="2017"
                                            @if ($data->angkatan == '2017')
                                                selected
                                            @endif
                                            >2017</option>
                                            <option value="2018"
                                            @if ($data->angkatan == '2018')
                                                selected
                                            @endif
                                            2018</option>
                                            <option value="2019"
                                            @if ($data->angkatan == '2019')
                                                selected
                                            @endif>2019</option>
                                            <option value="2020"
                                            @if ($data->angkatan == '2020')
                                                selected
                                            @endif>2020</option>
                                            <option value="2021"
                                            @if ($data->angkatan == '2021')
                                                selected
                                            @endif>2021</option>
                                            <option value="2022"
                                            @if ($data->angkatan == '2022')
                                                selected
                                            @endif>2022</option>
                                            <option value="2023"
                                            @if ($data->angkatan == '2023')
                                                selected
                                            @endif>2023</option>
                                          </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Jenis Kelamin</label>
                                          <div class="form-row ml-4 mt-2">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin" value="Laki-Laki"
                                                    @if ($data->angkatan == 'Laki-Laki')
                                                        checked
                                                    @endif
                                                    >
                                                    <label class="form-check-label" for="gridRadios2">
                                                      Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin"  value="Perempuan"
                                                    @if ($data->angkatan == 'Perempuan')
                                                        checked
                                                    @endif
                                                    >
                                                    <label class="form-check-label" for="gridRadios2">
                                                      Perempuan
                                                    </label>
                                                  </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    @php
                                        $pilihan = json_decode($data->pilihan);
                                        // dd($pilihan);
                                    @endphp
                                    <div class="form-group">
                                        <label for="inputPassword4">Pilihan Wallet</label>
                                        <div class="row">
                                            @foreach ($alternatif as $item)
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="wallet[]" value="{{$item->nama_alternatif}}"
                                                        @for ($i=0;$i<count($pilihan); $i++)
                                                            @if($item->nama_alternatif == $pilihan[$i])
                                                                checked
                                                            @endif
                                                        @endfor
                                                        >
                                                        <label class="form-check-label" for="{{$item->nama_alternatif}}">
                                                            {{$item->nama_alternatif}}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @foreach ($alternatif as $al)
                                <div class="tab">
                                    <h4>{{$al->nama_alternatif}}</h4>
                                    <hr>
                                    @php
                                        $alternatif1 = json_decode($data->alternatif1);
                                        // dd($alternatif1->C01);
                                    @endphp
                                    {{-- SubKriteria 1 --}}
                                    <div class="form-row">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-1 float-right">
                                                    1.
                                                </div>
                                                <div class="col-sm-11">
                                                    <label for="kriteria1">Menurut saya, tata letak menu dari aplikasi dompet digital {{$al->nama_alternatif}} sudah terorganisir dengan kategori yang jelas dan terurut. Sehingga membuat saya dapat dengan mudah menemukan fitur yang sedang saya butuhkan.</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C01]" id="sangatsetuju" value="5"
                                                        @if ($alternatif1->C01 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C01]" id="setuju" value="4"
                                                        @if ($alternatif1->C01 == '4')
                                                            checked
                                                        @endif>
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C01]" id="netral" value="3"
                                                        @if ($alternatif1->C01 == '3')
                                                            checked
                                                        @endif>
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C01]" id="kurangsetuju" value="2"
                                                        @if ($alternatif1->C01 == '2')
                                                            checked
                                                        @endif>
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C01]" id="sangattidaksetuju" value="1"
                                                        @if ($alternatif1->C01 == '1')
                                                            checked
                                                        @endif>
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} memiliki dukungan obrolan langsung atau layanan dukungan pelanggan 24/7, sehingga saya dapat bertanya atau menyampaikan keluhan pada saat menggunakan aplikasi nya.</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C02]" id="sangatsetuju" value="5"
                                                        @if ($alternatif1->C02 == '5')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C02]" id="setuju" value="4"
                                                        @if ($alternatif1->C02 == '4')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C02]" id="netral" value="3"
                                                        @if ($alternatif1->C02 == '3')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C02]" id="kurangsetuju" value="2"
                                                        @if ($alternatif1->C02 == '2')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C02]" id="sangattidaksetuju" value="1"
                                                        @if ($alternatif1->C02 == '1')
                                                            checked
                                                        @endif

                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} memberikan panduan penggunakan bagi pengguna nya, sehingga dapat membantu saya dalam memahami cara untuk  menggunakan aplikasi nya.</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C03]" id="sangatsetuju" value="5"
                                                         @if ($alternatif1->C03 == '5')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C03]" id="setuju" value="4"
                                                         @if ($alternatif1->C03 == '4')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C03]" id="netral" value="3"
                                                         @if ($alternatif1->C03 == '3')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C03]" id="kurangsetuju" value="2"
                                                         @if ($alternatif1->C03 == '2')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C03]" id="sangattidaksetuju" value="1"
                                                         @if ($alternatif1->C03 == '1')
                                                            checked
                                                        @endif

                                                        >
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
                                                    <label for="kriteria1">Jenis transaksi yang ada pada aplikasi {{$al->nama_alternatif}} sudah beragam dan dapat memenuhi kebutuhan saya dalam bertransaksi secara online</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C04]" id="sangatsetuju" value="5"
                                                         @if ($alternatif1->C03 == '5')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C04]" id="setuju" value="4"
                                                         @if ($alternatif1->C03 == '4')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C04]" id="netral" value="3"
                                                         @if ($alternatif1->C03 == '3')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C04]" id="kurangsetuju" value="2"
                                                         @if ($alternatif1->C03 == '2')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C04]" id="sangattidaksetuju" value="1"
                                                         @if ($alternatif1->C03 == '1')
                                                            checked
                                                        @endif

                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} sudah memiliki fitur pencarian dan filter yang dapat memudahkan saya untuk menemukan menu atau fitur yang sedang saya butuhkan</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C05]" id="sangatsetuju" value=
                                                        @if ($alternatif1->C02 == '5')
                                                            checked
                                                        @endif

                                                        "5">
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C05]" id="setuju" value="4"
                                                        @if ($alternatif1->C05 == '4')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C05]" id="netral" value="3"
                                                        @if ($alternatif1->C05 == '3')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C05]" id="kurangsetuju" value="2"
                                                        @if ($alternatif1->C05 == '')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C05]" id="sangattidaksetuju" value="1"
                                                        @if ($alternatif1->C05 == '1')
                                                            checked
                                                        @endif

                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} bekerja sama dengan beragam mitra merchant yang umum dibutuhkan oleh pengguna nya, sehingga memudahkan saya dalam melakukan transaksi pembayaran. .</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C06]" id="sangatsetuju06" value="5"
                                                        @if ($alternatif1->C06 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju06">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C06]" id="setuju06" value="4"
                                                        @if ($alternatif1->C06 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju06">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C06]" id="netral06" value="3"
                                                        @if ($alternatif1->C06 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral06">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C06]" id="kurangsetuju06" value="2"
                                                        @if ($alternatif1->C06 == '2')
                                                            checked
                                                        @endif

                                                        >
                                                        <label class="form-check-label" for="kurangsetuju06">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C06]" id="sangattidaksetuju06" value="1"
                                                        @if ($alternatif1->C06 == '1')
                                                            checked
                                                        @endif
                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} selalu mengadakan kegiatan promosi dan diskon menarik untuk para pengguna nya, sehingga membuat saya tertarik untuk melakukan transaksi pembelian pada mitra merchant yang ada pada aplikasi {{$al->nama_alternatif}}.</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C07]" id="sangatsetuju07" value="5"
                                                        @if ($alternatif1->C07 == '5')
                                                            checked
                                                        @endif


                                                        >
                                                        <label class="form-check-label" for="sangatsetuju07">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C07]" id="setuju07" value="4"
                                                        @if ($alternatif1->C07 == '4')
                                                            checked
                                                        @endif


                                                        >
                                                        <label class="form-check-label" for="setuju07">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C07]" id="netral07" value="3"
                                                        @if ($alternatif1->C07 == '3')
                                                            checked
                                                        @endif


                                                        >
                                                        <label class="form-check-label" for="netral07">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C07]" id="kurangsetuju07" value="2"
                                                        @if ($alternatif1->C07 == '2')
                                                            checked
                                                        @endif


                                                        >
                                                        <label class="form-check-label" for="kurangsetuju07">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C07]" id="sangattidaksetuju07" value="1"
                                                        @if ($alternatif1->C07 == '1')
                                                            checked
                                                        @endif


                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} memiliki keamanan otentikasi dua faktor yang berfungsi dengan baik sehingga menurut saya lebih terjaga tingkat keamanan nya</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C08]" id="sangatsetuju" value="5"
                                                        @if ($alternatif1->C08 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C08]" id="setuju" value="4"
                                                        @if ($alternatif1->C08 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C08]" id="netral" value="3"
                                                        @if ($alternatif1->C08 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C08]" id="kurangsetuju" value="2"
                                                        @if ($alternatif1->C08 == '2')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="kurangsetuju">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C08]" id="sangattidaksetuju" value="1"
                                                        @if ($alternatif1->C09 == '1')
                                                            checked
                                                        @endif
                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} dapat memberikan saya opsi atau rekomendasi untuk menggunakan sandi yang kuat dan autentikasi biometrik</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C09]" id="sangatsetuju09" value="5"
                                                        @if ($alternatif1->C09 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju09">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C09]" id="setuju09" value="4"
                                                        @if ($alternatif1->C09 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju09">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C09]" id="netral09" value="3"
                                                        @if ($alternatif1->C09 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral09">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C09]" id="kurangsetuju09" value="2"
                                                        @if ($alternatif1->C09 == '2')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="kurangsetuju09">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C09]" id="sangattidaksetuju09" value="1"
                                                        @if ($alternatif1->C09 == '1')
                                                            checked
                                                        @endif
                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}} memberikan jaminan terlindungi dan terawasi oleh lembaga tinggi negara </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C10]" id="sangatsetuju10" value="5"
                                                        @if ($alternatif1->C10 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju10">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C10]" id="setuju10" value="4"
                                                        @if ($alternatif1->C10 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju10">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C10]" id="netral10" value="3"
                                                        @if ($alternatif1->C10 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral10">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C10]" id="kurangsetuju10" value="2"
                                                        @if ($alternatif1->C10 == '2')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="kurangsetuju10">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C10]" id="sangattidaksetuju10" value="1"
                                                        @if ($alternatif1->C10 == '1')
                                                            checked
                                                        @endif
                                                        >
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
                                                    <label for="kriteria1">Aplikasi {{$al->nama_alternatif}}  memberikan saya penjelasan dan persetujuan bagaimana data saya diambil, kemudian digunakan, lalu dilindungi pada aplikasi nya</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C11]" id="sangatsetuju11" value="5"
                                                        @if ($alternatif1->C11 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju11">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C11]" id="setuju11" value="4"
                                                        @if ($alternatif1->C11 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju11">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C11]" id="netral11" value="3"
                                                        @if ($alternatif1->C11 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral11">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C11]" id="kurangsetuju11" value="2"
                                                        @if ($alternatif1->C11 == '2')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="kurangsetuju11">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C11]" id="sangattidaksetuju11" value="1"
                                                        @if ($alternatif1->C11 == '1')
                                                            checked
                                                        @endif
                                                        >
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
                                                    <label for="kriteria1">Setiap kegiatan transaksi pada aplikasi {{$al->nama_alternatif}}, dikenakan biaya tambahan atau biaya administrasi</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C12]" id="sangatsetuju12" value="5"
                                                        @if ($alternatif1->C12 == '5')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangatsetuju12">
                                                        Sangat Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C12]" id="setuju12" value="4"
                                                        @if ($alternatif1->C12 == '4')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="setuju12">
                                                        Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C12]" id="netral12" value="3"
                                                        @if ($alternatif1->C12 == '3')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="netral12">
                                                        Netral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C12]" id="kurangsetuju12" value="2"
                                                        @if ($alternatif1->C12 == '2')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="kurangsetuju12">
                                                        Kurang Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="{{$al->kode_alternatif}}[C12]" id="sangattidaksetuju12" value="1"
                                                        @if ($alternatif1->C12 == '1')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="form-check-label" for="sangattidaksetuju12">
                                                        Sangat Tidak Setuju
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"  id="prevBtn" onclick="nextPrev(-1)">Sebelumnya </button>
                                <button type="button" class="btn btn-secondary" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                @for($i= 0;$i<=count($alternatif) ; $i++)
                                    <span class="step"></span>
                                @endfor
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('./Layout/Footer')

<link rel="stylesheet" href="{{asset('css/NextStep.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/NextStep.js')}}"></script>

