@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Normalisasi Terbobot</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Penghitungan</a></li>
                    <li class="breadcrumb-item active">Normalisasi</li>

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
                        <h4>Penghitungan Prefernsi Alternatif</h4>
                    </div>
                    <div class="card-body items-center">
                        <div class="row">
                        @foreach ($alternatif as $alkey=>$al)
                            <div class="col-sm-3 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        Frekuensi {{$al->nama_alternatif}}
                                    </div>
                                    <div class="card-body">
                                        <table class="table-bordered ml-4">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center; width: 100px; height:30px">#</th>
                                                    <th style="text-align:center; width:100px">Normalisasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($subKriteria as $skkey=>$kr)
                                                @php
                                                    $array = $data[$al->kode_alternatif]
                                                @endphp
                                                    <tr>
                                                        <td style="text-align:center; width:50px"><bold>Y{{$alkey+1}}{{$skkey+1}}</bold></td>
                                                        <td style="text-align:center; width:100px">{{round($data[$al->kode_alternatif][$skkey+1],3)}}</td>
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
