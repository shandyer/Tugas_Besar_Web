<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use Illuminate\Http\Request;

class artikelController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $filter = $request->input('filter');

        $query = artikel::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penulis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nama_seminar', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penyelenggara', 'like', '%' . $searchTerm . '%')
                    ->orWhere('halaman', 'like', '%' . $searchTerm . '%')
                    ->orWhere('isbn', 'like', '%' . $searchTerm . '%');
                    // ->orWhere('waktu_pelaksanaan', 'like', '%' . $searchTerm . '%');
                    
            });
        } else {
            $artikels = artikel::all();
        }

        if ($filter) {
            $query->where('jenis', $filter);
        }

        $artikels = $query->get();

        return view('artikel.index', compact('artikels', 'searchTerm', 'filter'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'nama_seminar' => 'string|required',
            'penyelenggara' => 'string|required',
            'halaman' => 'string|required',
            'isbn' => 'string|required',
            'waktu_pelaksanaan' => 'string|required',
            'url'=> 'string|required',
        ]);

        $artikel = artikel::create($validateData);
        if ($artikel) {
            return to_route('artikel.index')->with('success', 'Berhasil Menambahkan Data');
        } else {
            return to_route('artikel.index')->with('fail', "Gagal Menambahkan Data");
        }
    }

    public function edit(artikel $artikel)
    {
        // $artikel = artikel::all();
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, artikel $artikel)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'nama_seminar' => 'string|required',
            'penyelenggara' => 'string|required',
            'halaman' => 'string|required',
            'isbn' => 'string|required',
            'waktu_pelaksanaan' => 'string|required',
        ]);

        $artikel->update($validateData);
        if ($artikel) {
            return to_route('artikel.index')->with('success', 'Berhasil Update Data');
        } else {
            return to_route('artikel.index')->with('fail', "Gagal Update Data");
        }
    }

    public function destroy(artikel $artikel)
    {
        $artikel->delete();
        if ($artikel) {
            return to_route('artikel.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('artikel.index')->with('fail', "Gagal Menghapus Data");
        }
    }
}
