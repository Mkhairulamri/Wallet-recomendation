@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Guess Responen View</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url()->previous()}}">Responden</a></li>
                    <li class="breadcrumb-item active">View</li>
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
                        <form class="needs-validation" novalidate="" action="{{route('RespondenInsert')}}" method="POST" id="regForm">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="tab">
                                    <h4>Info Responden</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Nama</label>
                                          <input type="text" class="form-control" name="nama" value="{{$data->nama_responden}}" disabled >
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">NIM</label>
                                          <input type="number" class="form-control" name="nim" value="{{$data->nim}}" disabled>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <label for="inputEmail4">Email</label>
                                          <input type="Email" class="form-control" name="email" value="{{$data->email}}" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">No HP</label>
                                          <input type="text" class="form-control" name="nohp" value="{{$data->no_hp}}" disabled>
                                        </div>
                                      </div>
                                      <div class="form-row">
                                        {{-- <div class="form-group col-md-6">
                                          <label for="inputEmail4">Angkatan</label>
                                          <input type="text" class="form-control" name="nohp" value="{{$data->angkatan}}" disabled>
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                          <label for="inputPassword4">Jenis Kelamin</label>
                                          <div class="form-row ml-4 mt-2">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kelamin" disabled
                                                    @if ($data->kelamin == 'Laki-Laki')
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
                                                    <input class="form-check-input" type="radio" name="kelamin" disabled
                                                    @if ($data->kelamin == 'Perempuan')
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
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h3 class="mr-4">Hasil Rekomendasi Wallet</h3>
                        <div class="col-sm-8 m-lg-8 align-content-center">
                            @php
                                $no = 1;
                                $rekom = json_decode($data->rekomendasi);
                             //    dd($rekom);
                            @endphp
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
                                 @foreach ($rekom as $key=>$dt)
                                 <tr>
                                     <td>{{$no++}}</td>
                                     <td>{{$rekom[$key]->kode}}</td>
                                     <td>{{$rekom[$key]->nama}}</td>
                                     <td>{{$rekom[$key]->preferensi}}</td>
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

<link rel="stylesheet" href="{{asset('css/NextStep.css')}}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/NextStep.js')}}"></script>

