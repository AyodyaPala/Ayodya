@extends('template.appadmin')
@section('title', 'Create Background')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="border-0 rounded shadow card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Data Background</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('layout.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas') }}" placeholder="Masukkan Kelas">

                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="mt-2 alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('layout.index') }}">
                                <button type="reset" class="btn btn-md btn-warning">Kembali</button>
                            </a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
