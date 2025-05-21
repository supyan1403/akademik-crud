<!-- resources/views/mahasiswa/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Mahasiswa</h2>
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" required>
            </div>
            <div class="mb-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan_id" name="jurusan_id" required>
                    @foreach ($jurusan as $jrs)
                    <option value="{{ $jrs->id }}">{{ $jrs->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="matakuliah_id" class="form-label">Matakuliah</label>
                <select class="form-select" id="matakuliah_id" name="matakuliah_id" required>
                    @foreach ($matakuliah as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary">Kembali ke Halaman Daftar Mahasiswa</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
