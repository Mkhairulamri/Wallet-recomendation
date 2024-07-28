@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Data Kriteria Penilaian</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
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
            <div class="col-md-8">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
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
                                @foreach ($data as $key=>$dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt['kode']}}</td>
                                    <td>{{$dt['nama']}}</td>
                                    <td>{{$dt['preferensi']}}</td>
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
        </div>
    </div>
</div>

@include('./Layout/Footer')
