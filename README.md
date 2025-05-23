
# 🎓 SISTEM INFORMASI MONITORING KEHADIRAN MAHASISWA 

## 📖 Deskripsi Sistem

Sistem Monitoring Kehadiran Mahasiswa adalah aplikasi berbasis web yang digunakan untuk mencatat, memonitor, dan mengelola kehadiran mahasiswa selama proses pembelajaran berlangsung. Sistem ini membantu dosen dan admin akademik dalam:

- Mencatat kehadiran mahasiswa secara real-time
- Melacak tingkat kehadiran setiap mahasiswa di setiap mata kuliah
- Menghasilkan laporan kehadiran untuk evaluasi dan keperluan administrasi
- Memudahkan mahasiswa melihat riwayat kehadiran mereka secara transparan

## 🧾 Prasyarat

Pastikan kamu sudah meng-install:

- 🖥️ **Laragon** → [Download di sini](https://laragon.org)
- 🧰 **Git** (terpasang otomatis di Laragon)
- 📦 **Composer** (terpasang otomatis di Laragon)
- 🌐 Browser (Chrome/Edge)

---

## 📥 Cara Clone & Install Backend

### 1️⃣ Clone Repositori

```bash
git clone https://github.com/NalindraDT/Simon-kehadiran.git backend_simon
cd backend
```

### 2️⃣ Install Dependency

```bash
composer install
```

### 3️⃣ Copy File Environment

```bash
cp env example .env
```

### 4️⃣ Import Database

📂 **Link Repository Database:**
https://github.com/JiRizkyCahyusna/DBE_Simon

📝 **Langkah-langkah:**
1. Buka link di atas.
2. Cari file `simon_kehadiran.sql`.
3. Klik dan buka file tersebut.
4. Klik "Download raw file".
5. Simpan file ke folder komputermu, contoh: `C:\laragon\`.

🗃️ **Import Database via phpMyAdmin:**

1. 🚀 Jalankan Laragon.
2. 🖱️ Klik kanan ikon Laragon > **Database > phpMyAdmin**.
3. ➕ Klik **New**, beri nama (misalnya `db_uas_230102063`), lalu klik **Create**.
4. 📤 Klik nama database > Tab **Import** > Pilih file SQL > Klik **Go**.

### 5️⃣ Jalankan Backend

```bash
php spark serve
```

🌐 Akses di browser: [http://localhost:8080](http://localhost:8080)

---

## 🔌 Cek Endpoint API via Postman

A. Mahasiswa

GET mahasiswa : http://localhost:8080/mahasiswa

POST mahasiswa : http://localhost:8080/mahasiswa

PUT mahasiswa : http://localhost:8080/mahasiswa/{npm}

DELETE mahasiswa : http://localhost:8080/mahasiswa/{npm}

B. Dosen

GET dosen : http://localhost:8080/dosen

POST dosen : http://localhost:8080/dosen

PUT dosen : http://localhost:8080/dosen/{nidn}

DELETE dosen : http://localhost:8080/dosen/{nidn}

C. Kelas

GET kelas : http://localhost:8080/kelas

POST kelas : http://localhost:8080/kelas

PUT kelas : http://localhost:8080/kelas/{id_kelas}

DELETE kelas : http://localhost:8080/kelas/{id_kelas}

D. Matkul

GET matkul : http://localhost:8080/matkul

POST matkul : http://localhost:8080/matkul

PUT matkul : http://localhost:8080/matkul/{kode_matkul}

DELETE matkul : http://localhost:8080/matkul/{kode_matkul}

E. User

GET user : http://localhost:8080/user

POST user : http://localhost:8080/user

PUT user : http://localhost:8080/user/{id_user}

DELETE user : http://localhost:8080/user/{id_user}

F. Kehadiran

GET kehadiran : http://localhost:8080/kehadiran1

POST kehadiran: http://localhost:8080/kehadiran1

PUT kehadiran : http://localhost:8080/kehadiran1/{id_kehadiran}

DELETE kehadiran : http://localhost:8080/kehadiran1/{id_kehadiran}

## 🌐 Setup Frontend

### 1️⃣ Buat Project Laravel

🔧 Melalui Laragon:
- Klik kanan ikon **Laragon**
- Pilih **Quick App > Laravel**

📟 Atau melalui terminal:
```bash
composer create-project laravel/laravel nama-projek
```

### 2️⃣ Tambahkan Nama Folder (Opsional)
Contoh: `FrontEnd`

### 3️⃣ Ubah Session Driver di `.env`

```env
SESSION_DRIVER=file
```

### 4️⃣ Buat View 

A. 🛠️ Jalankan perintah berikut:
```bash
php artisan make:view dashboard
php artisan make:view mahasiswa
```

- Jika perintah di atas tidak berhasil (misalnya Laravel versi lama), buat file secara manual di:
resources/views/dashboard.blade.php
resources/views/kelas.blade.php

B. Isi View dashboard.blade.php
```bash
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex">

  <!-- Sidebar (pakai persis class & struktur kamu) -->
 <aside class="w-64 bg-blue-800 min-h-screen text-white p-5 flex flex-col">
  <div class="flex items-center gap-2 mb-6">
    <!-- Ikon topi beasiswa SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.84 4.906c0 3.042-1.129 5.824-3.16 7.416a6.987 6.987 0 01-6.16 0c-2.031-1.592-3.16-4.374-3.16-7.416a12.083 12.083 0 01.84-4.906L12 14z" />
    </svg>
    <h1 class="text-2xl font-bold text-blue-100">SIMON</h1>
  </div>

    <div class="mb-6">
      <p class="font-semibold text-white">ADMINISTRATOR</p>
      <p class="text-green-300 text-sm">● Online</p>
    </div>

    <nav class="space-y-3">
  <a href="/" class="flex items-center gap-3 px-3 py-2 rounded bg-white text-blue-800 font-semibold">
    <i data-feather="home"></i>
    <span>Dashboard</span>
  </a>
  <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="user-check"></i>
    <span>Data Mahasiswa</span>
  </a>
  <a href="{{ route('matkul.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="users"></i>
    <span>Data Matkul</span>
  </a>
  <a href="" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="book"></i>
    <span>Data Prodi</span>
  </a>
    <a href="{{ route('kelas.index') }}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="clipboard"></i>
    <span>Data Kelas</span>
  </a>
</nav>

  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8 min-h-screen overflow-auto">
    <!-- Dashboard -->
    <section id="dashboard" class="page-content block">
      <h2 class="text-3xl font-bold text-gray-700 flex items-center gap-2 mb-6">
        <i data-feather="home" class="text-blue-600"></i> Dashboard
      </h2>

        <!-- Kotak selamat datang -->
  <div class="bg-white rounded-xl shadow-md p-6 mb-8 text-center">
    <h3 class="text-3xl font-bold text-gray-800 mb-2">✨Selamat Datang di Sistem Informasi Monitoring Kehadiran Mahasiswa✨</h3>
    <p class="text-gray-600 text-lg">Kelola data mahasiswa, kelas, dan program studi dengan mudah.</p>
  </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
  <!-- Mahasiswa -->
  <div class="bg-blue-400 text-white p-6 rounded-xl shadow hover:shadow-md transition">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-3xl font-bold">2</p>
        <p class="mt-1">Mahasiswa</p>
      </div>
      <div class="text-4xl">🎓</div>
    </div>
  </div>

  <!-- Kelas -->
  <div class="bg-indigo-400 text-white p-6 rounded-xl shadow hover:shadow-md transition">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-3xl font-bold">1</p>
        <p class="mt-1">Kelas</p>
      </div>
      <div class="text-4xl">🏫</div>
    </div>
  </div>

  <!-- Program Studi -->
  <div class="bg-cyan-400 text-white p-6 rounded-xl shadow hover:shadow-md transition">
    <div class="flex items-center justify-between">
      <div>
        <p class="text-3xl font-bold">3</p>
        <p class="mt-1">Program Studi</p>
      </div>
      <div class="text-4xl">📚</div>
    </div>
  </div>
</div>

    </section>

   
  </main>

  <!-- <script>
    feather.replace();

    const navLinks = document.querySelectorAll(".nav-link");
    const pages = document.querySelectorAll(".page-content");

    function setActivePage(pageId) {
      pages.forEach(page => {
        if (page.id === pageId) {
          page.classList.remove("hidden");
          page.classList.add("block");
        } else {
          page.classList.add("hidden");
          page.classList.remove("block");
        }
      });

      navLinks.forEach(link => {
        if (link.dataset.page === pageId) {
          // kasih efek background putih & teks biru gelap saat aktif
          link.classList.add("bg-white", "text-blue-800", "font-semibold");
          link.classList.remove("text-blue-100");
        } else {
          link.classList.remove("bg-white", "text-blue-800", "font-semibold");
          link.classList.add("text-blue-100");
        }
      });
    }

    // Default aktif Dashboard
    setActivePage("dashboard");

    navLinks.forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const page = link.dataset.page;
        setActivePage(page);
      });
    });
  </script> -->
    <script>
    feather.replace();
  </script>
