@extends('kerangka.master')
@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Jurnal</h4>
                        <a class="btn btn-primary text-center" href="{{ route('jurnal.create') }}">Tambah</a>
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                                <form action="{{ route('jurnal.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Search" name="search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="filter" class="form-label">Filter by :</label>
                                        <select class="form-select" id="filter" name="filter">
                                            <option value="">All</option>
                                            <option value="Indonesia"
                                                {{ request('filter') == 'Indonesia' ? 'selected' : '' }}>Indonesia
                                            </option>
                                            <option value="English"
                                                {{ request('filter') == 'English' ? 'selected' : '' }}>English
                                            </option>
                                            <option value="Spain"
                                                {{ request('filter') == 'Spain' ? 'selected' : '' }}>Spain
                                            </option>
                                            <option value="Germany"
                                                {{ request('filter') == 'Germany' ? 'selected' : '' }}>Germany
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
                                            <th>JUDUL JURNAL</th>
                                            <th>PENULIS JURNAL</th>
                                            <th>ISSN</th>
                                            <th>VOLUME</th>
                                            <th>PENERBIT</th>
                                            <th>HALAMAN</th>
                                            <th>URL</th>
                                            <th>BAHASA</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($searchTerm))
                                            <h2>Search Results for '{{ $searchTerm }}'</h2>
                                        @endif

                                        @if (isset($filter))
                                            <h2>Filtering by : '{{ $filter }}'</h2>
                                        @endif


                                        @foreach ($jurnals as $jurnal)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jurnal->judul }}</td>
                                                <td class="text-bold-500">{{ $jurnal->penulis }}</td>
                                                <td>{{ $jurnal->issn }}</td>
                                                <td>{{ $jurnal->volume }}</td>
                                                <td>{{ $jurnal->penerbit }}</td>
                                                <td>{{ $jurnal->halaman }}</td>
                                                <td>{{ $jurnal->url }}</td>
                                                <td>{{ $jurnal->bahasa }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-warning text-center mx-3"
                                                            href="{{ route('jurnal.edit', $jurnal->id) }}">Update</a>
                                                        <form action="{{ route('jurnal.destroy', ['jurnal' => $jurnal->id]) }}"
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
