<!-- resources/views/matakuliah/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Matakuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Matakuliah</h2>
        <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
                <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" value="{{ $matakuliah->nama_matakuliah }}" required>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen Pengampu</label>
                <select class="form-select" id="dosen_id" name="dosen_id" required>
                    @foreach ($dosen as $dsn)
                    <option value="{{ $dsn->id }}" {{ $dsn->id == $matakuliah->dosen_id ? 'selected' : '' }}>
                        {{ $dsn->nama_dosen }}
                    </option>
                    @endforeach
                </select>
            </div>
            <a href="{{ url('/matakuliah') }}" class="btn btn-secondary">Kembali ke Halaman Daftar Mata Kuliah</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
