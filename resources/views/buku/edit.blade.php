@extends('kerangka.master')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Data</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('buku.update', $buku->id )}}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            @error('judul') is invalid
                                        @enderror
                                            name="judul" value="{{ old('judul') ?? $buku->judul }}" placeholder="Judul">
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
                                            name="penulis" value="{{ old('penulis') ?? $buku->penulis }}" placeholder="Penulis">
                                        @error('penulis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                       <label for="isbn">ISBN</label>
                                        <input type="text" id="isbn" class="form-control"
                                            @error('isbn') is invalid
                                        @enderror
                                            name="isbn" value="{{ old('isbn') ?? $buku->isbn}}" placeholder="ISBN">
                                        @error('isbn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="jenis">jenis</label>
                                        <input type="text" id="Jenis" class="form-control"
                                            @error('jenis') is invalid
                                        @enderror
                                            name="jenis" value="{{ old('jenis') ?? $buku->jenis }}" placeholder="Jenis">
                                        @error('jenis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class='form-group'>
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" id="penerbit" class="form-control"
                                            @error('penerbit') is invalid
                                        @enderror
                                            name="penerbit" value="{{ old('penerbit') ?? $buku->penerbit}}" placeholder="Penerbit">
                                        @error('penerbit')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class='form-group'>
                                        <label for="halaman">Halaman</label>
                                        <input type="text" id="halaman" class="form-control"
                                            @error('halaman') is invalid
                                        @enderror
                                            name="halaman" value="{{ old('halaman') ?? $buku->halaman }}" placeholder="Halaman">
                                        @error('halaman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                     <label for="url">URL</label>
                                        <input type="text" id="url" class="form-control"
                                            @error('url') is invalid
                                        @enderror
                                            name="url" value="{{ old('url') ?? $buku->url}}" placeholder="URL">
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
