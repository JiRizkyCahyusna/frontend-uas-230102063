<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit kelas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

  <div class="bg-white w-full max-w-2xl p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 flex items-center gap-2">
      <i data-feather="edit-2" class="text-yellow-500"></i> Edit kelas
    </h2>
   @foreach($kelas as $kls)
    <form action="{{ route('kelas.update', $kls['kode_kelas']) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-semibold text-gray-600 mb-1">Kode Kelas</label>
        <input type="text" name="kode_kelas" value="{{ $kls['kode_kelas'] }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-yellow-400" required readonly>
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Kelas</label>
        <input type="text" name="nama_kelas" value="{{ $kls['nama_kelas'] }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-yellow-400" required>
      </div>


      <div class="flex justify-end gap-3 mt-6">
        <a href="{{ route('kelas.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update</button>
      </div>
    </form>
    @endforeach
  </div>

  <script>
    feather.replace();
  </script>
</body>
</html>
