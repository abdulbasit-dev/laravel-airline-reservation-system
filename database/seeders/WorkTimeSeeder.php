<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_times')->delete();
        //generate dates from to one month ago
        $period = CarbonPeriod::create(now()->subDays(30), now());
        $dateRange = [];

        foreach ($period as $date) {
            array_unshift($dateRange, $date->format('Y-m-d'));
        }

        //find driver and sale representative users        
        $users = User::role(['sale-representative', 'driver'])->get();
        foreach ($users as $user) {
            foreach ($dateRange as $date) {
                $date = Carbon::parse($date)->setTime(0, 0, 0);
                $startTime = rand(28800, 36000);
                $endTime = rand($startTime + 7200, 64800);

                $start = (clone $date)->addSeconds($startTime);
                $end = (clone $date)->addSeconds($endTime);

                $user->workTimes()->create([
                    'start_time' => $start,
                    'end_time' => $end,
                    'total_time' => $start->diffInSeconds($end),
                    'start_lat' => 36.2396247,
                    'start_long' => 44.0119314,
                    'end_lat' => 36.1797996,
                    'end_long' => 43.993029,
                    'created_at' => $date,
                ]);
            }
        }
    }
}
