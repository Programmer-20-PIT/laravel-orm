<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kota = Kota::all();
        return response()->json($kota); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $kota = Kota::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $kota->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kota = Kota::findOrFail($id);

        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 900);
        }


        return response()->json($kota);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $kota = Kota::find($id);

        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $kota->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $kota->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kota = Kota::findOrFail($id);

        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 404);
        }

        $kota->delete();

        return response()->json(['message' => $kota->name .' deleted successfully']);
    }
}
