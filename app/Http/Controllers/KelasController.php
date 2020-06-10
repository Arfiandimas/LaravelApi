<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'kelas'=>'required|max:255'
        ]);

        $kelas = new Kelas;
        $kelas->kelas = $req->kelas;
        $kelas->save();

        $message = [
            'message' => 'kelas berhasil dibuat',
            'kelas' => $kelas
        ];
        return response()->json($message, 201);
    }

    public function destroy($id){
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        $message = [
            'message' => 'kelas telah dihapus',
            'kelas' => $kelas
        ];
        return response()->json($message, 200);
    }
}
