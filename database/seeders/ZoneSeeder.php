<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Seeder;
use DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('zones')->delete();

        $zones = ["Default"];
        foreach ($zones as $zone) {
            Zone::firstOrCreate([
                "name" => $zone,
                "created_by" => auth()->id()
            ]);
        }
    }
}
