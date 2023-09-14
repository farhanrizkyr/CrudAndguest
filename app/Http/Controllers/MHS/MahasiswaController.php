<?php

namespace App\Http\Controllers\MHS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs=Mahasiswa::latest()->get();
       return view('Mhs.mhs',compact('mhs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Request()->validate([
        'name'=>'required',
        'npm'=>'required',
        'gender'=>'required',

        ]);

        Mahasiswa::create([
         'name'=>request()->name,
         'npm'=>request()->npm,
         'gender'=>request()->gender,

        ]);

        return redirect('/mahasiswa')->with('pesan','Data Berhasil Di Tambahkan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
        Request()->validate([
        'name'=>'required',
        'npm'=>'required',
        'status'=>'required',
        'gender'=>'required',

        ]);

        Mahasiswa::find($id)->update([
         'name'=>request()->name,
         'npm'=>request()->npm,
         'gender'=>request()->gender,
         'status'=>request()->status,
         'semester'=>request()->semester,

        ]);

        return redirect('/mahasiswa')->with('pesan','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data=Mahasiswa::find($id);
       $data->delete();
       return redirect('/mahasiswa')->with('pesan','Data Berhasil Di Hapus');
    }
}
