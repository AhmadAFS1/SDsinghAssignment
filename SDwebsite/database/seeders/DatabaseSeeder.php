<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if(DB::table('prices')->count() == 0){
            DB::table('prices')->insert([
                'state' => 'TX',
                'price' => 2.00,
            ]);
            DB::table('prices')->insert([
                'state' => 'Others',
                'price' => 3.00,
            ]);
        }

        if(DB::table('users')->count() == 0){
            $state = array("TX", "AL", "CA", "FL");
            $thing = array("Avenue", "Lane", "Road", "Boulevard", "Drive", "Street", "Ave", "Dr", "Court", "Rd", "Blvd", "Ln", "St");
            $random_state_key = 0;
            for ($i = 0; $i < 5; $i++) {
                $random_thing_key = array_rand($thing, 1);
                DB::table('users')->insert([
                    'name' => Str::random(10),
                    'email' => Str::random(10).'@gmail.com',
                    'password' => Hash::make('password'),
                    'address1' => rand(1, 1000).' '.Str::random(10).' '.$thing[$random_thing_key],
                    'city' => Str::random(10),
                    'state' => $state[$random_state_key],
                    'zipcode' => rand(10000, 99999),
                ]);
                $random_state_key = array_rand($state, 1);
            }
        }

        if(DB::table('users')->count() > 0){
            $user_arr = DB::table('users')->get();
            $user_arr_count = count($user_arr);
            //$user_id_arr_key = array_rand($user_id_arr, 1);
            //echo $user_arr;
            for ($i = 0; $i < 10; $i++) {
                $rand_user = $user_arr[rand(0, $user_arr_count - 1)];
                if($rand_user->state == 'TX'){
                    $SP = 2.0;
                }
                else {
                    $SP = 3.0;
                }
                $G = rand(1, 50) * 100;
                DB::table('quote_histories')->insert([
                    'user_id' => $rand_user->id,
                    'Gallons' => $G,
                    'Address' => $rand_user->address1.' '.$rand_user->city.' '.$rand_user->state.' '.$rand_user->zipcode,
                    'start' => date("Y-m-d H:i:s", mt_rand(time(),time() + (180 * 24 * 60 * 60))),
                    'Suggested_Price' => $SP,
                    'Due' => $SP * $G,
                ]);
            }
        }
    }
}
