@extends('kerangka.master')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('artikel.update', $artikel) }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            @error('judul') is invalid
                                        @enderror
                                        name="judul" value="{{ old('judul') ?? $artikel->judul }}" placeholder="Judul">
                                        @error('judul')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="penulis">Penulis</label>
                                        <input type="text" id="penulis" class="form-control"
                                            @error('penulis') is invalid
                                        @enderror
                                            name="penulis" value="{{ old('penulis') ?? $artikel->penulis }}" placeholder="Penulis">
                                        @error('penulis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama_seminar">nama seminar</label>
                                        <input type="text" id="nama_seminar" class="form-control"
                                            @error('nama_seminar') is invalid
                                        @enderror
                                            name="nama_seminar" value="{{ old('nama_seminar') ?? $artikel->nama_seminar }}" placeholder="nama_seminar">
                                        @error('halaman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="penyelenggara">penyelenggara</label>
                                        <input type="text" id="penyelenggara" class="form-control"
                                            @error('penyelenggara') is invalid
                                        @enderror
                                            name="penyelenggara" value="{{ old('penyelenggara') ?? $artikel->penyelenggara}}"
                                            placeholder="penyelenggara">
                                        @error('penyelenggara')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class='form-group'>
                                        <label for="halaman">halaman</label>
                                        <input type="text" id="halaman" class="form-control"
                                            @error('halaman') is invalid
                                        @enderror
                                            name="halaman" value="{{ old('halaman') ?? $artikel->halaman}}" placeholder="halaman">
                                        @error('halaman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                <div class="col-12">
                                    <div class='form-group'>
                                        <label for="isbn">ISBN</label>
                                        <input type="text" id="isbn" class="form-control"
                                            @error('isbn') is invalid
                                        @enderror
                                            name="isbn" value="{{ old('isbn') ?? $artikel->isbn}}" placeholder="ISBN">
                                        @error('isbn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-12">
                                    <div class='form-group'>
                                        <label for="waktu_pelaksanaan">waktu pelaksanaan</label>
                                        <input type="text" id="waktu_pelaksanaan" class="form-control"
                                            @error('waktu_pelaksanaan') is invalid
                                        @enderror
                                            name="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan') ?? $artikel->waktu_pelaksanaan }}" placeholder="waktu_pelaksanaan">
                                        @error('waktu_pelaksanaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div> <label for="url">URL</label>
                                    <input type="text" id="url" class="form-control"
                                        @error('url') is invalid
                                        @enderror
                                        name="url" value="{{ old('url') ?? $artikel->url }}" placeholder="URL">
                                    @error('url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
