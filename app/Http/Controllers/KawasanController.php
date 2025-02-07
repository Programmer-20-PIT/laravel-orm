<?php

namespace App\Http\Controllers;

use App\Models\Kawasan;
use Illuminate\Http\Request;

class KawasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kawasan = Kawasan::all();
        return response()->json($kawasan); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $kawasan = Kawasan::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $kawasan->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kawasan = Kawasan::findOrFail($id);

        if (!$kawasan) {
            return response()->json(['message' => 'Kawasan not found'], 900);
        }


        return response()->json($kawasan);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $kawasan = Kawasan::find($id);

        if (!$kawasan) {
            return response()->json(['message' => 'Kawasan not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $kawasan->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $kawasan->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kawasan = Kawasan::findOrFail($id);

        if (!$kawasan) {
            return response()->json(['message' => 'Kawasan not found'], 404);
        }

        $kawasan->delete();

        return response()->json(['message' => $kawasan->name .' deleted successfully']);
    }
}
