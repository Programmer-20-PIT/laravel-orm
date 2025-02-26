<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PrayerServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class homeController extends Controller
{
    protected $prayerTimeService;
    protected $prayerTime;
    protected $timeNow;

    public function __construct(PrayerServices $prayerTimeService)
    {
        $this->prayerTimeService = $prayerTimeService;
        $this->timeNow = date('Y-m-d');

    }


    public function pondokName()
    {
        $data =
            DB::table('users')->orderBy('id', 'desc')
            ->paginate(10);

        $allData = User::all();

        $cityId = $this->prayerTimeService->getCityId('Bantul');

        if (!$cityId) {
            return response()->json(['error' => 'City not found'], 404);
        }
        // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
        $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $this->timeNow);

        Log::info($prayerTimes);


        return view('pages.dashboard', compact('data', 'allData', 'prayerTimes'));
    }
}
