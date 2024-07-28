@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Preferensi Kriteria SAW</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Penghitungan SAW</a></li>
                    <li class="breadcrumb-item active">Preferensi</li>

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
                    <div class="card-body items-center">
                        <div class="row">
                        @foreach ($alternatif as $alkey=>$al)
                            <div class="col-sm-4 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        Frekuensi {{$al->nama_alternatif}}
                                    </div>
                                    <div class="card-body">
                                        <table class="table-bordered ml-4">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center; width: 100px; height:30px">#</th>
                                                    <th style="text-align:center; width:100px">Kecocokan</th>
                                                    <th style="text-align:center; width:100px">Rata-Rata</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subKriteria as $skkey=>$kr)
                                                @php
                                                    $array = $data[$al->kode_alternatif]
                                                @endphp
                                                    <tr>
                                                        <td style="text-align:center; width:50px"><bold>X{{$alkey+1}}{{$skkey}}</bold></td>
                                                        <td style="text-align:center; width:100px">{{round($data[$al->kode_alternatif][$skkey+1]["jumlah"],3)}}</td>
                                                        <td style="text-align:center; width:100px">{{round($data[$al->kode_alternatif][$skkey+1]["rata"],3)}}</td>
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
