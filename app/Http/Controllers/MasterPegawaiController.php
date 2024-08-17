<?php

namespace App\Http\Controllers;

use App\Models\MasterPegawai;
use Illuminate\Http\Request;

class MasterPegawaiController extends Controller
{
    public function getData()
    {
        try {
            // Get Data Pegawai 
            $data = MasterPegawai::paginate(10);

            return response()->json(['success' => true, 'message' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data Pegawai not Found', 'error' => $e->getMessage()]);
        }
    }

    public function addData(Request $request)
    {

        // dd($request);
        try {
            // Custom validation messages
            $messages = [
                'peg_nama.required' => 'Nama Pegawai wajib diisi.',
                'peg_nama.string' => 'Nama Pegawai harus berupa teks.'
            ];

            // Validasi data
            $validate = $request->validate([
                'peg_nama' => 'required|string',
            ], $messages);

            // fungsi insert
            $data = MasterPegawai::create([
                'peg_nama' => $validate['peg_nama'],
                'created_at' => now()
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil mebambahkan data', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed Insert Data', 'error' => $e->getMessage()]);
        }
    }
}
