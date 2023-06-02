<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use illuminate\Http\Response;


class APImahasiswaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::orderBy('nim', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
        $datamahasiswa = new Mahasiswa;
 
        $rules = [
            'nim' => 'required|unique:mahasiswa|numeric',
            'nama' => 'required',
            'jurusan' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

        $datamahasiswa->nim = $request->nim;
        $datamahasiswa->nama = $request->nama;
        $datamahasiswa->jurusan = $request->jurusan;

        $datamahasiswa->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dikirim',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = mahasiswa::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data tidak tertemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
        $datamahasiswa = mahasiswa::find($id);
        if(empty($datamahasiswa)){
            return response()->json([
                'status' => 'false',
                'message' => 'data tidak ditemukan',
            ],404);
        }
 
        $rules = [
            'nim' => 'required|numeric',
            'nama' => 'required',
            'jurusan' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

        $datamahasiswa->nim = $request->nim;
        $datamahasiswa->nama = $request->nama;
        $datamahasiswa->jurusan = $request->jurusan;

        $datamahasiswa->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil mengupdate data',
        ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
        $datamahasiswa = mahasiswa::find($id);
        if(empty($datamahasiswa)){
            return response()->json([
                'status' => 'false',
                'message' => 'data tidak ditemukan',
            ],404);
        }
       
        $datamahasiswa->delete();
        return response()->json([
            'status' => true,
            'message' => 'berhasil mengupdate data',
        ]);
    }
    }

}
