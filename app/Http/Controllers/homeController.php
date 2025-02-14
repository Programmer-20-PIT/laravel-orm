<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class homeController extends Controller
{
    public function pondokName()
    {
        $data = DB::table('users')->orderby('name', 'asc')->paginate(10);

        $allData = User::all();

        return view('pages.dashboard', ['allData' => $allData ,'data' => $data]);
    }

    public function getapi()
    {
        $resource = Http::get('https://api.myquran.com/v2/doa/acak');

        if($resource->successful())
        {
            $doa = $resource->json();

            return view('pages.dashboard', ['doa' => $doa]);
        }
    }
}
