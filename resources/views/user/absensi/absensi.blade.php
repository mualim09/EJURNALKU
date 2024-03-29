@extends('siswa.mains')
@section('contents')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            @foreach($setting as $awok)
            <div class="col-6 mt-4">
                <div class="card">
                        <div class="card-body">
                            <h4 class="">Absen Masuk</h4>
                            <hr>
                            <p class="card-text"><strong>Jam Masuk : {{$awok->masuk}}</strong></p>
                            <form method="POST" class="btn btn-fixed-w btn-outline-primary mb-3" action="{{ route('absenmasuk') }}">
                                @csrf
                                <button type="submit"><strong>M a s u k</strong></button>
                            </form>
                        </div>
                </div>
            </div>
            @endforeach
            @foreach($setting as $awok)
            <div class="col-6 mt-4">
                <div class="card">
                        <div class="card-body">
                            <h4 class="">Absen Keluar</h4>
                            <hr>
                            <p class="card-text"><strong>Jam Keluar : {{$awok->keluar}}</strong></p>
                            <form method="POST" class="btn btn-fixed-w btn-outline-primary mb-3" action="{{ route('absenkeluar') }}">
                                @method('put')
                                @csrf
                                <button type="submit"><strong>K e l u a r</strong></button>
                            </form>
                        </div>
                </div>
            </div>
            @endforeach

@foreach($setting as $poke)
@if(!empty($poke->masukk))
    <div class="col-6 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="">Absen Masuk (SHIFT KEDUA)</h4>
                <hr>
                    <p class="card-text"><strong>Jam Masuk : {{$poke->masukk}}</strong></p>
                    <form method="POST" class="btn btn-fixed-w btn-outline-primary mb-3" action="{{ route('absenmasukdua') }}">
                        @csrf
                        <button type="submit"><strong>M a s u k</strong></button>
                    </form>
            </div>
        </div>
    </div>
@endif
@if(!empty($poke->keluarr))
    <div class="col-6 mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="">Absen Keluar (SHIFT KEDUA)</h4>
                <hr>
                    <p class="card-text"><strong>Jam Keluar : {{$poke->keluarr}}</strong></p>
                    <form method="POST" class="btn btn-fixed-w btn-outline-primary mb-3" action="{{ route('absenkeluardua') }}">
                        @method('put')
                        @csrf
                        <button type="submit"><strong>K e l u a r</strong></button>
                    </form>
            </div>
        </div>
    </div>
@endif
@endforeach
<style>
    input[name="daterange"] {
border: 1px solid #ccc;
padding: 5px;
font-size: 15px;
}
</style>

            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Data Seluruh Absen</h4>
                        <ul>
                            <li><h6>Data Absen Anda Masuk Disini !!</h6></li></ul>
                            <a href="/dataabsen" class="btn btn-danger">Izin  <i class="fa-solid fa-sheet-plastic"></i></a>
                            <form method="get" action="/daterangee">
                                <div class="form-group" style="margin-left: 860px">
                                    <label for="date-range">Date Range:</label>
                                    <input type="text" name="daterange" value="" />
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table id="Jurnal" class="table text-center table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nama Siswa</th>
                                            <th scope="col">Waktu Masuk</th>
                                            <th scope="col">Status Masuk</th>
                                            <th scope="col">Waktu Keluar</th>
                                            <th scope="col">Status Keluar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                            @foreach($absen as $hihi)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <th>{{$hihi->created_at}}</th>

                                                <th>{{$hihi->namasiswa->namasiswa}}</th>

                                                <th>{{$hihi->masuk}}</th> <!-- Waktu Masuk -->

                                                @if ($hihi->statusmasuk == 'Hadir')
                                                <td>
                                                    <span class="badge badge-success badge-success ">Hadir</span>
                                                </td>
                                                @elseif ($hihi->statusmasuk == 'Terlambat')
                                                <td>
                                                    <span class="badge badge-success badge-danger ">Terlambat</span>
                                                </td>
                                                @endif



                                                <th>{{$hihi->keluar}}</th> <!-- Waktu Keluar -->

                                                @if ($hihi->statuskeluar == 'Belum Waktunya')
                                                <td>
                                                    <span class="badge badge-success badge-danger ">Belum Waktunya</span>
                                                </td>
                                                @elseif ($hihi->statuskeluar == 'Telah Keluar')
                                                <td>
                                                    <span class="badge badge-success badge-success ">Telah Keluar</span>
                                                </td>
                                                @endif

                                            </tbody>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Progress Table end -->
                </div>
            </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
  var button = document.getElementById("masuk");
  var url = button.dataset.url;

  button.addEventListener("click", function() {
    // Kirim request AJAX ke URL menggunakan jQuery
    $.ajax({
      url: url,
      type: "POST",
      data: {_token: '{{ csrf_token() }}'},
      success: function(data) {
        // Tampilkan pesan sukses dan reload halaman
        alert(data.success);
        location.reload();
      },
      error: function(xhr, textStatus, errorThrown) {
        // Tampilkan pesan error jika terjadi kesalahan
        alert("Terjadi kesalahan: " + xhr.status + " " + xhr.statusText);
      }
    });
  });
</script>
<script type="text/javascript">
    $(function() {
       $('input[name="daterange"]').daterangepicker({
          opens: 'left'
       }, function(start, end, label) {
          console.log("A date range was chosen: " + start.format('Y-m-d') + ' to ' + end.format('Y-m-d'));
       });
    });
 </script>

<script>
  var button = document.getElementById("keluar");
  button.addEventListener("click", function() {
    // kode yang ingin dijalankan saat button diklik
  });
</script>

    </body>

    <script>
        $('.deletesetting').click(function() {
            var kategoriid = $(this).attr('data-id');
            var kategori = $(this).attr('data-kategori');
            swal({
                title: "Yakin Ingin delete Data ?",
                text: "Kamu Yakin Akan Menghapus Data Ini !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletesetting/" + kategoriid + ""
                    swal("Data Berhasil Di Hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data Gagal Di Hapus");
                }
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @endif
    </script>

    <script>
        @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
    <script>
        $('.td-ellipsis').each(function() {
    var isi_konten = $(this).text();

    if (isi_konten.length > 10) { // sesuaikan dengan panjang karakter maksimum yang diinginkan
        isi_konten = isi_konten.substr(0, 10) + '...';
    }

    $(this).html('<div class="summernote-ellipsis">' + isi_konten + '</div>');
    $('.summernote-ellipsis').summernote({
        toolbar: [],
        airMode: true,
        disableResizeEditor: true,
        height: 150,
        focus: false,
        popover: false,
        dialogsInBody: true,
        disableDragAndDrop: true,
        shortcuts: false,
        codeviewFilter: true,
        codeviewIframeFilter: true
    });
    });
    </script>

@endsection
