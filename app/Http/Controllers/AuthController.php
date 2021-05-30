<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $nim = $request->nim;
        $password = $request->password;

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if ($mahasiswa) {
            if ($password == $mahasiswa->password) {
                $data_login = [
                    'id' => $mahasiswa->id_mahasiswa,
                    'nim' => $mahasiswa->nim,
                    'nama' => $mahasiswa->nama
                ];
                $response = [
                    'success' => true,
                    'message' => 'Success Logged In',
                    'data' => $data_login
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Wrong Password'
                ];
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'User not found'
            ];
            return response()->json($response);
        }
    }

    public function register(Request $request)
    {
        $nama= $request->nama;
        $nim = $request->nim;
        $no_hp = $request->no_hp;
        $prodi = $request->prodi;
        $password = $request->password;
        
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = $nama;
        $mahasiswa->nim = $nim;
        $mahasiswa->no_hp = $no_hp;
        $mahasiswa->prodi = $prodi;
        $mahasiswa->password = $password;
        $mahasiswa->save();

        $response = [
            'success' => true,
            'message' => 'Data saved successfully'
        ];

        return response()->json($response);
    }
}
