<?php

namespace Database\Seeders;

use App\Models\alamat;
use App\Models\alamat_table;
use App\Models\desa;
use App\Models\kawasan;
use App\Models\kecamatan;
use App\Models\kota;
use App\Models\negara;
use App\Models\pondok;
use App\Models\provinsi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $negaras = negara::factory(2)->create();
        foreach($negaras as $negara){
            $provinsis = provinsi::factory(2)->create(["negara_id"=> $negara->id]);
            foreach($provinsis as $provinsi){
                $kotas = kota::factory(2)->create(["provinsi_id"=> $provinsi->id]);
                foreach($kotas as $kota){
                    $kecamatans = kecamatan::factory(2)->create(["kota_id"=> $kota->id]);
                    foreach($kecamatans as $kecamatan){
                        $desas = desa::factory(2)->create(["kecamatan_id"=> $kecamatan->id]);
                        foreach($desas as $desa){
                            $alamats = alamat::factory(4)->create(["desa_id"=> $desa->id]);
                            
                            for ($i = 0; $i < count($alamats); $i++){
                                pondok::factory()->create();
                                kawasan::factory()->create();
                                User::factory()->create();
                                alamat_table::factory()->create();
                            }
                        }
                    }
                }
            }
        }
    }
}
