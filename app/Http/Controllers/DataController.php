<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllMahasiswa()
    {
        $mahasiswa = Mahasiswa::all();
        $response = [
            'success' => true,
            'data' => $mahasiswa
        ];
        return response()->json($response);
    }

    public function getAllProdi()
    {
        $prodi = Prodi::all();
        $response = [
            'success' => true,
            'data' => $prodi
        ];
        return response()->json($response);
    }

    public function getAllMahasiswaByProdi(Request $request)
    {
        $prodi = $request->prodi;
        $mahasiswa = Mahasiswa::where('prodi', $prodi)->get();
        $response = [
            'success' => true,
            'data' => $mahasiswa
        ];
        return response()->json($response);
    }
    
}
