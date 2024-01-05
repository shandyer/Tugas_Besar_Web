@extends('kerangka.master')
@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Buku</h4>
                        <a class="btn btn-primary text-center" href="{{ route('buku.create') }}">Tambah</a>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <form action="{{ route('buku.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search" name="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="filter" class="form-label">Filter by Jenis:</label>
                                        <select class="form-select" id="filter" name="filter">
                                            <option value="">All</option>
                                            <option value="Referensi"
                                                {{ request('filter') == 'referensi' ? 'selected' : '' }}>Referensi
                                            </option>
                                            <option value="Monograf"
                                                {{ request('filter') == 'Monograf' ? 'selected' : '' }}>Monograf
                                            </option>
                                            <option value="Nasional"
                                                {{ request('filter') == 'nasional' ? 'selected' : '' }}>Nasional
                                            </option>
                                            <option value="Internasional"
                                                {{ request('filter') == 'internasional' ? 'selected' : '' }}>Internasional
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>JUDUL BUKU</th>
                                            <th>PENULIS BUKU</th>
                                            <th>ISBN</th>
                                            <th>JENIS</th>
                                            <th>PENERBIT</th>
                                            <th>HALAMAN</th>
                                            <th>URL</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($searchTerm))
                                            <h2>Search Results for '{{ $searchTerm }}'</h2>
                                        @endif

                                        @if (isset($filter))
                                            <h2>Filtering by Jenis: '{{ $filter }}'</h2>
                                        @endif


                                        @foreach ($bukus as $buku)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $buku->judul }}</td>
                                                <td class="text-bold-500">{{ $buku->penulis }}</td>
                                                <td>{{ $buku->isbn }}</td>
                                                <td>{{ $buku->jenis }}</td>
                                                <td>{{ $buku->penerbit }}</td>
                                                <td>{{ $buku->halaman }}</td>
                                                <td>{{ $buku->url }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-warning text-center mx-3"
                                                            href="{{ route('buku.edit', $buku->id) }}">Update</a>
                                                        <form action="{{ route('buku.destroy', ['buku' => $buku->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
