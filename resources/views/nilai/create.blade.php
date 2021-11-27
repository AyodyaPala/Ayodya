@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror" name="no_induk" value="{{ old('no_induk') }}" placeholder="Masukkan Judul no induk">
                            
                                <!-- error message untuk no_induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan Judul nama siswa">
                            
                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">jenis tari</label>
                                <input type="text" class="form-control @error('jenis_tari') is-invalid @enderror" name="jenis_tari" value="{{ old('jenis_tari') }}" placeholder="Masukkan Judul nama siswa">
                            
                                <!-- error message untuk jenis_tari -->
                                @error('jenis_tari')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">wirama </label>
                                <input type="text" class="form-control @error('wirama') is-invalid @enderror" name="wirama" value="{{ old('wirama') }}" placeholder="Masukkan wirama">
                            
                                <!-- error message untuk wirama -->
                                @error('wirama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">wiraga</label>
                                <input type="text" class="form-control @error('wiraga') is-invalid @enderror" name="wiraga" value="{{ old('wiraga') }}" placeholder="Masukkan Judul no induk">
                            
                                <!-- error message untuk wiraga -->
                                @error('wiraga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">wirasa</label>
                                <input type="text" class="form-control @error('wirasa') is-invalid @enderror" name="wirasa" value="{{ old('wirasa') }}" placeholder="Masukkan Judul nama nilai">
                            
                                <!-- error message untuk wirasa -->
                                @error('wirasa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                           



                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection