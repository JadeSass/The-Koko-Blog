<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $user = App\User::create([
                'name' => 'Koko Blog',
                'email' => 'koko@gmail.com',
                'password' => bcrypt('password'),
                'admin' => 1
            ]);
            // Profile creation table and seeds to the DB
            App\Profile::create([
                'user_id' => str_random(20),
                'avatar' => 'uploads/avatars/default-avatar.jpg',
                'number' => '08123456789',
                'facebook' => 'https://facebook.com/kokoblog'
            ]);
        }
    }
}
