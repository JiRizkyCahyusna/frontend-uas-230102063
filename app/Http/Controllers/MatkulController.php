<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                 $response = Http::get('http://localhost:8080/matkul');
        if ($response->successful()) {
            $matkul = $response->json();
            return view('matkul', ['matkul' => $matkul]);
        }
        return view('matkul', ['matkul' => [], 'error' => 'Gagal mengambil data matkul']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_matkul');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
         try {
            $validate = $request->validate([
                'kode_matkul' => 'required',
                'nama_matkul' => 'required',
                'sks' => 'required',
            ]);

            Http::asForm()->post('http://localhost:8080/matkul', $validate);

            return redirect()->route('matkul.index')->with('success', 'Matkul berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($kode_matkul)
{
    $response = Http::get("http://localhost:8080/kelas/$kode_matkul");
    if ($response->successful()) {
        $matkul = (object) $response->json(); // <- ubah di sini
        // dd($matkul);
        return view('edit_matkul', ['matkul' => $matkul]);
    }
    return redirect()->route('matkul.index')->with('error', 'Data matkul tidak ditemukan.');
}


public function update(Request $request, $kode_matkul)
{
    $validatedData = $request->validate([
    'kode_matkul' => 'required',
                'nama_matkul' => 'required',
                'sks' => 'required',
            ]);

    $response = Http::put("http://localhost:8080/matkul/{$kode_matkul}", $validatedData);

    if ($response->successful()) {
        return redirect()->route('matkul.index')->with('success', 'Data matkul berhasil diperbarui.');
    }

    return redirect()->back()->withErrors('Gagal memperbarui data matkul.')->withInput();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_matkul)
    {
    $response = Http::delete("http://localhost:8080/matkul/{$kode_matkul}");

    if ($response->successful()) {
        return redirect()->route('matkul.index')->with('success', 'Data matkul berhasil dihapus.');
    }

    return redirect()->route('matkul.index')->with('error', 'Gagal menghapus data matkul.');
    }
}
