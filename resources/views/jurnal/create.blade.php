@extends('kerangka.master')
@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('jurnal.store') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" id="judul" class="form-control"
                                            @error('judul') is invalid
                                        @enderror
                                            name="judul" value="{{ old('judul') }}" placeholder="Judul">
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
                                            name="penulis" value="{{ old('penulis') }}" placeholder="Penulis">
                                        @error('penulis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                       <label for="issn">ISSN</label>
                                        <input type="text" id="issn" class="form-control"
                                            @error('issn') is invalid
                                        @enderror
                                            name="issn" value="{{ old('issn') }}" placeholder="ISSN">
                                        @error('issn')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="volume">volume</label>
                                        <input type="text" id="Volume" class="form-control"
                                            @error('volume') is invalid
                                        @enderror
                                            name="volume" value="{{ old('volume') }}" placeholder="Volume">
                                        @error('volume')
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
                                            name="penerbit" value="{{ old('penerbit') }}" placeholder="Penerbit">
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
                                            name="halaman" value="{{ old('halaman') }}" placeholder="Halaman">
                                        @error('halaman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                     <label for="url">URL</label>
                                        <input type="text" id="url" class="form-control"
                                            @error('url') is invalid
                                        @enderror
                                            name="url" value="{{ old('url') }}" placeholder="URL">
                                        @error('url')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div>
                                        <label for="bahasa">BAHASA</label>
                                        <input type="text" id="bahasa" class="form-control"
                                            @error('bahasa') is invalid
                                        @enderror
                                            name="bahasa" value="{{ old('bahasa') }}" placeholder="bahasa">
                                        @error('bahasa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
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
