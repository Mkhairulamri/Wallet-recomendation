@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Data Sub Kriteria Penilaian</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Sub Kriteria</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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
                                    <th style="text-align:center">Kode Sub Kriteria</th>
                                    <th style="text-align:center">Nama Kriteria</th>
                                    <th style="text-align:center">Jumlah Responden</th>
                                    <th style="text-align:center">Bobot</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $param = array();
                                $no = 1;
                                @endphp
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dt->kode_kriteria}}</td>
                                    <td>{{$dt->kode_sub_kriteria}}</td>
                                    <td>{{$dt->nama_sub_kriteria}}</td>
                                    <td>
                                        @php
                                        $jumlah = 0;
                                        $rata = 0;
                                        foreach ($responden as $rp){
                                        if ($rp->pilihan_kriteria == $dt->kode_kriteria){
                                        $jumlah +=1;
                                        }
                                        }
                                        @endphp
                                        {{$jumlah}}
                                    </td>
                                    <td>
                                        @php
                                        if($jumlah != 0){
                                        $rata = round($jumlah/ count($responden),3);
                                        }
                                        @endphp
                                        {{$rata}}
                                    </td>
                                    @php
                                    $param[$dt->id]['jumlah'] = $jumlah;
                                    $param[$dt->id]['rata'] = $rata;
                                    @endphp
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Edit Data" data-toggle="modal"
                                            data-target="#update{{$dt->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col">
                                <div class="float-right">
                                    @php
                                    $queryString = http_build_query($param);
                                    @endphp
                                    <a href="{{route('UpdateBobot').'?'.$queryString}}">
                                        <button class="btn btn-primary float-right ml-2"><i
                                                class="fas fa-update"></i>Update Bobot</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($data as $data)
{{-- Modal Update --}}
<div class="modal fade col-12" tabindex="-1" role="dialog" id="update{{$data->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kriteria Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate="" action="{{route('SubKriteriaUpdate')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="kode"
                                    style="text-transform: uppercase" value={{$data->kode_kriteria}}>
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Sub Kriteria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="" name="kode"
                                    style="text-transform: uppercase" value="{{$data->kode_sub_kriteria}}">
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Sub Kriteria {{$data->nama_sub_kriteria}}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{$data->nama_sub_kriteria}}">
                                <div class="invalid-feedback">
                                    Maaf Form Tidak Boleh Kosong
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$data->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Sub Kriteria</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@include('./Layout/Footer')
