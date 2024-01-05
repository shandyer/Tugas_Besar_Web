<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class bukuController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $filter = $request->input('filter');

        $query = Buku::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penulis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('isbn', 'like', '%' . $searchTerm . '%')
                    ->orWhere('jenis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penerbit', 'like', '%' . $searchTerm . '%')
                    ->orWhere('halaman', 'like', '%' . $searchTerm . '%');
            });
        } else {
            $bukus = Buku::all();
        }

        if ($filter) {
            $query->where('jenis', $filter);
        }

        $bukus = $query->get();

        return view('buku.index', compact('bukus', 'searchTerm', 'filter'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'isbn' => 'string|required|unique:bukus',
            'jenis' => 'string|required',
            'penerbit' => 'string|required',
            'halaman' => 'string|required',
            'url' => 'string|required',
        ]);

        $buku = Buku::create($validateData);
        if ($buku) {
            return to_route('buku.index')->with('success', 'Berhasil Menambahkan Data');
        } else {
            return to_route('buku.index')->with('fail', "Gagal Menambahkan Data");
        }
    }

    public function edit(Buku $buku)
    {
        // $buku = Buku::all();
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'isbn' => 'string|required|unique:bukus,isbn,' . $buku->id,
            'jenis' => 'string|required',
            'penerbit' => 'string|required',
            'halaman' => 'string|required',
            'url' => 'string|required',
        ]);

        $buku->update($validateData);
        if ($buku) {
            return to_route('artikel.index')->with('success', 'Berhasil Update Data');
        } else {
            return to_route('artikel.index')->with('fail', "Gagal Update Data");
        }
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        if ($buku) {
            return to_route('jurnal.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('jurnal.index')->with('fail', "Gagal Menghapus Data");
        }
    }
}