</body>
</html>
```

C. Isi View mahasiswa.blade.php
```bash
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data mahasiswa - SIMON</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-blue-800 min-h-screen text-white p-5 flex flex-col">
    <div class="flex items-center gap-2 mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.84 4.906c0 3.042-1.129 5.824-3.16 7.416a6.987 6.987 0 01-6.16 0c-2.031-1.592-3.16-4.374-3.16-7.416a12.083 12.083 0 01.84-4.906L12 14z" />
      </svg>
      <h1 class="text-2xl font-bold text-blue-100">SIMON</h1>
    </div>

    <div class="mb-6">
      <p class="font-semibold text-white">ADMINISTRATOR</p>
      <p class="text-green-300 text-sm">● Online</p>
    </div>

       <nav class="space-y-3">
  <a href="/" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="home"></i>
    <span>Dashboard</span>
  </a>
  <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-3 px-3 py-2 rounded bg-white text-blue-800 font-semibold">
    <i data-feather="user-check"></i>
    <span>Data Mahasiswa</span>
  </a>
  <a href="{{ route('matkul.index') ??'#'}}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="users"></i>
    <span>Data Matkul</span>
  </a>
  <a href="" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="book"></i>
    <span>Data Prodi</span>
  </a>
    <a href="{{ route('kelas.index') ??'#'}}" class="flex items-center gap-3 px-3 py-2 rounded hover:bg-blue-600 text-blue-100">
    <i data-feather="clipboard"></i>
    <span>Data Kelas</span>
  </a>
</nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8 min-h-screen overflow-auto">
    <section>
      <h2 class="text-3xl font-bold text-gray-700 mb-6 flex items-center gap-2">
        <i data-feather="users" class="text-blue-600"></i> Data mahasiswa
      </h2>

      <!-- Tombol Tambah & Search -->
      <div class="flex justify-between items-center mb-4">
        <a href="{{ route('mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
          + Tambah Data
        </a>
       <form method="GET" action="{{ route('mahasiswa.index') }}" class="relative w-64">
  <input 
    id="searchInput" 
    type="text" 
    name="search"
    placeholder="Cari mahasiswa..." 
    value="{{ request('search') }}"
    class="pl-10 pr-4 py-2 w-full border rounded-md focus:outline-none focus:ring focus:ring-indigo-300 text-sm"
  />
  <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
  </svg>
</form>
<a href="{{ route('mahasiswa.exportPdf') }}" target="_blank" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 inline-block">
  📄 Export PDF
</a>
      </div>
  
      <!-- Tabel -->
      <div class="bg-white rounded-xl shadow p-4 overflow-auto">
        <table class="min-w-full table-auto border border-gray-300">
          <thead>
            <tr class="bg-blue-100 text-left text-gray-700 text-sm uppercase">
              <th class="py-3 px-4 border border-gray-300">No</th>
              <th class="py-3 px-4 border border-gray-300">NPM</th>
              <th class="py-3 px-4 border border-gray-300">Nama mahasiswa</th>
              <th class="py-3 px-4 border border-gray-300"> id user</th>
              <th class="py-3 px-4 border border-gray-300"> kode kelas</th>
              <th class="py-3 px-4 border border-gray-300 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody id="mahasiswaTableBody">
            @foreach ($mahasiswa as $index => $mhs)
              <tr class="hover:bg-gray-50">
                <td class="py-2 px-4 border border-gray-300 text-center">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border border-gray-300">{{ $mhs['npm'] }}</td>
                <td class="py-2 px-4 border border-gray-300">{{ $mhs['nama_mahasiswa'] }}</td>
                <td class="py-2 px-4 border border-gray-300">{{ $mhs['id_user'] }}</td>
                <td class="py-2 px-4 border border-gray-300">{{ $mhs['nama_kelas'] }}</td>
                <td class="py-2 px-4 border border-gray-300 text-center">
                  <a href="{{ route('mahasiswa.edit', $mhs['npm']) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                  <form action="{{ route('mahasiswa.destroy', $mhs['npm']) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </main>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Ganti ikon Feather
    feather.replace();

    // Live search di tabel mahasiswa
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("mahasiswaTableBody");

    searchInput.addEventListener("input", function () {
      const keyword = this.value.toLowerCase();
      const rows = tableBody.getElementsByTagName("tr");

      Array.from(rows).forEach((row) => {
        const rowText = row.textContent.toLowerCase();
        row.style.display = rowText.includes(keyword) ? "" : "none";
      });
    });
  });
  </script>
