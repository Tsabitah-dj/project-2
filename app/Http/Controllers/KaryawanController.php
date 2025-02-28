<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index',['karyawan'=>$karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nip' =>'required',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ],[
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'nama_karyawan.required' => 'Nama Tidak Boleh Kosong',
            'gaji_karyawan.required' => 'Gaji Tidak Boleh Kosong',
            'alamat.required' => 'Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Tidak Boleh Kosong',
        ]);

        $karyawan = [
            'nip' => $request->input('nip'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'gaji_karyawan' => $request->input('gaji_karyawan'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];
        Karyawan::create($karyawan);
        return redirect('karyawan')->with('karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::where('nip', $id)->first();
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip' =>'required',
            'nama_karyawan' => 'required',
            'gaji_karyawan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ],[
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'nama_karyawan.required' => 'Nama Tidak Boleh Kosong',
            'gaji_karyawan.required' => 'Gaji Tidak Boleh Kosong',
            'alamat.required' => 'Tidak Boleh Kosong',
            'jenis_kelamin.required' => 'Tidak Boleh Kosong',
        ]);

        $karyawan->update($request->all());
        return redirect('Karyawan')->with('karyawan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('Karyawan')->with('karyawan berhasil dihapus');
    }
}
