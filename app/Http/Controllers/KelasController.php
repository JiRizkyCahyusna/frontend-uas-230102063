<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $response = Http::get('http://localhost:8080/kelas');
        if ($response->successful()) {
            $kelas = $response->json();
            return view('kelas', ['kelas' => $kelas]);
        }
        return view('kelas', ['kelas' => [], 'error' => 'Gagal mengambil data kelas']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah_kelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'kode_kelas' => 'required',
        'nama_kelas' => 'required',
    ]);

    $response = Http::post('http://localhost:8080/kelas', $validated);

    if ($response->successful()) {
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
    } else {
        return back()->withErrors('Gagal menyimpan data kelas. Silakan coba lagi.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($kode_kelas)
{
     $response = Http::get("http://localhost:8080/kelas/{$kode_kelas}");
    if ($response->successful()) {
        $kelas = $response->json(); // <- ubah di sini
        // dd($kelas);
        return view('edit_kelas', ['kelas' => $kelas]);
    }
    return redirect()->route('kelas.index')->with('error', 'Data kelas tidak ditemukan.');
}


public function update(Request $request, $kode_kelas)
{
    $validatedData = $request->validate([
        'kode_kelas' => 'required',
        'nama_kelas' => 'required',
    ]);

    $response = Http::put("http://localhost:8080/kelas/{$kode_kelas}", $validatedData);

    if ($response->successful()) {
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    return redirect()->back()->withErrors('Gagal memperbarui data kelas.')->withInput();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_kelas)
    {
    $response = Http::delete("http://localhost:8080/kelas/{$kode_kelas}");

    if ($response->successful()) {
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }

    return redirect()->route('kelas.index')->with('error', 'Gagal menghapus data kelas.');
    }
}
