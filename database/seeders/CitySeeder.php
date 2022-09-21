<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            "Erbil",
            "Amman",
            "Antalya",
            "Athens",
            "Baghdad",
            "Bahrain",
            "Basra",
            "Beirut",
            "Damascus",
            "Dubai",
            "Dusseldorf",
            "Eindhoven",
            "Frankfurt",
            "Gothenburg",
            "Istanbul",
            "Jeddah",
            "London",
            "Malmo",
            "Manchester",
            "Munich",
            "Najaf",
            "Oslo",
            "Stockholm",
            "Tehran",
            "Vienna",
            "Orumiyeh",
            "Abu",
            "Amsterdam",
            "Copenhagen",
            "Sulaimany",
            "Madina",
            "Larnaca",
            "Cairo",
            "Ankara",
            "Antalya",
            "Doha",
            "sharjah",
            "Tbilisi",
            "Batumi",
            "Adana",
            "Tunis",
            "Berlin",
            "Yerevan",
            "Adana",
            "Stuttgart",
            "Baku",
            "Diyarbakir",
            "Gaziantep",
            "Minsk",
            "Nasiriyah",
            "Istanbul",
            "Kiev",
            "Nuremberg",
            "Odessa",
            "Birmingham",
            "Amsterdam",
            "Rotterdam",
            "Cologne",
            "Trabzon",
            "Mugla",
            "Madrid",
            "Bucharest",
            "Prague",
            "Hanover",
            "Aleppo",
            "Urmia",
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
            ]);
        }
    }
}
