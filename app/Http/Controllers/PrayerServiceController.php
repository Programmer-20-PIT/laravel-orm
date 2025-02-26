<?php

namespace App\Http\Controllers;

use App\Services\PrayerServices;
use Illuminate\Http\Request;

class PrayerServiceController extends Controller
{
    protected $prayerTimeService;
    protected $timeNow ;

    public function __construct(PrayerServices $prayerTimeService)
    {
        $this->prayerTimeService = $prayerTimeService;
        $this->timeNow = date('Y-m-d');
    }

    public function index($cityName = 'Bantul')
    {
        $date = $this->timeNow;
        // Dapatkan ID kota berdasarkan lokasi
        $cityId = $this->prayerTimeService->getCityId($cityName);

        if (!$cityId) {
            return response()->json(['error' => 'City not found'], 404);
        }

        // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
        $prayerTimes = $this->prayerTimeService->getPrayerTimes($cityId, $date);

        return response()->json($prayerTimes);
    }
}
