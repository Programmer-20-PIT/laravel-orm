<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::all();
        return response()->json($desa); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $desa = Desa::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $desa->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $desa = Desa::findOrFail($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa not found'], 900);
        }


        return response()->json($desa);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $desa = Desa::find($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $desa->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $desa->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desa = Desa::findOrFail($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa not found'], 404);
        }

        $desa->delete();

        return response()->json(['message' => $desa->name .' deleted successfully']);
    }
}
