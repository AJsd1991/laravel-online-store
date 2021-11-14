<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code'           => 'DcbA10',
            'percent'          => 7,
            'limit'       => 35,
            'expire_time' => '2021-10-20 12:21:28',
            'couponable_id'        => 2,
            'couponable_type'        => 'App\Models\User',
        ]);
    }
}
