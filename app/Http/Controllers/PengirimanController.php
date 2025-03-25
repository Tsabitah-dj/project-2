<?php

namespace App\Http\Controllers;

use App\Models\pengiriman;
use App\Models\karyawan; // Pastikan model Karyawan sudah ada
use App\Models\barang; // Pastikan model Barang sudah ada
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = pengiriman::all();
        return view('pengiriman.index',['pengiriman'=>$pengiriman]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barang::all();
        return view('pengiriman.create', compact( 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'alamat' => 'required|string|max:255',
        ]);

        // Create a new pengiriman instance
        $pengiriman = new pengiriman();
        $pengiriman->username = $request->username;
        $pengiriman->barang_id = $request->barang_id;
        $pengiriman->jumlah = $request->jumlah;
        $pengiriman->alamat = $request->alamat;

        // Save to the database
        $pengiriman->save();

        // Redirect to index with success message
        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil disimpan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(pengiriman $pengiriman)
    {
        return view('pengiriman.review', compact('pengiriman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pengiriman $pengiriman)
    {
        // Retrieve the existing pengiriman data
        $barang = barang::all();
        return view('pengiriman.edit', compact('pengiriman', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pengiriman $pengiriman)
    {
        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:225',
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
            'alamat' => 'required|string|max:255',
        ]);

        // Update the existing pengiriman instance
        $pengiriman->username = $request->username;
        $pengiriman->barang_id = $request->barang_id;
        $pengiriman->jumlah = $request->jumlah;
        $pengiriman->alamat = $request->alamat;

        // Save the changes to the database
        $pengiriman->save();

        // Redirect to index with success message
        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pengiriman $pengiriman)
    {
        // Delete the existing pengiriman instance
        $pengiriman->delete();

        // Redirect to index with success message
        return redirect()->route('pengiriman.index')->with('success', 'Data pengiriman berhasil dihapus.');
    }
}
