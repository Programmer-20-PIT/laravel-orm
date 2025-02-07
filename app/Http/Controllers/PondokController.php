<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use App\Models\Pondok;
use Illuminate\Http\Request;

class PondokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pondok = Pondok::all();
        return response()->json($pondok); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pondok = Pondok::create([
            'name' => $request->name,
        ]);

       return response()->json([
           'message' => 'Data ' . $pondok->name . ' Berhasil Ditambahkan',
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pondok = Pondok::findOrFail($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 900);
        }


        return response()->json($pondok);
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $pondok = Pondok::find($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $pondok->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $pondok->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pondok = Pondok::findOrFail($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 404);
        }

        $pondok->delete();

        return response()->json(['message' => $pondok->name .' deleted successfully']);
    }
}
