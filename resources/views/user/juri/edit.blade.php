@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('juri.update', $juri->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="" class="font-wight-bold">Foto</label>
                                <img src="{{ asset('/' . $juri->foto) }}" alt="">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama_juri') is-invalid @enderror" name="name"
                                    value="{{ old('name', $juri->name) }}" placeholder="Masukkan Nama">

                                <!-- error message untuk nama_juri -->
                                @error('nama_juri')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $juri->email) }}" placeholder="Masukkan email">

                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="font-weight-bold">Password <small style="color: red">* Kosongkan jika
                                        tidak ingin mengubah password</small></label>
                                <input type="password" class="form-control" name="password">
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
