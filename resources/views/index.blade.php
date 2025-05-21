<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome 5 -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .row {
            width: fit-content;
            display: flex;
        }

        .card {
            border-radius: 15px;
        }

      
        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-color: #f8f9fa;">
    <div class="container">
        <div class="text-center">
            <h2 class="mt-5 mb-5">Halaman Utama <br> Sistem Pengelolaan Mahasiswa Penanggung Jawab Mata Kuliah</h2>
            
        
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 justify-content-center">
             
                <div class="col mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x mb-3" style="color: #0d6efd;"></i> <!-- Icon Mahasiswa -->
                            <h5 class="card-title">Daftar Mahasiswa</h5>
                            <p class="card-text">Kelola data mahasiswa di Sistem Pengelola.</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Mata Kuliah -->
                <div class="col mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-book fa-3x mb-3" style="color: #198754;"></i> <!-- Icon Mata Kuliah -->
                            <h5 class="card-title">Daftar Mata Kuliah</h5>
                            <p class="card-text">Kelola Mata Kuliah di Sistem Pengelolaan.</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('matakuliah.index') }}" class="btn btn-success">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Jurusan -->
                <div class="col mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-university fa-3x mb-3" style="color: #fd7e14;"></i> <!-- Icon Jurusan -->
                            <h5 class="card-title">Daftar Jurusan</h5>
                            <p class="card-text">Kelola Jurusan-Jurusan di Sistem Pengelolaan.</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('jurusan.index') }}" class="btn btn-warning">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Dosen -->
                <div class="col mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-laptop fa-3x mb-3" style="color: #f21010;"></i> <!-- Ikon Dosen -->
                            <h5 class="card-title">Daftar Dosen</h5>
                            <p class="card-text">Kelola Data Dosen Mata Kuliah Sistem Pengelolaan.</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('dosen.index') }}" class="btn btn-danger">Lihat Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="text-center mb-5">
                <p class="text-muted">Sistem Pengelolaan ini dirancang untuk memudahkan pengelolaan data mahasiswa penanggung jawab mata kuliah.</p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
