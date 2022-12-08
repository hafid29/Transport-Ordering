<?php

namespace App\Http\Controllers;

use App\Helper\ApiKendaraan;
use App\Models\Kendaraan;
use App\http\Controllers\Controller;
use App\Http\Controllers\Exception;
use App\Models\JenisKendaraan;
use Exception as GlobalException;
use Illuminate\Http\Request;
use JsonException;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kendaraan::all();

        if ($data) {
            return ApiKendaraan::JsonResponse(200, 'Success', $data);
        } else {
            return ApiKendaraan::JsonResponse(400, 'Failed');
        }
        
    }

    public function pemesanan()
    {
        $data = JenisKendaraan::all();

        if ($data) {
            return ApiKendaraan::JsonResponse(200, 'Success', $data);
        } else {
            return ApiKendaraan::JsonResponse(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required', 
                'role' => 'required', 
            ]);
            $kendaraan = Kendaraan::create([
                'nama' => $request->nama, 
                'role' => $request->role
            ]);

            $data = Kendaraan::where('id', '=', $kendaraan->id)->get();
        
            if ($data) {
                return ApiKendaraan::JsonResponse(200, 'Success', $data);
            } else {
                return ApiKendaraan::JsonResponse(400, 'Failed');
            }
        } catch (GlobalException $error) {
            // var_dump($error);
            dd($error);
            // return ApiKendaraan::JsonResponse(400, 'Failed');
        }
    }
    public function storePemesanan(Request $request)
    {
        try {
            $request->validate([
                'kendaraan' => 'required', 
                'hak_milik' => 'required', 
            ]);
            $kendaraan = JenisKendaraan::create([
                'kendaraan' => $request->kendaraan, 
                'hak_milik' => $request->hak_milik
            ]);

            $data = JenisKendaraan::where('id', '=', $kendaraan->id)->get();
        
            if ($data) {
                return ApiKendaraan::JsonResponse(200, 'Success', $data);
            } else {
                return ApiKendaraan::JsonResponse(400, 'Failed');
            }
        } catch (GlobalException $error) {
            // var_dump($error);
            dd($error);
            // return ApiKendaraan::JsonResponse(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
