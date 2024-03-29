@extends('siswa.mains')
@section('contents')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="main-content-inner">
        <div class="row">
            <!-- Progress Table start -->
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card_title">Edit Data Jurnal</h4>
                        <br>
                        <ul>
                            <!-- <li><h6>Seluruh Siswa Ada Disini</h6></li></ul> -->

                            <div class="single-table">
                                <div class="table-responsive">



                                    <form action="/updatetambahjurnal/{{ $data->id }}" method="POST" enctype="multipart/form-data" >

                                        @csrf

                                        <div class="mb-3">
                                            {{-- <label for="exampleInputEmail1" class="form-label"><h6>Nama Siswa</h6></label> --}}
                                            @foreach ( $datas as $a)
                                            <input type="hidden" name="usersiswa" class="form-control form-control-lg input-rounded mb-4"
                                            id="exampleInputEmail1" readonly aria-describedby="emailHelp" placeholder="Halaman"
                                            value="{{ $a->id }}">
                                            @endforeach
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label"><h6>Nama Siswa</h6></label>
                                                @foreach ( $datas as $c)
                                                <input type="text" name="" class="form-control form-control-lg input-rounded mb-4"
                                                id="exampleInputEmail1" readonly aria-describedby="emailHelp" placeholder="Halaman"
                                                value="{{ $c->namasiswa }}">
                                                @endforeach
                                            <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label"><h6>Judul</h6></label>
                                                <input type="text" name="judul" class="form-control form-control-lg input-rounded mb-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Isi Judul Jurnal" value="{{ $data->judul }}">
                                            </div>

                                            <section style="padding-top:60px;">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="exampleInputEmail1" class="form-label"><h6>Deskripsi</h6></label>
                                                            <div class="col-lg-12 mt-4">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <!-- <h4 class="card_title">Summernote Editor</h4> -->
                                                                        <textarea class="summer_note_editor" placeholder="Masukkan Deskripsi Jurnal" name="deskripsi" readonly="">{!! $data->deskripsi !!}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <br>

                                            <div class="form-group">
                                                    {{-- <label class="col-form-label"><h6>Status Jurnal</h6></label> --}}
                                                    <select class="form-control" hidden id="statusjurnal" name="statusjurnal">
                                                        <option selected disabled="">- Pilih Status -</option>
                                                        <option value="Menunggu Persetujuan" {{ $data->statusjurnal == 'Menunggu Persetujuan' ? 'selected' : '' }}>Menunggu Persetujuan</option>
                                                        <option value="Telah Disetujui" {{ $data->statusjurnal == 'Telah Disetujui' ? 'selected' : '' }}>Telah Disetujui</option>
                                                        <option value="Jurnal Ditolak" {{ $data->statusjurnal == 'Jurnal Ditolak' ? 'selected' : '' }}>Jurnal Ditolak</option>

                                                    </select>
                                                </div>

                                            <div class="mb-3">
                                                    <label for="foto" class="form-check-labell"><h5>Update Foto</h5></label>
                                                    <br><img class="img mb-3" src="{{ asset('fotodudi/'.$data->foto) }}"
                                                    alt="" style="width:80px"></br>
                                                    <input type="file" name="foto" class="form-control" >
                                            </div>


                                            <br>

                                            <button type="submit" class="btn btn-rounded btn btn-primary mb-3"><i class="ion-paper-airplane"></i>Update Data</button>
                                            <a href="/datatambahjurnal" class="btn btn-rounded btn-fixed-w btn-danger mb-3"><i class="ion-ios-undo"></i>Kembali</a>

                                        </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Progress Table end -->
</div>
</div>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable();
    });
</script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
  </script>

</body>

@endsection
