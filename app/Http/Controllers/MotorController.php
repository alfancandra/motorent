<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Motor::get()->toArray();
        return view('motor.index',compact('data'));
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
            'nama' =>  'required',
            'stok' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
            'img' => 'required',
            'img.*' => 'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG'
        ]);
        $data = new Motor();

        // Store image
        $imageName = time().'.'.$request->img->extension();  
        $request->img->move(public_path('images'), $imageName);

        // Store Data
        $data['nama'] = $request->nama;
        $data['stok'] = $request->stok;
        $data['harga'] = $request->harga;
        $data['jenis'] = $request->jenis;
        $data['img'] = $imageName;
        
        $data->save();
        return redirect()->route('login.motor.index')
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
        $data = Motor::get()->toArray();
        $find = Motor::find($id);
        return view('motor.index',['data' => $data, 'find' => $find, 'edit' => true]);
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
        $request->validate([
            'nama' =>  'required',
            'stok' => 'required',
            'harga' => 'required',
            'jenis' => 'required',
        ]);

        $data = Motor::find($id);
        $data->nama = $request->nama;
        $data->stok = $request->stok;
        $data->harga = $request->harga;
        $data->jenis = $request->jenis;
        $data->save();

        // redirect
        return redirect()->route('login.motor.index')
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
        $data = Motor::find($id);
        if($data->sewa->count() > 0){
            // redirect
            return redirect()->route('login.motor.index')
            ->with('success', 'Gagal Hapus Data, terdapat data motor yang digunakan');
        }else{
            $data->delete();
            // redirect
            return redirect()->route('login.motor.index')
            ->with('success', 'Berhasil Hapus Data');
        }
    }
}
