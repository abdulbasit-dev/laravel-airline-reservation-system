<?php

namespace Database\Seeders;

use App\Models\Setting;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        $settings = [
            [
                'key' => 'app_version',
                'value' => '1.0.0',
            ],
            [
                'key' => 'pre_expire_warning',
                'value' => '30', // in days
            ],
            [
                'key' => 'app_name',
                'value' => 'Nawand',
            ],
            [
                'key' => 'our_story',
                'value' => "Most countries have a long name and a short name. The long name is typically used in formal contexts and often describes the country's form of government. The short name is the country's common name by which it is typically identified.The names of most countries are derived from a feature of the land, the name of a historical tribe or person, or a directional description.",
            ],
            [
                'key' => 'about_app',
                'value' => 'In English the word has increasingly become associated with political divisions, so that one sense, associated with the indefinite article – "a country" – through misuse and subsequent conflation is now a synonym for state, or a former sovereign state, in the sense sovereign territory or "district, native land". An example of this in North America is Navajo Country.',
            ],
            [
                'key' => 'contact',
                'value' => json_encode([
                    'phone' => '+966 555 5555',
                    'phone2' => '+966 555 5555',
                    'facebook' => 'https://www.facebook.com/',
                    'twitter' => 'https://www.twitter.com/',
                    'linkedin' => 'https://www.linkedin.com/',
                ]),
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
