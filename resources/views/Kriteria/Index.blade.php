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
                                    <th style="text-align:center">Kode Kriteria</th>
                                    <th style="text-align:center">Nama Kriteria</th>
                                    <th style="text-align:center">Atribut</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kriterias as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->kode_kriteria}}</td>
                                    <td>{{$dt->nama_kriteria}}</td>
                                    <td>{{$dt->tipe}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit Data" data-toggle="modal"
                                            data-target="#edit{{$no}}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <div class="modal fade col-12" tabindex="-1" role="dialog" id="edit{{$no}}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Kriteria Penilaian</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="needs-validation" novalidate="" action="{{route('KriteriaUpdate')}}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Kode Kriteria</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" required="" name="kode" style="text-transform: uppercase" value="{{$dt->kode_kriteria}}" disabled/>
                                                                        <div class="invalid-feedback">
                                                                            Maaf Form Tidak Boleh Kosong
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Nama Kriteria</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" required="" name="nama" value="{{$dt->nama_kriteria}}" />
                                                                        <div class="invalid-feedback">
                                                                            Maaf Form Tidak Boleh Kosong
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Atribut</label>
                                                                    <div class="row mt-2 ml-2">
                                                                        <div class="form-check col">
                                                                            <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault1" value="Cost"
                                                                            @if ($dt->tipe == "Cost")
                                                                                checked
                                                                            @endif
                                                                            disabled/>
                                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                                Cost
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check col">
                                                                            <input class="form-check-input" type="radio" name="atribut" id="flexRadioDefault2" value="Benefit"
                                                                            @if ($dt->tipe == "Benefit")
                                                                            checked
                                                                            @endif
                                                                            disabled/>
                                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                                Benefit
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="kode_kriteria" value={{$dt->kode_kriteria}}>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Update Kriteria</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width: 10px;">#</th>
                                    <th style="text-align:center">Kode Kriteria</th>
                                    <th style="text-align:center">Nama Kriteria</th>
                                    <th style="text-align:center">Atribut</th>
                                    <th style="text-align:center">Aksi</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('./Layout/Footer')
