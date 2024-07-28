@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Data Alternatif Pilihan</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Data Responden Guest</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- alert --}}
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px;">#</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">NIM</th>
                                    <th style="text-align:center">Email</th>
                                    {{-- <th style="text-align:center">Angkatan</th> --}}
                                    <th style="text-align:center">No HP</th>
                                    <th style="text-align:center">Jenis Kelamin</th>
                                    {{-- <th style="text-align:center">Pilihan Kriteria</th> --}}
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $at)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$at->nama_responden}}</td>
                                    <td>{{$at->nim}}</td>
                                    <td>{{$at->email}}</td>
                                    {{-- <td>{{$at->angkatan}}</td> --}}
                                    <td>{{$at->no_hp}}</td>
                                    <td>{{$at->kelamin}}</td>
                                    {{-- <td>
                                        @foreach ($kriteria as $kr)
                                            @if ($kr->kode_kriteria == $at->kriteria)
                                                {{$kr->nama_kriteria}}
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td style="text-align: center">
                                        <a href="{{route('RespondenGuessView',['id'=> $at->id])}}">
                                            <button type="button" class="btn btn-primary">
                                                <i class="fas fa-eye"></i> Lihat
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('./Layout/Footer')
