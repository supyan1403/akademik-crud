<!-- resources/views/dosen/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    @if (session('success'))
        <div class="d-flex justify-content-center"
            style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050;" id="alert-box">
            <div class="alert alert-success alert-dismissible fade show w-auto" role="alert" id="success-alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <h2>Data Dosen</h2>
        <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Kembali ke Halaman Utama</a>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>
        <form method="GET" action="{{ route('dosen.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="katakunci" class="form-control" value="{{ request('katakunci') }}"
                    placeholder="Cari dosen...">
                @if (request('katakunci'))
                    <a href="{{ route('dosen.index') }}" class="input-group-text">
                        <i class="bi bi-x-circle" style="font-size: 20px; cursor: pointer; color: red;"></i>
                    </a>
                @endif
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>
        @if (session('error'))
            <div class="d-flex justify-content-center"
                style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1050;"
                id="alert-box">
                <div class="alert alert-danger alert-dismissible fade show w-auto" role="alert" id="error-alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Dosen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosen as $dsn)
                    <tr>
                        <td>{{ $dsn->nama_dosen }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $dsn->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dosen.destroy', $dsn->id) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $dsn->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal{{ $dsn->id }}">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="confirmDeleteModal{{ $dsn->id }}" tabindex="-1"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Yakin ingin menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="document.getElementById('delete-form-{{ $dsn->id }}').submit();">Ya,
                                        Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $dosen->links('pagination::bootstrap-5') }} <!-- Pagination using Bootstrap 5 -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Menyembunyikan alert setelah 4 detik (4000ms)
        setTimeout(function() {
            var alertBox = document.getElementById('success-alert');
            if (alertBox) {
                // Menambahkan class fade untuk animasi hilang
                alertBox.classList.remove('show');
                alertBox.classList.add('fade');
            }
        }, 2000);

        setTimeout(function() {
            var alertBox = document.getElementById('error-alert');
            if (alertBox) {
                // Menambahkan class fade untuk animasi hilang
                alertBox.classList.remove('show');
                alertBox.classList.add('fade');
            }
        }, 2000);
    </script>
</body>

</html>
