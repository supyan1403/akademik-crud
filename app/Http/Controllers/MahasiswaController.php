<?php

// app/Http/Controllers/MahasiswaController.php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
    $katakunci = $request->katakunci;  // Ambil input pencarian dari form
    $jumlahbaris = 10;  // Jumlah data per halaman

    // Pencarian berdasarkan kata kunci
    if (strlen($katakunci)) {
        $mahasiswa = Mahasiswa::with(['jurusan', 'matakuliah'])
            ->where('nama_mahasiswa', 'like', "%$katakunci%")  // Pencarian di nama mahasiswa
            ->orWhereHas('jurusan', function($query) use ($katakunci) {
                $query->where('nama_jurusan', 'like', "%$katakunci%");  // Pencarian di nama jurusan
            })
            ->orWhereHas('matakuliah', function($query) use ($katakunci) {
                $query->where('nama_matakuliah', 'like', "%$katakunci%");  // Pencarian di nama matakuliah
            })
            ->paginate($jumlahbaris);
    } else {
        // Jika tidak ada kata kunci, tampilkan semua data mahasiswa
        $mahasiswa = Mahasiswa::with(['jurusan', 'matakuliah'])
            ->orderBy('id', 'desc')  // Atur berdasarkan id atau kolom yang relevan
            ->paginate($jumlahbaris);
    }
      
        // $mahasiswa = Mahasiswa::with(['jurusan', 'matakuliah'])->get();
        return view('mahasiswa.index', compact('mahasiswa','katakunci'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $matakuliah = Matakuliah::all();
        return view('mahasiswa.create', compact('jurusan', 'matakuliah'));
    }

    public function store(Request $request)
        
    {
        $validated = $request->validate([
        'nama_mahasiswa' => 'required|max:255',
        'jurusan_id' => 'required',
        'matakuliah_id' => 'required',
    ]);

    // Menyimpan data
    Mahasiswa::create($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data mahasiswa berhasil ditambahkan!');
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();
        $matakuliah = Matakuliah::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusan', 'matakuliah'));
    }

   public function update(Request $request, $id)
{
    // Validasi data
    $validated = $request->validate([
        'nama_mahasiswa' => 'required|max:255',
        'jurusan_id' => 'required',
        'matakuliah_id' => 'required',
    ]);

    // Mencari mahasiswa berdasarkan ID
    $mahasiswa = Mahasiswa::findOrFail($id);
    
    // Memperbarui data
    $mahasiswa->update($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data mahasiswa berhasil diperbarui!');

    return redirect()->route('mahasiswa.index');
}

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->delete();

    // Menyimpan flash message untuk pemberitahuan
    session()->flash('error', 'Data mahasiswa berhasil dihapus!');

    // Redirect kembali ke halaman index mahasiswa
    return redirect()->route('mahasiswa.index');
    }
}
