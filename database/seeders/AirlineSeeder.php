<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Seeder;

class AirlineSeeder extends Seeder
{
    public function run()
    {
        $airlines = [
            ['name' => 'Austrian Airlines', 'code' => 'OS', 'logo' => 'austrian.jpg'],
            ['name' => 'Iraqi Airways', 'code' => 'IA', 'logo' => 'iraqi_airways.jpg'],
            ['name' => 'Royal Jordanian Airlines', 'code' => 'RJ', 'logo' => 'royal_jordanian.jpg'],
            ['name' => 'Lufthansa', 'code' => 'LH', 'logo' => 'Lufthansa-Logo2.gif'],
            ['name' => 'Middle East', 'code' => 'ME', 'logo' => 'mea-logo.jpg'],
            ['name' => 'Fly Dubai   ', 'code' => 'FZ', 'logo' => 'en-logo_flydubai.gif'],
            ['name' => 'Turkish Airlines', 'code' => 'TK', 'logo' => 'Turkish-Airlines.jpg'],
            ['name' => 'Egypt Air', 'code' => 'MS', 'logo' => 'Egypt-Air.jpg'],
            ['name' => 'Pegasus Airlines', 'code' => 'PC', 'logo' => 'pegasus_logo.jpg'],
            ['name' => 'Qatar Airways', 'code' => 'QR ', 'logo' => 'Qatar-airways-logo.jpg'],
            ['name' => 'Mahan Air', 'code' => 'W5', 'logo' => 'mahan-air.png'],
            ['name' => 'AirArabia', 'code' => 'G9', 'logo' => 'logo_airarabia.jpg'],
            ['name' => 'Fly Baghdad', 'code' => 'IF', 'logo' => 'baghdadd.gif'],
            ['name' => 'Cham Wings Airlines', 'code' => 'SAW', 'logo' => 'cham.jpg'],
            ['name' => 'Ur Airline', 'code' => 'UD', 'logo' => 'ur-airline-logo.jpg'],
            ['name' => 'SunExpress ', 'code' => 'XQ ', 'logo' => 'SunExpress.jpg'],
            ['name' => 'Tailwind Airline', 'code' => 'TI', 'logo' => 'tailwind-airline.jpg'],
            ['name' => 'Eurowings', 'code' => 'EW ', 'logo' => 'eurowings_logo.jpg'],
            ['name' => 'Pouya Air', 'code' => 'PY ', 'logo' => 'pouya-air.jpg'],
        ];

        foreach ($airlines as $item) {
            $airline = Airline::create([
                'name' => $item['name'],
                'code' => $item['code'],
            ]);

            $path = "/assets/images/Airline logos/" . $item['logo'];
            $airline->addMedia(public_path() . $path)->preservingOriginal()->usingName($airline->name)->toMediaCollection();

            // PlaneSeeder
            $planes = [];
            foreach (range(1, rand(1, 4)) as $key => $value) {
                $planes[] = [
                    'name' => "Boeing 737-" . rand(100, 900),
                    'code' => "B" . rand(730, 739),
                    'capacity' => rand(150, 200),
                ];
            }

            $airline->planes()->createMany($planes);
        }
    }
}
