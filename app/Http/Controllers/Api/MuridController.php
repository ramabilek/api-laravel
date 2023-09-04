<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Murid::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);
          
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => $validator->errors()], 422);
                
        }
        $data = $validator->validated();
        Murid::create($data);

            if($data){
                return response()->json([
                   'message' => 'Data berhasil dibuat',
                   'data' =>  $data,
                ],200);
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Request $request, $id)
    {
        
        $data = Murid::find($id);

        if(!$data){
            return response()->json([
                'message'=>' data tidak ditemukan',

            ],404);

        }
        $validate = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

    $data->update($validate);
    if ($data){

        return response()->json([
            'message'=>' data berhasil dibuat',
            'data' => $data

        ],200);
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request,$id)
    {
        $data = Murid::find($id);

        if(!$data){
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        
        $data->delete();
        
        if($data){
            return response()->json([
               'message' => 'Data berhasil di-hapus',
               'data' =>  $data,
            ],200);
        }
        }
    }
