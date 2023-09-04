<?php

namespace App\Http\Controllers\Api;

use Api\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Mahasiswa::all();
return $data;
      
       }
    

    /**
     * Show the form for creating a new resource.
     */

        public function create(Request $request){
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'address' => 'required',
            ]);
              
            if ($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'message' => $validator->errors()], 422);
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
        
        $data = Mahasiswa::find($id);

        if(!$data){
            return response()->json([
                'message'=>' data tidak ditemukan',

            ],404);

        }
        $validate = $request->validate([

            'username' => 'required',
                'address' => 'required',
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
        $data = Mahasiswa::find($id);

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