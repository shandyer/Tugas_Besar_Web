<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class jurnalController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $filter = $request->input('filter');

        $query = Jurnal::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penulis', 'like', '%' . $searchTerm . '%')
                    ->orWhere('issn', 'like', '%' . $searchTerm . '%')
                    ->orWhere('volume', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penerbit', 'like', '%' . $searchTerm . '%')
                    ->orWhere('halaman', 'like', '%' . $searchTerm . '%')
                    ->orWhere('bahasa', 'like', '%' . $searchTerm . '%');
            });
        } else {
            $jurnals = Jurnal::all();
        }

        if ($filter) {
            $query->where('bahasa', $filter);
        }

        $jurnals = $query->get();

        return view('jurnal.index', compact('jurnals', 'searchTerm', 'filter'));
    }

    public function create()
    {
        return view('jurnal.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'issn' => 'string|required|unique:jurnals',
            'volume' => 'string|required',
            'penerbit' => 'string|required',
            'halaman' => 'string|required',
            'url' => 'string|required',
            'bahasa' => 'string|required',
        ]);

        $jurnal = Jurnal::create($validateData);
        if ($jurnal) {
            return to_route('jurnal.index')->with('success', 'Berhasil Menambahkan Data');
        } else {
            return to_route('jurnal.index')->with('fail', "Gagal Menambahkan Data");
        }
    }

    public function edit(Jurnal $jurnal)
    {
        // $jurnal = Jurnal::all();
        return view('jurnal.edit', compact('jurnal'));
    }

    public function update(Request $request, Jurnal $jurnal)
    {
        $validateData = $request->validate([
            'judul' => 'string|required',
            'penulis' => 'string|required',
            'issn' => 'string|required|unique:jurnals,issn,' . $jurnal->id,
            'volume' => 'string|required',
            'penerbit' => 'string|required',
            'halaman' => 'string|required',
            'url' => 'string|required',
            'bahasa' => 'string|required',
        ]);

        $jurnal->update($validateData);
        if ($jurnal) {
            return to_route('jurnal.index')->with('success', 'Berhasil Update Data');
        } else {
            return to_route('jurnal.index')->with('fail', "Gagal Update Data");
        }
    }

    public function destroy(Jurnal $jurnal)
    {
        $jurnal->delete();
        if ($jurnal) {
            return to_route('jurnal.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('jurnal.index')->with('fail', "Gagal Menghapus Data");
        }
    }
}
