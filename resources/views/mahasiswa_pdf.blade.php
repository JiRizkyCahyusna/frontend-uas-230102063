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