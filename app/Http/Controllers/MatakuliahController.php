<?php

// app/Http/Controllers/MatakuliahController.php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
{
    $katakunci = $request->katakunci;  // Ambil input pencarian dari form
    $jumlahbaris = 10;  // Jumlah data per halaman

    // Pencarian berdasarkan kata kunci
    if (strlen($katakunci)) {
        $matakuliah = Matakuliah::with('dosen')
                                ->where('nama_matakuliah', 'like', "%$katakunci%")
                                ->orWhereHas('dosen', function ($query) use ($katakunci) {
                                    $query->where('nama_dosen', 'like', "%$katakunci%");
                                })
                                ->paginate($jumlahbaris);
    } else {
        // Jika tidak ada kata kunci, tampilkan semua data matakuliah
        $matakuliah = Matakuliah::with('dosen')
                                ->orderBy('id', 'desc')
                                ->paginate($jumlahbaris);
    }

    return view('matakuliah.index', compact('matakuliah', 'katakunci'));
}

    public function create()
    {
        $dosen = Dosen::all();
        return view('matakuliah.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama_matakuliah' => 'required|max:255',
        'dosen_id' => 'required',
    ]);

    // Menyimpan data matakuliah
    Matakuliah::create($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data matakuliah berhasil ditambahkan!');

    // Redirect ke halaman index
    return redirect()->route('matakuliah.index');
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $dosen = Dosen::all();
        return view('matakuliah.edit', compact('matakuliah', 'dosen'));
    }

    public function update(Request $request, $id)
    {
         $validated = $request->validate([
        'nama_matakuliah' => 'required|max:255',
        'dosen_id' => 'required',
    ]);

    // Menemukan matakuliah berdasarkan ID dan memperbarui data
    $matakuliah = Matakuliah::findOrFail($id);
    $matakuliah->update($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data matakuliah berhasil diperbarui!');

    // Redirect kembali ke halaman index matakuliah
    return redirect()->route('matakuliah.index');
        return redirect()->route('matakuliah.index');
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
    $matakuliah->delete();

    // Menyimpan flash message untuk pemberitahuan
    session()->flash('error', 'Data matakuliah berhasil dihapus!');

    // Redirect kembali ke halaman index matakuliah
    return redirect()->route('matakuliah.index');
    }
}

