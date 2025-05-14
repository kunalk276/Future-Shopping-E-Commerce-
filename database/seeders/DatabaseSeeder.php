<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'AdminKunal',
            'last_name' => 'AdminKadam',
            'email' => 'kunalkadam2762001@gmail.com',
            'password' => Hash::make('Admin@123'),
            'email_verified_at' => now(),
            'admin' => 1
        ]);

        User::create([
            'first_name' => 'Dhanaji',
            'last_name' => 'Kadam',
            'email' => 'dhanaji@gmail.com',
            'password' => Hash::make('Dhanaji@123'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
