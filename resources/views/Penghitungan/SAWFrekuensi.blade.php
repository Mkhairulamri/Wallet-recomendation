@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Frekuensi Kriteria Penilaian</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">SAW</a></li>
                    <li class="breadcrumb-item active"> Frekuensi</li>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Penghitungan Prefernsi Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($alternatif as $al)
                            <div class="col-sm-4 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        Frekuensi {{$al->nama_alternatif}}
                                    </div>
                                    <div class="card-body">
                                        <table class="table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center; width: 100px; height:30px">#</th>
                                                    <th style="text-align:center; width:50px">1</th>
                                                    <th style="text-align:center; width:50px">2</th>
                                                    <th style="text-align:center; width:50px">3</th>
                                                    <th style="text-align:center; width:50px">4</th>
                                                    <th style="text-align:center; width:50px">4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subKriteria as $kr)
                                                @php
                                                    $array = $data[$al->kode_alternatif]
                                                @endphp
                                                    <tr>
                                                        <td style="text-align:center; width:50px"><bold>{{$kr->kode_sub_kriteria}}</bold></td>
                                                        <td style="text-align:center; width:50px">{{$data[$al->kode_alternatif][$kr->kode_sub_kriteria][1]}}</td>
                                                        <td style="text-align:center; width:50px">{{$data[$al->kode_alternatif][$kr->kode_sub_kriteria][2]}}</td>
                                                        <td style="text-align:center; width:50px">{{$data[$al->kode_alternatif][$kr->kode_sub_kriteria][3]}}</td>
                                                        <td style="text-align:center; width:50px">{{$data[$al->kode_alternatif][$kr->kode_sub_kriteria][4]}}</td>
                                                        <td style="text-align:center; width:50px">{{$data[$al->kode_alternatif][$kr->kode_sub_kriteria][5]}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>

@include('./Layout/Footer')
