<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use Barryvdh\DomPDF\PDF;
use App\Models\jurusan;
use Barryvdh\DomPDF\PDF;
use App\Models\datasiswa;
use App\Models\tambahjurnal;
use App\Models\dataabsen;
use App\Models\pesan;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TambahjurnalController extends Controller
{
    public function index(){

        $datar = jurusan::all();
        $data = tambahjurnal::with('namasiswa')->where('student_id', auth()->id())->get();
        $data3 = tambahjurnal::with('namasiswa')->get();
        $data2 = tambahjurnal::with('namasiswa')->where('kd_guru',auth()->user()->kd_guru)->get();
        $data4 = tambahjurnal::with('namasiswa')->where('kd_dudi',auth()->user()->kd_dudi)->get();
        $data5 = datasiswa::where('kd_dudi', Auth::user()->kd_dudi)->get();
        $data6 = datasiswa::where('kd_guru', Auth::user()->kd_guru)->get();
        // $data7 = tambahjurnal::with('namasiswa')->whereDate('created_at', Carbon::today())->get();
        $tittle = 'datajurnal';
        // dd($data);
        if(Auth()->user()->role == 'Admin'){
            return view('tambahjurnal.datatambahjurnal',compact('datar','data3'));
        }else if(Auth()->user()->role == 'Guru'){
            return view('userguru.tambahjurnal.datatambahjurnal',compact('data6','tittle'));
        }else if(Auth()->user()->role == 'Dudi'){
            return view('userdudi.tambahjurnal.datatambahjurnal',compact('data5','tittle'));
        }else{
            return view('user.tambahjurnal.datatambahjurnal',compact('data','data2','data4','tittle','data5'));
        }
    }

    public function daterange(Request $request)
{
    $date_range = $request->input('daterange');
    $start_date = Carbon::parse(explode(' - ', $date_range)[0])->startOfDay();
    $end_date = Carbon::parse(explode(' - ', $date_range)[1])->endOfDay();
    $tittle = 'datajurnal';

    $data = tambahjurnal::where('student_id', auth()->id())->whereBetween('created_at', [$start_date, $end_date])->get();

    return view('user.tambahjurnal.datatambahjurnal', compact('data','tittle'));
}
    public function cetakpdf(){
        $data = tambahjurnal::with('namasiswa')->where('student_id', auth()->id())->get();
        $tittle = 'datajurnal';

        return view('user.tambahjurnal.cetakpdf',compact('data','tittle'));
    }
    public function dataa($id){
        $datak = tambahjurnal::with('namasiswa')->where('usersiswa',$id)->get();

        return view('tambahjurnal.dataa',compact('datak'));
    }

    public function jurnalsdudi($id){
        $data4 = tambahjurnal::with('namasiswa')->where('usersiswa',$id)->get();
        $tittle = 'datajurnal';


        return view('userdudi.tambahjurnal.jurnalsdudi',compact('data4','tittle'));
    }
    public function jurnalsguru($id){
        $data8 = tambahjurnal::with('namasiswa')->where('usersiswa',$id)->get();
        $tittle = 'datajurnal';


        return view('userguru.tambahjurnal.jurnalsguru',compact('data8','tittle'));
    }

    public function tambahtambahjurnal(){
        $data = datasiswa::where('namasiswa', Auth::user()->name)->get();
        $tittle = 'datajurnal';
        // $data = datasiswa::where('namasiswa',$id)->get();
        if(Auth()->user()->role == 'Admin'){
            return view('tambahjurnal.tambahtambahjurnal',compact('data'));
        }else{
            return view('user.tambahjurnal.tambahtambahjurnal',compact('data','tittle'));
        }
    }

    public function inserttambahjurnal(Request $request){

            $this->validate($request,[
                  'judul' => 'required',
                  'deskripsi' => 'required',
                  'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
                  'usersiswa' => 'required',
                  // 'statusjurnal' => 'required',

             ],[
                 'judul.required' => 'Judul Harus diisi',
                 'deskripsi.required' => 'Deskripsi Harus diisi',
                 'foto.required' => 'Foto Harus diisi',
                 'foto.mimes' => 'Foto Harus Menggunakan Type File Jpg, Png Atau Jpeg',
                 'foto.max' => 'Foto Tidak Boleh Lebih Dari 2 Mb',
                 'usersiswa.required' => 'Harus diisi',
                 // 'statusjurnal.required' => 'Harus diisi',

             ]);

            $id_siswa = $request->input('usersiswa');
            $absensi = tambahjurnal::where('usersiswa', $id_siswa)
                               ->whereDate('created_at', Carbon::today())
                               ->first();
            if ($absensi) {
                return redirect()->route('datatambahjurnal')->with('error', 'Anda Sudah Mengisi Jurnal Hari Ini !!');
            }

            //  $foto = "";
            //  // dd($request->file('foto')->getClientOriginalName());
            //  if($request->hasFile('foto')){
            //     $request->file('foto')->move('fotodudi/', $request->file('foto')->getClientOriginalName());
            //     $foto = $request->file('foto')->getClientOriginalName();
            // }

            $data = tambahjurnal::create([
                'judul' =>$request->judul,
                'deskripsi' =>$request->deskripsi,
                'foto' =>$request->foto,
                'usersiswa' =>$request->usersiswa,
                'student_id' =>auth()->user()->id,
                'kd_guru'=>auth()->user()->kd_guru,
                'id_jurusan'=>auth()->user()->id_jurusan,
                'kd_dudi'=>auth()->user()->kd_dudi,
                'statusjurnal' => 'Menunggu Persetujuan',


            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = hash_file('md5', $file->path()) . '.' . $file->getClientOriginalExtension();
                $file->move('fotodudi/', $filename);
                $data->foto = $filename;
                $data->save();
            }


            // dd($request->all);



            // toastr()->success('Data Berhasil Ditambahkan!');
            if(Auth()->user()->role == 'Admin'){
            return redirect()->route('datatambahjurnal')->with('Data Berhasil Ditambahkan!');
            }else{
            return redirect()->route('datatambahjurnal')->with('Data Berhasil Ditambahkan!');

            }
        }

        public function tampiltambahjurnal($id){
            $tittle = 'datajurnal';
            $data = tambahjurnal::findOrfail($id);
            $datas = datasiswa::where('namasiswa', Auth::user()->name)->get();
            // $data = tambahjurnal::with('namasiswa')->where('student_id', auth()->id())->get();
        	$data3 = tambahjurnal::with('namasiswa')->get();
        	$data2 = tambahjurnal::with('namasiswa')->where('kd_guru',auth()->user()->kd_guru)->get();
        	$data4 = tambahjurnal::with('namasiswa')->where('kd_dudi',auth()->user()->kd_dudi)->get();
            //dd($data);
            if(Auth()->user()->role == 'Admin'){
                return view('tambahjurnal.tampiltambahjurnal', compact('data','datas'));
            }else if(Auth()->user()->role == 'Guru'){
            	return view('userguru.tambahjurnal.tampiltambahjurnal',compact('data2','tittle'));
        	}else if(Auth()->user()->role == 'Dudi'){
            	return view('userdudi.tambahjurnal.tampiltambahjurnal',compact('data4','data','tittle'));
        	}else{
            	return view('user.tambahjurnal.tampiltambahjurnal',compact('data','data2','data4','datas','tittle'));
        }
        }

        public function updatetambahjurnal(Request $request, $id){
            $data = tambahjurnal::find($id);
            $data->update([
                'judul' =>$request->judul,
                'deskripsi' =>$request->deskripsi,
                'usersiswa' =>$request->usersiswa,
                'statusjurnal' =>'Menunggu Persetujuan',
                // 'foto' =>$request->foto,

            ]);

            if ($request->hasFile('foto')) {
                unlink(public_path('fotodudi/' . $data->foto));
                $file = $request->file('foto');
                $filename = hash_file('md5', $file->path()) . '.' . $file->getClientOriginalExtension();
                $file->move('fotodudi/', $filename);
                $data->foto = $filename;
                $data->save();
            }


            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('datatambahjurnal')->with('success', 'Data Berhasil Diupdate');
                }else{
                return redirect()->route('datatambahjurnal')->with('success', 'Data Berhasil Diupdate');

                }
        }

        public function deletetambahjurnal($id){
            $data = tambahjurnal::find($id);
            $data->delete();
            unlink(public_path('fotodudi/' . $data->foto));
            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('datatambahjurnal')->with('succes', 'Data Berhasil Di Delete');
            }else{
                return redirect()->route('datatambahjurnal')->with('succes', 'Data Berhasil Di Delete');
            }
        }

    // APPROVE JURNAL DITERIMA
    public function statusditerima(Request $request, $id)
    {
            $data = tambahjurnal::find($id);
            $data->update([
                'statusjurnal' => 'Telah Disetujui',
    ]);
        return redirect()->back()->with('success', 'Jurnal Berhasil Di Setujui');
	}
	// UNAPPROVE JURNAL DITOLAK
	public function statusditolak(Request $request, $id)
    {
            $data = tambahjurnal::find($id);
            $data->update([
                'statusjurnal' => 'Jurnal Ditolak',
    ]);
        return redirect()->back()->with('success', 'Jurnal Berhasil Di Tolak');
	}

	public function statusditolak2(Request $request, $id)
    {
      	$data = tambahjurnal::where('statusjurnal','Menunggu Persetujuan')->whereNotNull('pesanjurnal')
      	->where('usersiswa', auth()->id())->get();
        return redirect()->back()->with('success', 'Jurnal Telah Di Tolak');
	}

	public function tolakpesan(Request $request, $id)
	{
		$data = tambahjurnal::where('id',$id)->update([
			'statusjurnal' => 'Jurnal Ditolak',
			'pesanjurnal' => $request->pesanjurnal,
		]);
		return redirect()->back()->with('success', 'Jurnal Berhasil Di Tolak');
	}

	public function update_status(){
		$judul = $this->input->post('judul');
		$statusjurnal = $this->input->post('statusjurnal');
		$tgl_setuju = date('Y-m-d');

		if ($statusjurnal == "Menunggu Persetujuan" OR $statusjurnal == "Jurnal Ditolak") {
			$this->tambahjurnal->update_status($judul, $statusjurnal);
		}else{
			$this->tambahjurnal->update_status1($judul, $statusjurnal, $tgl_setuju);
		}
	}



	public function jurnalhariini()
	{
      	$khususguru = tambahjurnal::with('namasiswa')->where('kd_guru',auth()->user()->kd_guru)->get();
        $data7 = tambahjurnal::where('kd_dudi', auth()->user()->kd_dudi)
                    ->whereDate('created_at', today())
                    ->get();
        $data8 = tambahjurnal::where('kd_guru', auth()->user()->kd_guru)
                    ->whereDate('created_at', today())
                    ->get();

		$data = tambahjurnal::whereDate('created_at', today())->get();
        $data5 = datasiswa::where('kd_dudi', Auth::user()->kd_dudi)->get();
        $guru = tambahjurnal::with('namasiswa')->where('kd_guru',auth()->user()->kd_guru)->get();
		// $data7 = tambahjurnal::whereDate('created_at', Carbon::today())->get();
		$tittle = 'jurnalhariini';

		if(Auth()->user()->role == 'Dudi'){
            return view('userdudi.tambahjurnal.jurnalhariini',compact('data','tittle','data7','data5'));
        }else if(Auth()->user()->role == 'Guru'){
            return view('userguru.tambahjurnal.jurnalhariini',compact('data','tittle','data8','guru','khususguru'));
        }else if(Auth()->user()->role == 'Siswa'){
            return view('user.tambahjurnal.jurnalhariini',compact('data','tittle','data7'));
        }
    }



}
