<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\datadudi;
use Illuminate\Http\Request;

class DatadudiController extends Controller
{
    public function index(){

        $data = datadudi::all();
        if(Auth()->user()->role == 'Admin'){
            return view('datadudi.datadudi',compact('data'));
        }else{
            return view('user.datadudi.datadudi',compact('data'));

        }
    }

    public function tambahdatadudi(){
        if(Auth()->user()->role == 'Admin'){
            return view('datadudi.datadudi',compact('data'));
        }else{
            return view('user.datadudi.datadudi',compact('data'));

        }
    }

    public function insertdatadudi(Request $request){

            $this->validate($request,[
                  'namadudi' => 'required',
                  'namakepdik' => 'required',
                  'alamatdudi' => 'required',
                  'notelepondudi' => 'required',
                  'foto' => 'required',


             ],[
                 'namadudi.required' => 'Harus diisi',
                 'namakepdik.required' => 'Harus diisi',
                 'alamatdudi.required' => 'Harus diisi',
                 'notelepondudi.required' => 'Harus diisi',
                 'foto.required' => 'Harus diisi',

             ]);

            $data = datadudi::create([
                'namadudi' =>$request->namadudi,
                'namakepdik' =>$request->namakepdik,
                'alamatdudi' =>$request->alamatdudi,
                'notelepondudi' =>$request->notelepondudi,
                'foto' =>$request->foto,
            ]);
            // dd($request->all);

            if($request->hasFile('foto')){
                $request->file('foto')->move('fotodudi/', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }

            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Ditambahkan');
            }else{
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Ditambahkan');
            }
        }
        public function tampildatadudi($id){
            $data = datadudi::findOrfail($id);
            //dd($data);

            return view('datadudi.tampildudi', compact('data'));
        }

        public function updatedatadudi(Request $request, $id){
            $data = datadudi::find($id);
            $data2=User::find($data->user_id);
            $data->update([
                'namadudi' =>$request->namadudi,
                'namakepdik' =>$request->namakepdik,
                'alamatdudi' =>$request->alamatdudi,
                'notelepondudi' =>$request->notelepondudi,
                // 'foto' =>$request->foto,

            ]);
                if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = hash_file('md5', $file->path()) . '.' . $file->getClientOriginalExtension();
                $file->move('fotodudi/', $filename);
                $data->foto = $filename;
                $data->save();
            }

            $data2->update([
                'name' =>$data->namadudi,
                'namakepdik' =>$data->namakepdik,
                'alamatdudi' =>$data->alamatdudi,
                'notelepondudi' =>$data->notelepondudi,
            ]);

            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Diupdate');
            }else{
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Diupdate');
            }
        }

        public function deletedatadudi(Request $request,$id){
            $data = datadudi::findorfail($id);
            if (file_exists(public_path('fotodudi/' . $data->foto))) {
                unlink(public_path('fotodudi/' . $data->foto));
            }
            $user = User::findOrfail($data->user_id);
            $data->delete();
            $user->delete();

            if(Auth()->user()->role == 'Admin'){
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Didelete');
            }else{
                return redirect()->route('datadudi')->with('success', 'Data Berhasil Didelete');
            }
        }
}
