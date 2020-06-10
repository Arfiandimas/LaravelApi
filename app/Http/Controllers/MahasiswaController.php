<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['angkatan', 'kelas'])->get();

        $message = [
            'mahasiswa' => $mahasiswa
        ];
        return response()->json($message, 200);
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama'=>'required|max:255',
            'nim'=>'required|max:10',
            'jenis_kelamin'=>'required|in:laki-laki,perempuan',
            'kelas_id'=>'required|integer',
            'angkatan_id'=>'required|integer'
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = $req->nama;
        $mahasiswa->nim = $req->nim;
        $mahasiswa->jenis_kelamin = $req->jenis_kelamin;
        $mahasiswa->kelas_id = $req->kelas_id;
        $mahasiswa->angkatan_id = $req->angkatan_id;
        $mahasiswa->save();
        
        $message = [
            'message' => 'Mahasiswa baru berhasil dibuat',
            'kelas' => $mahasiswa
        ];
        return response()->json($message, 201);
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama'=>'max:255',
            'nim'=>'max:10',
            'jenis_kelamin'=>'in:laki-laki,perempuan',
            'kelas_id'=>'integer',
            'angkatan_id'=>'integer'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->nama = $req->nama;
        $mahasiswa->nim = $req->nim;
        $mahasiswa->jenis_kelamin = $req->jenis_kelamin;
        $mahasiswa->kelas_id = $req->kelas_id;
        $mahasiswa->angkatan_id = $req->angkatan_id;
        $mahasiswa->update();
        
        $message = [
            'message' => 'Mahasiswa berhasil diupdate',
            'kelas' => $mahasiswa
        ];
        return response()->json($message, 200);
    }

    public function destroy($id){
        $kelas = Mahasiswa::findOrFail($id);
        $kelas->delete();

        $message = [
            'message' => 'Data mahasiswa telah dihapus',
            'kelas' => $kelas
        ];
        return response()->json($message, 200);
    }
}
