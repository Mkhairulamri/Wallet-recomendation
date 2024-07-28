@include('./Layout/Sidebar')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Input Responden Batch</h4>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Responden</a></li>
                    <li class="breadcrumb-item active">Input Batch</li>
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
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{asset('asset/Excel/FORMAT_UPLOAD_BATCH.xlsx')}}">
                                <button class="btn btn-primary float-right"><i class="fas fa-plus"></i> Download Template file Batch</button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                        @endif
                        <form action="{{route('InsertBatch')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File Batch Responden</label>
                                <input class="form-control" type="file" name="file">
                              </div>
                            <button type="submit" class="btn btn-primary float-right">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('./Layout/Footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#uploadForm').submit(function (e) {
            var fileInput = $('#fileInput');
            var filePath = fileInput.val();
            var allowedExtensions = /(\.xlsx)$/i;

            const alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-success', 'alert-dismissible', 'fade', 'show');
            alertDiv.setAttribute('role', 'alert');
            alertDiv.innerHTML = `
                <strong>Well done!</strong> You successfully showed this alert.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            `;

            if (!allowedExtensions.exec(filePath)) {
                alertDiv.classList.remove('show');
                alertDiv.classList.add('hide');
                e.preventDefault();
                return false;
            }
        });
    });
</script>
