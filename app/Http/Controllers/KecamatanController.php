<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return response()->json($kecamatan); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $kecamatan = Kecamatan::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $kecamatan->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        if (!$kecamatan) {
            return response()->json(['message' => 'Kecamatan not found'], 900);
        }


        return response()->json($kecamatan);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $kecamatan = Kecamatan::find($id);

        if (!$kecamatan) {
            return response()->json(['message' => 'Kecamatan not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $kecamatan->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $kecamatan->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);

        if (!$kecamatan) {
            return response()->json(['message' => 'Kecamatan not found'], 404);
        }

        $kecamatan->delete();

        return response()->json(['message' => $kecamatan->name .' deleted successfully']);
    }
}