</body>
</html>
```


## 🛠️ 5. Membuat Controller 
- Di terminal (Laragon atau VS Code), jalankan:
```bash
php artisan make:controller MatkulController --resource
```
📂 File yang akan dibuat secara otomatis:  
- app/Http/Controllers/MatkulController.php

### B. Isi file MatkulController.php dengan kode berikut
```php
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

```

## 6. 🧭 Tambahkan Routes dalam file web.php 
- Buka file routes/web.php dan tambahkan:
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KelasController;
Route::get('/', function () {
    return view('dashboard');
});
    Route::resource('matkul', MatkulController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('/mahasiswa/export-pdf', [MahasiswaController::class, 'exportPdf'])->name('mahasiswa.exportPdf');

```

## 🚀 7. Jalankan Laravel frontend
```bash
php artisan serve
```
setelah menjalankan laravel frontend, akan muncul output: Server running on [http://127.0.0.1:8000]. lalu Press Ctrl+C to stop the server

---

## 📄 Export PDF
1. Install package DOMPDF:
```bash
composer require barryvdh/laravel-dompdf
```

2. Tambahkan route pdf di routes/web.php
```php
use App\Http\Controllers\MahasiswaController;

Route::get('/mahasiswa/export-pdf', [MahasiswaController::class, 'exportPdf'])->name('mahasiswa.exportPdf');
```

3. Tambahkan Method exportPdf di MahasiswaController.php
```php
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

public function exportPdf()
{
    $response = Http::get('http://localhost:8080/mahasiswa');
    if (!$response->successful()) {
        return back()->withErrors(['msg' => 'Gagal mengambil data mahasiswa']);
    }

    $mahasiswa = $response->json();

    $pdf = Pdf::loadView('mahasiswa_pdf', ['mahasiswa' => $mahasiswa]);
    return $pdf->download('data_mahasiswa.pdf');
}
```

4. Buat View di resources/views/mahasiswa_pdf.blade.php
```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    th { background: #f0f0f0; }
  </style>
</head>
<body>
  <h2>Data Mahasiswa</h2>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>NPM</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Prodi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($mahasiswa as $i => $mhs)
      <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $mhs['npm'] }}</td>
        <td>{{ $mhs['nama_mahasiswa'] }}</td>
        <td>{{ $mhs['nama_kelas'] ?? $mhs['id_kelas'] }}</td>
        <td>{{ $mhs['nama_prodi'] ?? $mhs['kode_prodi'] }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
```

5. Tambahkan Tombol Export di View (misalnya mahasiswa.blade.php)
```html
<a href="{{ route('mahasiswa.exportPdf') }}" target="_blank" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 inline-block">
  📄 Export PDF
</a>
```








---

🚀 Selamat! Sistem Informasi Nilai siap digunakan!
