<?php

namespace App\Http\Controllers;

use App\Services\PrayerServices;
use Illuminate\Http\Request;

class PrayerServicesController extends Controller
{
    protected $PrayerServices;

    public function __construct(PrayerServices $PrayerServices)
    {
        $this->PrayerServices = $PrayerServices;
    }

    public function index($location, $date)
{

    Log::info('index api fetch');
    // Dapatkan ID kota berdasarkan lokasi
    $cityId = $this->PrayerServices->getCityId($location);
    if (!$cityId) {
        return response()->json(['error' => 'City not found'], 404);
    }

    // Dapatkan jadwal sholat berdasarkan ID kota dan tanggal
    $prayerTimes = $this->PrayerServices->getPrayerTimes($cityId, $date);

    return response()->json($prayerTimes);
}

}
