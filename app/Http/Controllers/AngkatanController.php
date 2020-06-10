<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angkatan;

class AngkatanController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'tahun'=>'required|integer'
        ]);

        $angkatan = new Angkatan;
        $angkatan->tahun = $req->tahun;
        $angkatan->save();

        $message = [
            'message' => 'Angkatan berhasil dibuat',
            'angkatan' => $angkatan
        ];
        return response()->json($message, 201);
    }

    public function destroy($id){
        $angkatan = Angkatan::findOrFail($id);
        $angkatan->delete();

        $message = [
            'message' => 'Angkatan telah dihapus',
            'angkatan' => $angkatan
        ];
        return response()->json($message, 200);
    }
}
