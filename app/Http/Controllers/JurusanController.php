<?php

namespace App\Http\Controllers;

// app/Http/Controllers/JurusanController.php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
   // app/Http/Controllers/JurusanController.php
public function index(Request $request)
{
    $katakunci = $request->katakunci;  // Ambil input pencarian dari form
    $jumlahbaris = 10;  // Jumlah data per halaman

    // Pencarian berdasarkan kata kunci
    if (strlen($katakunci)) {
        $jurusan = Jurusan::where('nama_jurusan', 'like', "%$katakunci%")
                          ->paginate($jumlahbaris);
    } else {
        // Jika tidak ada kata kunci, tampilkan semua data jurusan
        $jurusan = Jurusan::orderBy('id', 'desc')
                          ->paginate($jumlahbaris);
    }

    return view('jurusan.index', compact('jurusan', 'katakunci'));
}


    public function create()
    {
        $jurusan = Jurusan::paginate(10);
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
          $validated = $request->validate([
        'nama_jurusan' => 'required|max:255',
    ]);

    // Menyimpan data jurusan
    Jurusan::create($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data jurusan berhasil ditambahkan!');

    // Redirect ke halaman index
    return redirect()->route('jurusan.index');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'nama_jurusan' => 'required|max:255',
    ]);

    // Menemukan jurusan berdasarkan ID dan memperbarui data
    $jurusan = Jurusan::findOrFail($id);
    $jurusan->update($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data jurusan berhasil diperbarui!');

    // Redirect kembali ke halaman index jurusan
    return redirect()->route('jurusan.index');
    }

    public function destroy($id)
    {
         $jurusan = Jurusan::findOrFail($id);
    $jurusan->delete();

    // Menyimpan flash message untuk pemberitahuan
    session()->flash('error', 'Data jurusan berhasil dihapus!');

    // Redirect kembali ke halaman index jurusan
    return redirect()->route('jurusan.index');
    }
}
