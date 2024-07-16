<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Background;
use App\Models\Nilai;
use App\Models\Nilaivokal;
use App\Models\Sinopsis;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderby('nama_siswa', 'asc')->get();
        $kelas = Background::all();
        $cabang = User::orderby('name', 'asc')->where('role', 'cabang')->get();
        // dd($siswa);
        // dd($kelas);
        // $user = User::all()->where('role', 'cabang')->first();
        // dd($user->tempat->name);
        return view('user.siswa.index', compact('siswas', 'kelas', 'cabang'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $kelas = Background::all();
        $cabang = User::all()->where('role', 'cabang');
        return view('user.siswa.create', compact('kelas', 'cabang'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
            'cabang' => 'required',
        ]);

        $siswa = Siswa::create([
            'foto' => 'image/default.png',
            'no_induk' => $request->no_induk,
            'nama_siswa' => $request->nama_siswa,
            'semester' => 1,
            'tanggal_lahir' => $request->tanggal_lahir,
            'orang_tua' => $request->orang_tua,
            'alamat' => $request->alamat,
            'cabang' => $request->cabang,
            'kelas' => $request->kelas,
            'password' => Hash::make('password'),
        ]);

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $siswa
     * @return void
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Background::all();
        $cabang = User::all()->where('role', 'cabang');
        return view('user.siswa.edit', compact('siswa', 'kelas', 'cabang'));
    }

    public function show(Siswa $siswa)
    {
        return view('user.siswa.show', compact('siswa'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $siswa
     * @return void
     */
    public function update(Request $request, siswa $siswa)
    {
        $this->validate($request, [
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
            'kelas' => 'required',
        ]);

        if ($request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
            ]);
        }elseif ($request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
            ]);
        } else {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
        }

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy(Siswa $siswa)
    {
        $file = public_path('storage/') . $siswa->foto;
        $default = public_path('/image/default.png');

        if (file_exists($file)) {
            if ($file != $default) {
                @unlink($file);
            }
        }

        $nilai = Nilai::all()->where('no_induk', $siswa->no_induk);
        $vokal = Nilaivokal::all()->where('no_induk', $siswa->no_induk);
        $sinopsis = Sinopsis::all()->where('no_induk', $siswa->no_induk);

        foreach($nilai as $data){
            $data->delete();
        }

        foreach ($vokal as $data) {
            $data->delete();
        }

        foreach ($sinopsis as $data) {
            $data->delete();
        }
        $siswa->delete();

        $deleted = $siswa->delete();

        if ($deleted) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function fileImport(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file'));
        return back();
    }

    public function template()
    {
        $path = asset('template/template.xlsx');
        $fileName = 'template.xlsx';

        return Response::download($path, $fileName, ['Content-Type: xlsx']);
    }
}
