<?php

// app/Http/Controllers/DosenController.php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
{
    $katakunci = $request->katakunci;  // Ambil input pencarian dari form
    $jumlahbaris = 10;  // Jumlah data per halaman

    // Pencarian berdasarkan kata kunci
    if (strlen($katakunci)) {
        $dosen = Dosen::where('nama_dosen', 'like', "%$katakunci%")
                      ->paginate($jumlahbaris);
    } else {
        // Jika tidak ada kata kunci, tampilkan semua data dosen
        $dosen = Dosen::orderBy('id', 'desc')
                      ->paginate($jumlahbaris);
    }
    
    return view('dosen.index', compact('dosen', 'katakunci'));
}

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
           $validated = $request->validate([
        'nama_dosen' => 'required|max:255',
    ]);

    // Menyimpan data dosen
    Dosen::create($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data dosen berhasil ditambahkan!');

    // Redirect ke halaman index
    return redirect()->route('dosen.index');

    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
       $validated = $request->validate([
        'nama_dosen' => 'required|max:255',
    ]);

    // Menemukan dosen berdasarkan ID dan memperbarui data
    $dosen = Dosen::findOrFail($id);
    $dosen->update($validated);

    // Menyimpan flash message
    session()->flash('success', 'Data dosen berhasil diperbarui!');

    // Redirect kembali ke halaman index dosen
    return redirect()->route('dosen.index');
    }

    public function destroy($id)
    {
         $dosen = Dosen::findOrFail($id);
    $dosen->delete();

    // Menyimpan flash message untuk pemberitahuan
    session()->flash('error', 'Data dosen berhasil dihapus!');

    // Redirect kembali ke halaman index dosen
    return redirect()->route('dosen.index');
    }
}

