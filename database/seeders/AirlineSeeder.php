<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class AirlineSeeder extends Seeder
{
    public function run()
    {
        $airlins = [
            ['name' => 'Austrian Airlines', 'code' => 'OS', 'logo' => '/Files/Image/austrian.jpg'],
            ['name' => 'Iraqi Airways', 'code' => 'IA', 'logo' => '/Files/Image/iraqi_airways.jpg'],
            ['name' => 'Royal Jordanian Airlines', 'code' => 'RJ', 'logo' => '/Files/Image/royal_jordanian.jpg'],
            ['name' => 'Lufthansa', 'code' => 'LH', 'logo' => '/Files/Image/Lufthansa-Logo2.gif'],
            ['name' => 'Middle East', 'code' => 'ME', 'logo' => '/Files/Image/mea-logo.jpg'],
            ['name' => 'Fly Dubai   ', 'code' => 'FZ', 'logo' => '/Files/Image/en-logo_flydubai.gif'],
            ['name' => 'Turkish Airlines', 'code' => 'TK', 'logo' => '/Files/Image/Turkish-Airlines.jpg.jpg'],
            ['name' => 'Egypt Air', 'code' => 'MS', 'logo' => '/Files/Image/Egypt-Air.jpg.jpg'],
            ['name' => 'Pegasus Airlines', 'code' => 'PC', 'logo' => '/Files/Image/pegasus_logo.jpg'],
            ['name' => 'Qatar Airways', 'code' => 'QR ', 'logo' => '/Files/Image/Qatar-airways-logo.jpg'],
            ['name' => 'Mahan Air', 'code' => 'W5', 'logo' => '/Files/Image/mahan-air.png'],
            ['name' => 'AirArabia', 'code' => 'G9', 'logo' => '/Files/Image/logo_airarabia.jpg'],
            ['name' => 'Fly Baghdad', 'code' => 'IF', 'logo' => '/Files/Image/baghdadd.gif'],
            ['name' => 'Cham Wings Airlines', 'code' => 'SAW', 'logo' => '/Files/Image/cham.jpg'],
            ['name' => 'Ur Airline', 'code' => 'UD', 'logo' => '/Files/Image/ur-airline-logo.jpg'],
            ['name' => 'SunExpress ', 'code' => 'XQ ', 'logo' => '/Files/Image/SunExpress'],
            ['name' => 'Tailwind Airline', 'code' => 'TI', 'logo' => '/Files/Image/tailwind-airline.jpg'],
            ['name' => 'Eurowings', 'code' => 'EW ', 'logo' => '/Files/Image/eurowings_logo.jpg'],
            ['name' => 'Pouya Air', 'code' => 'PY ', 'logo' => '/Files/Image/pouya-air.jpg'],
        ];
    }

}
