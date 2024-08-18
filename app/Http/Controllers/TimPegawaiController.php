<?php

namespace App\Http\Controllers;

use App\Models\MasterPegawai;
use App\Models\MasterTim;
use App\Models\TrxTimPegawai;
use Illuminate\Http\Request;

class TimPegawaiController extends Controller
{
    public function getData()
    {
        try {
            // Get Data Pegawai 
            $data = TrxTimPegawai::join('mst_tim', 'mst_tim.tim_id', 'trx_tim_peg.tim_id')
                ->join('pegawai', 'pegawai.peg_id', 'trx_tim_peg.peg_id')
                ->paginate(15);

            return response()->json(['success' => true, 'message' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Data not Found', 'error' => $e->getMessage()]);
        }
    }

    public function addData(Request $request)
    {
        try {
            // Custom validation messages
            $messages = [
                'peg_id.required' => 'Nama Pegawai wajib dipilih.',
                'tim_id.required' => 'Nama Tim wajib dipilih.'
            ];

            $data = $request->validate([
                'peg_id' => 'required',
                'tim_id' => 'required'
            ], $messages);

            // fungsi insert 
            $data = TrxTimPegawai::create([
                'tim_id' => $data['tim_id'],
                'peg_id' => $data['peg_id'],
                'created_at' => now()
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil menambahkan data', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed Insert Data', 'error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        // dd($id);
        try {
            $data = TrxTimPegawai::findOrFail($id);

            $data->delete();

            return response()->json(['success' => true, 'message' => 'Berhasil Hapus data', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed Delete Data', 'error' => $e->getMessage()]);
        }
    }
}
