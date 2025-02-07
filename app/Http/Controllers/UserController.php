<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::all();
        return response()->json($user); //respone untuk menangkap $request->format('html') di route
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Log::info('Ini all log 1');
        Log::info($request->all());
        try {
            $request->validate([
                'name' => 'required',
                'pondok_id' => 'required',
                'role_name' => 'nullable|string|in:Ustadz,Santri,Pengurus',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
        } catch (ValidationException $e) {
            Log::error('Validation failed:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        }
        
        Log::info('Ini all log 2');
        $user = User::create([
            'name' => $request->name,
            'pondok_id' => $request->pondok_id,
            'role_name' => $request->role_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // Log::info($request);
        Log::info('Ini all log 3');

        return response()->json([
            'message' => 'Data ' . $user->name . ' Berhasil Ditambahkan',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    try{
        $user = User::findOrFail($id);
        return response()->json($user);
    }catch(ModelNotFoundException $e){
        return view('error');
    }
    }

    /**
     * Update the specified resource in storage.
     */

    //kalo di postman pakai method PUT untuk update
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $datauser = $request->validate([
            'name' => 'required'
        ]);

        $user->update($datauser);

        return response()->json([
            'message' => 'Data ' . $user->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => $user->name .' deleted successfully']);
    }
}
