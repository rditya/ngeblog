<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'rama',
                'email' => 'rama7adit@yahoo.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('adit121q'),
                'isAdmin' => '1',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'adit',
                'email' => 'oneechan72@yahoo.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'password' => bcrypt('adit121q'),
                'isAdmin' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


        ]);
    }
}
