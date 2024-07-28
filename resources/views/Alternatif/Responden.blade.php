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
                    <li class="breadcrumb-item active">Data Alternatif</li>
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
                        <div class="row mt-3">
                            <div class="col">
                                <div class="float-left">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus Data" data-toggle="modal"
                                        data-target="#hapusAll">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                    <div class="modal fade col-12" tabindex="-1" role="dialog" id="hapusAll">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <h4>Hapus Seluruh Responden Penilaian</h4>

                                                </div>
                                                <di  class="modal-body">
                                                    <p>Apakah Anda yakin Akan Menghapus Seluruh Data Responden  ? </p>
                                                </di>
                                                <div class="modal-footer">
                                                    <a href="{{route('DeletaBatch')}}">
                                                        <button type="button" class="btn btn-danger">Hapus Responden</button>
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="float-right">
                                    {{-- <a href="{{route('RespondenInput')}}">
                                        <button class="btn btn-primary float-right ml-2"><i class="fas fa-plus"></i> Input Responden</button>
                                    </a> --}}
                                    <a href="{{route('InputBatch')}}">
                                        <button class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Data Batch Responden</button>
                                    </a>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body mt-3">
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
                                    <th style="text-align:center">Angkatan</th>
                                    <th style="text-align:center">No HP</th>
                                    <th style="text-align:center">Jenis Kelamin</th>
                                    <th style="text-align:center">Pilihan Wallet</th>
                                    <th style="text-align:center; width:200px;">Aksi</th>
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
                                    <td>{{$at->angkatan}}</td>
                                    <td>0{{$at->no_hp}}</td>
                                    <td>{{$at->kelamin}}</td>
                                    <td>
                                        @php
                                            $pilihanArray = json_decode($at->pilihan);
                                            $pilihanString = implode(', ', $pilihanArray);
                                        @endphp

                                        {{ $pilihanString }}
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{route('RespondenEdit',['id'=> $at->id])}}">
                                            <button type="button" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit Data" data-toggle="modal"
                                            data-target="#hapus{{$no}}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>

                                        <div class="modal fade col-12" tabindex="-1" role="dialog" id="hapus{{$no}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                       <h4>Hapus Responden Penilaian</h4>

                                                    </div>
                                                    <di  class="modal-body">
                                                        <p>Apakah Anda yakin Akan Menghapus Responden {{$at->nama_responden}} ? </p>
                                                    </di>
                                                    <div class="modal-footer">
                                                        <a href="{{route('RespondenDelete',['id'=>$at->id])}}">
                                                            <button type="button" class="btn btn-danger">Hapus Responden</button>
                                                        </a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
