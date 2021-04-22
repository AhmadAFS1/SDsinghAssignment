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
                'price' => 1.50,
            ]);
            DB::table('prices')->insert([
                'state' => 'Others',
                'price' => 1.50,
            ]);
        }

        if(DB::table('users')->count() == 0){
            $state = array("TX", "AL", "CA", "FL");
            $thing = array("Avenue", "Lane", "Road", "Boulevard", "Drive", "Street", "Ave", "Dr", "Court", "Rd", "Blvd", "Ln", "St");
            $random_state_key = 0;
            $pass_arr = array();

            //User in TX
            $random_thing_key = array_rand($thing, 1);
            $random_password = Str::random(10);
            array_push($pass_arr, $random_password);
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make($random_password),
                'address1' => rand(1, 1000).' '.Str::random(10).' '.$thing[$random_thing_key],
                'city' => Str::random(10),
                'state' => 'TX',
                'zipcode' => rand(10000, 99999),
            ]);

            //User out TX
            $random_thing_key = array_rand($thing, 1);
            $random_password = Str::random(10);
            array_push($pass_arr, $random_password);
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make($random_password),
                'address1' => rand(1, 1000).' '.Str::random(10).' '.$thing[$random_thing_key],
                'city' => Str::random(10),
                'state' => 'CA',
                'zipcode' => rand(10000, 99999),
            ]);
            
            //Random Users
            for ($i = 0; $i < 3; $i++) {
                $random_thing_key = array_rand($thing, 1);
                $random_password = Str::random(10);
                array_push($pass_arr, $random_password);
                DB::table('users')->insert([
                    'name' => Str::random(10),
                    'email' => Str::random(10).'@gmail.com',
                    'password' => Hash::make($random_password),
                    'address1' => rand(1, 1000).' '.Str::random(10).' '.$thing[$random_thing_key],
                    'city' => Str::random(10),
                    'state' => $state[$random_state_key],
                    'zipcode' => rand(10000, 99999),
                ]);
                $random_state_key = array_rand($state, 1);
            }

            $user_arr = DB::table('users')->get();
            $user_arr_count = count($user_arr);
            file_put_contents('fake_user_accs.txt','');
            for ($i = 0; $i < $user_arr_count; $i++){
            $acc_string = 'User id: '.$user_arr[$i]->id."\nEmail: ".$user_arr[$i]->email."\nPassword: ".$pass_arr[$i]."\n\n";
            file_put_contents('fake_user_accs.txt', $acc_string, FILE_APPEND | LOCK_EX);
        }
        }

        if(DB::table('users')->count() > 0){
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
