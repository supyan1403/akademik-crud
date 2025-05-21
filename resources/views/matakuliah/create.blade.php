<!-- resources/views/matakuliah/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Matakuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Matakuliah</h2>
        <form action="{{ route('matakuliah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" required>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen</label>
                <select class="form-select" id="dosen_id" name="dosen_id" required>
                    @foreach ($dosen as $dsn)
                    <option value="{{ $dsn->id }}">{{ $dsn->nama_dosen }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ url('/matakuliah') }}" class="btn btn-secondary">Kembali ke Halaman Daftar Mata Kuliah</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
