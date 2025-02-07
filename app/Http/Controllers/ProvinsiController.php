<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return response()->json($provinsi); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $provinsi = Provinsi::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $provinsi->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $provinsi = Provinsi::findOrFail($id);

        if (!$provinsi) {
            return response()->json(['message' => 'Provinsi not found'], 900);
        }


        return response()->json($provinsi);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $provinsi = Provinsi::find($id);

        if (!$provinsi) {
            return response()->json(['message' => 'Provinsi not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $provinsi->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $provinsi->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provinsi = Provinsi::findOrFail($id);

        if (!$provinsi) {
            return response()->json(['message' => 'Provinsi not found'], 404);
        }

        $provinsi->delete();

        return response()->json(['message' => $provinsi->name .' deleted successfully']);
    }
}
