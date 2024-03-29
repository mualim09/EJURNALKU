<?php

namespace App\Http\Controllers;
use App\Models\dataplotingan;
use Illuminate\Http\Request;
use App\Models\dataguru;
use App\Models\datasiswa;
use App\Models\datadudi;
use App\Models\plotsiswa;
use Illuminate\Support\Facades\Schema;
use toastr;

class DataplotinganController extends Controller
{
    public function index(){

            $data = Dataplotingan::with(['plotsiswa.siswas'])->get();
            // $siswa = plotsiswa::all();
            // $data = dataplotingan::all();
            // dd($data);
            $plotsiswa = plotsiswa::all();


            $guru = dataguru::all();
            $siswa = datasiswa::all();
            $dudi = datadudi::all();
            $tittle = 'dataplotingan';
        if(Auth()->user()->role == 'Admin'){
            return view('dataplotingan.dataplotingan',compact('data','guru','siswa','dudi','plotsiswa'));
        }else if(Auth()->user()->role == 'Guru'){
            return view('userguru.dataplotingan.dataplotingan',compact('data','tittle'));
        }else if(Auth()->user()->role == 'Dudi'){
            return view('userdudi.dataplotingan.dataplotingan',compact('data','tittle'));
        }else{
            return view('user.dataplotingan.dataplotingan',compact('data','tittle'));
        }
    }
    public function tambahdataplotingan(){
            $data = dataplotingan::all();
            $guru = dataguru::all();
            $siswa = datasiswa::all();
            $dudi = datadudi::all();
        if(Auth()->user()->role == 'Admin'){
            return view('dataplotingan.tambahdataplotingan',compact('data','guru','siswa','dudi'));
        }else{
            return view('user.dataplotingan.tambahdataplotingan');
        }
    }

    public function insertdataplotingan(Request $request){

             $this->validate($request,[
                 'namagurup' => 'required',
                 'namasiswap' => 'required',
                 'namadudip' => 'required',
                 // 'alamatdudip' => 'required',
             ],[
                 'namagurup.required' => 'Harus diisi',
                 'namasiswap.required' => 'Harus diisi',
                 'namadudip.required' => 'Harus diisi',
                 // 'alamatdudip.required' => 'Harus diisi',
             ]);

            $data = dataplotingan::create([
                'namagurup' =>$request->namagurup,
                'namadudip' =>$request->namadudip,
                // 'alamatdudip' =>$request->alamatdudip,
            ]);
        
        $namasiswap = $request->namasiswap;
        foreach ($namasiswap as $siswa) 
    {
        Plotsiswa::create([
            'idplot' => $data->id,
            'plotnamasiswa' => $siswa,
        ]);
    }
            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('dataplotingan')->with('success', 'Data Berhasil Ditambahkan');
            }
        }

        public function tampildataplotingan($id){
            $data = dataplotingan::findOrfail($id);
            $guru = dataguru::all();
            $siswa = datasiswa::all();
            $dudi = datadudi::all();
            //dd($data);
            if(Auth()->user()->role == 'Admin'){
                return view('dataplotingan.tampildataplotingan',compact('data','guru','siswa','dudi'));
            }else{
                return view('user.dataplotingan.tampildataplotingan',compact('data'));
            }
        }

        public function updatedataplotingan(Request $request, $id){
            $data = dataplotingan::find($id);
            $data->update([
                'namagurup' =>$request->namagurup,
                'namasiswap' =>implode(',',$request->namasiswap),
                'namadudip' =>$request->namadudip,
                'alamatdudip' =>$request->alamatdudip,

            ]);
            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('dataplotingan')->with('success', 'Data Berhasil Di Update');
            }else{
                return redirect()->route('dataplotingan')->with('success', 'Data Berhasil Di Update');
            }
        }

        public function deletedataplotingan($id){
            $data = dataplotingan::find($id);
            $data->delete();
            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('dataplotingan')->with('success', 'Data Berhasil Di Delete');
            }else{
                return redirect()->route('dataplotingan')->with('success', 'Data Berhasil Di Delete');
            }
        }

        public function deleteall()
        {
            Schema::disableForeignKeyConstraints();
            \App\Models\dataplotingan::truncate();
            Schema::enableForeignKeyConstraints();

            return redirect()->route('dataplotingan')->with('success','Seluruh Data Berhasil Di Hapus');
        }
}
