<?php

namespace Database\Seeders;

use App\Models\Layout;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
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
        // User::create([
        //     'name' => 'Admin',
        //     'foto' => 'image/default.png',
        //     'role' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin4@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin5@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin6@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin7@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin8@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin9@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'foto' => 'image/default.png',
            'role' => 'admin',
            'email' => 'admin10@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Layout::create([
        //     'tanggal' => Carbon::now()->isoFormat('D MMMM YYYY'),
        //     'tempat' => 'Ayodya Pala'
        // ]);
    }
}
