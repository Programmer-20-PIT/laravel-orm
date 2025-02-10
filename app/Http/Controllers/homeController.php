<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function pondokName(){
        $data = User::all();
        $dataAll = User::all()->count();
        return view('pages.dashboard',['data' => $data,'dataAll' => $dataAll]);
    }
}
