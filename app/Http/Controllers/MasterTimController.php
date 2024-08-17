<?php

namespace App\Http\Controllers;

use App\Models\MasterTim;
use Illuminate\Http\Request;

class MasterTimController extends Controller
{
    public function getData()
    {
        try {
            // Get Data Pegawai 
            $data = MasterTim::paginate(10);

            return response()->json(['success' => true, 'message' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data Master Tim not Found', 'error' => $e->getMessage()]);
        }
    }

    public function addData(Request $request)
    {
        try {
            // Custom validation messages
            $messages = [
                'tim_nama.required' => 'Nama tim wajib diisi.',
                'tim_nama.string' => 'Nama tim harus berupa teks.'
            ];

            // Validasi data
            $validate = $request->validate([
                'tim_nama' => 'required|string',
            ], $messages);

            // fungsi insert 
            $data = MasterTim::create([
                'tim_nama' => $validate['tim_nama'],
                'created_at' => now()
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil menambahkan data', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed Insert Data', 'error' => $e->getMessage()]);
        }
    }
}
