@extends('layout.main')
@section('content')
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">

</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- ========== App Menu ========== -->
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Tambah Data Plotingan</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Data Siswa</a></li>
                                        <li class="breadcrumb-item active">Tambah Data Plotingan</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                   <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tambah Data Plotingan</h5>

                                </div>
                                <div class="card-body">
                                    <form action="/insertdataplotingan" method="POST" enctype="multipart\form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="namasiswap" class="form-label"><h5>Nama Siswa</h5></label>
                                    <select class="form-control" name="namasiswap[]" id="select-state" autocomplete="off">
                                        <option value="" selected disabled>Pilih Siswa</option>
                                        @foreach($siswa as $hi)
                                        <option value="{{ $hi->id }}">{{ $hi->namasiswa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('namasiswap')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                                
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><h5>Nama Guru</h5></label>
                                    <select class="form-select" name="namagurup" id="guruselect">
                                        <option value="" selected disabled>Pilih Guru</option>
                                        @foreach($guru as $hi)
                                        <option value="{{ $hi->id }}">{{ $hi->namaguru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('namagurup')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><h5>Nama Dudi</h5></label>
                                    <select class="form-select" name="namadudip" id="dudiselect">
                                        <option value="" selected disabled>Pilih Dudi</option>
                                        @foreach($dudi as $rapli)
                                        <option value="{{ $rapli->id }}" data-alamatdudip="{{ $rapli->alamatdudi }}">{{ $rapli->namadudi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('namadudip')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <br>
                                <!-- <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><h5>Alamat Dudi</h5></label>
                                    <input type="text" name="alamatdudip" class="form-control" id="alamatdudip"
                                    aria-describedby="emailHelp" placeholder="Masukkan Alamat Dudi" readonly="">
                                    @error('alamatdudip')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <br>
                                <br> -->

                                
                                <button type="submit" class="btn btn-primary">Submit Data</button>
                                <a href="/dataplotingan" class="btn btn-danger mb-10"><i class="ri-reply-fill align-middle me-2"></i>Kembali</a>

                            </form>

                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->

    <!-- JAVASCRIPT -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <!-- DataTablesScript -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#Jurnal').DataTable();
            });
        </script>

        <script>
            new TomSelect("#select-state",{
	maxItems: 3
});
        </script>
        <script>
            new TomSelect("#guruselect",{
    maxItems: 1
});
        </script>
        <script>
            new TomSelect("#dudiselect",{
    maxItems: 1
});
        </script>

        <!-- <script>
            const namadudip = document.getElementById('namadudip')
            namadudip.onchange = function(e) {
            const alamatdudip = e.target.options[e.target.selectedIndex].dataset.alamatdudip
            document.getElementById('alamatdudip').value = alamatdudip;
            }
        </script> -->

        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    </body>



</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/materialart/html/ltr/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 Jan 2023 14:20:10 GMT -->
</html>
@endsection
