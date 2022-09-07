<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Sewa;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sewa::with('motor')->orderBy('created_at','DESC')->get()->toArray();
        $motor = Motor::get();
        return view('sewa.index',['data' => $data, 'motor' => $motor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_lengkap' =>  'required',
            'hp' => 'required',
            'alamat' => 'required',
            'id_motor' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jaminan' => 'required'
        ]);
        $data = new Sewa();
        // Store Data
        $data['nama_lengkap'] = $request->nama_lengkap;
        $data['hp'] = $request->hp;
        $data['alamat'] = $request->alamat;
        $data['id_motor'] = $request->id_motor;
        $data['tanggal_mulai'] = $request->tanggal_mulai;
        $data['tanggal_selesai'] = $request->tanggal_selesai;
        $data['jaminan'] = $request->jaminan;

        $data->save();
        return redirect()->route('login.sewa.index')
            ->with('success', 'Berhasil Tambah Data');
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
        $data = Sewa::with('motor')->orderBy('created_at','DESC')->get()->toArray();
        $find = Sewa::find($id);
        $motor = Motor::get();
        return view('sewa.index',['data' => $data, 'find' => $find, 'motor' => $motor, 'edit' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'nama_lengkap' =>  'required',
            'hp' => 'required',
            'alamat' => 'required',
            'id_motor' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jaminan' => 'required'
        ]);
        $data = Sewa::find($id);
        // Store Data
        $data['nama_lengkap'] = $request->nama_lengkap;
        $data['hp'] = $request->hp;
        $data['alamat'] = $request->alamat;
        $data['id_motor'] = $request->id_motor;
        $data['tanggal_mulai'] = $request->tanggal_mulai;
        $data['tanggal_selesai'] = $request->tanggal_selesai;
        $data['jaminan'] = $request->jaminan;

        $data->save();
        return redirect()->route('login.sewa.index')
            ->with('success', 'Berhasil Edit Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sewa::find($id);
        $data->delete();

        // redirect
        return redirect()->route('login.sewa.index')
        ->with('success', 'Berhasil Hapus Data');
    }
}
