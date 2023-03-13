<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(6);
        // return view('mahasiswas.index', compact('mahasiswas'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        // $kelas = Mahasiswa::with('kelas')->get();
        // dd($kelas);
        $keyword = $request->input('Nama');

        if ($keyword) {
            $mahasiswas = Mahasiswa::with('kelas')->where('Nama', 'like', '%' . $keyword . '%')->paginate(5);
        } else {
            // $mahasiswas = Mahasiswa::paginate(5);
            $mahasiswas = Mahasiswa::with('kelas')->paginate(5);
        }

        return view('mahasiswas.index', ['mahasiswas' => $mahasiswas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tgl_lahir' => 'required',
        ]);

        // //fungsi eloquent untuk menambah data
        // Mahasiswa::create($request->all());

        $mahasiswa = new Mahasiswa;
        $mahasiswa->Nim = $request->input('Nim');
        $mahasiswa->Nama = $request->input('Nama');
        $mahasiswa->Jurusan = $request->input('Jurusan');
        $mahasiswa->No_Handphone = $request->input('No_Handphone');
        $mahasiswa->Email = $request->input('Email');
        $mahasiswa->Tgl_lahir = $request->input('Tgl_lahir');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->input('Kelas');

        //fungsi  eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        // $Mahasiswa = Mahasiswa::find($Nim);
        // $Mahasiswa = $mahasiswa;

        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $mahasiswa->Nim)->first();

        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Mahasiswa = $mahasiswa;

        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $mahasiswa->Nim)->first();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'Email' => 'required',
            'Tgl_lahir' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        // Mahasiswa::where('Nim', $mahasiswa->Nim)->update($request->all());
        // dd($request->all(), $mahasiswa_update, $mahasiswa);

        // $mahasiswa->Nim = $request->Nim;
        // $mahasiswa->Nama = $request->Nama;
        // $mahasiswa->Kelas = $request->Kelas;
        // $mahasiswa->Jurusan = $request->Jurusan;
        // $mahasiswa->No_Handphone = $request->No_Handphone;
        // $mahasiswa->Email = $request->Email;
        // $mahasiswa->Tgl_lahir = $request->Tgl_lahir;
        // $mahasiswa->save();

        $mahasiswa = Mahasiswa::with('kelas')->where('Nim', $mahasiswa->Nim)->first();
        $mahasiswa->Nim = $request->input('Nim');
        $mahasiswa->Nama = $request->input('Nama');
        $mahasiswa->Jurusan = $request->input('Jurusan');
        $mahasiswa->No_Handphone = $request->input('No_Handphone');
        $mahasiswa->Email = $request->input('Email');
        $mahasiswa->Tgl_lahir = $request->input('Tgl_lahir');
        $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->input('Kelas');

        //fungsi  eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('mahasiswas')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //fungsi eloquent untuk menghapus data
        // Mahasiswa::find($mahasiswa->Nim)->delete();
        $mahasiswa->delete();
        return redirect('mahasiswas')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
    }
}
