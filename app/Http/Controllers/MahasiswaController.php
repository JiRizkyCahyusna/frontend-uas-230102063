<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                 $response = Http::get('http://localhost:8080/mahasiswa');

        if ($response->successful()) {
            $mahasiswa = collect($response->json())->sortBy('npm')->values();
            return view('mahasiswa', compact('mahasiswa'));
        } else {
            return back()->with('error', 'Gagal mengambil data mahasiswa');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $kelasResponse = Http::get('http://localhost:8080/kelas'); 
    $userResponse = Http::get('http://localhost:8080/user');   

    // Cek apakah keduanya berhasil
    if ($kelasResponse->successful() && $userResponse->successful()) {
        // Olah data agar terurut seperti di script kedua
        $kelas = $kelasResponse->json();
        $user = $userResponse->json();

        return view('tambah_mahasiswa', compact('kelas', 'user'));
    }

    // Jika salah satu gagal, tetap kirim view tapi kosong
    return view('tambah_mahasiswa', ['kelas' => [], 'user' => []])
        ->withErrors(['msg' => 'Gagal mengambil data dari API']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'npm' => 'required',
        'nama_mahasiswa' => 'required',
        'kode_kelas' => 'required',
        'id_user' => 'required',
    ]);

    $response = Http::post('http://localhost:8080/mahasiswa', $validated);

    if ($response->successful()) {
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    } else {
        return back()->withErrors('Gagal menyimpan data mahasiswa. Silakan coba lagi.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($npm)
{
    $mahasiswaResponse = Http::get("http://localhost:8080/mahasiswa/{$npm}");
    $kelasResponse = Http::get("http://localhost:8080/kelas");
    $userResponse = Http::get("http://localhost:8080/user");

    if (
        $mahasiswaResponse->successful() &&
        $kelasResponse->successful() &&
        $userResponse->successful()
    ) {
        $mahasiswa = $mahasiswaResponse->json();
        // Kalau ternyata bentuknya [ {..} ], ambil index pertama
        if (is_array($mahasiswa) && isset($mahasiswa[0])) {
            $mahasiswa = $mahasiswa[0];
        }

        $kelas = $kelasResponse->json();
        $user = $userResponse->json();

        return view('edit_mahasiswa', compact('mahasiswa', 'kelas', 'user'));
    }

    return redirect()->route('mahasiswa.index')->with('error', 'Gagal mengambil data.');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $npm)
    {
         $validatedData = $request->validate([
        'npm' => 'required',
        'nama_mahasiswa' => 'required',
        'id_user' => 'required',
        'kode_kelas' => 'required',
    ]);

    $response = Http::put("http://localhost:8080/mahasiswa/$npm", $validatedData);

    if ($response->successful()) {
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    return redirect()->back()->withErrors('Gagal memperbarui data mahasiswa.')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($npm)
    {
          $response = Http::delete("http://localhost:8080/mahasiswa/$npm");

    if ($response->successful()) {
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    return redirect()->route('mahasiswa.index')->with('error', 'Gagal menghapus data mahasiswa.');
    }

public function exportPdf()
{
    $response = Http::get('http://localhost:8080/mahasiswa');
    $mahasiswa = $response->json();

    $pdf = Pdf::loadView('mahasiswa_pdf', ['mahasiswa' => $mahasiswa]);
    return $pdf->stream('data_mahasiswa.pdf');
}

}
