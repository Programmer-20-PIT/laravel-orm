<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $negara = Negara::all();
        return response()->json($negara); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $negara = Negara::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Data ' . $negara->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $negara = Negara::findOrFail($id);

        if (!$negara) {
            return response()->json(['message' => 'Negara not found'], 900);
        }


        return response()->json($negara);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $negara = Negara::find($id);

        if (!$negara) {
            return response()->json(['message' => 'Negara not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $negara->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $negara->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $negara = Negara::findOrFail($id);

        if (!$negara) {
            return response()->json(['message' => 'Negara not found'], 404);
        }

        $negara->delete();

        return response()->json(['message' => $negara->name .' deleted successfully']);
    }
}
