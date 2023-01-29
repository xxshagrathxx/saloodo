<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ([[
            'name' => 'Sender1',
            'email' => 'sender1@sender.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
        ],[
            'name' => 'Sender2',
            'email' => 'sender2@sender.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
        ],[
            'name' => 'Sender3',
            'email' => 'sender3@sender.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
        ],[
            'name' => 'Sender4',
            'email' => 'sender4@sender.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
        ],[
            'name' => 'Sender5',
            'email' => 'sender5@sender.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 1,
        ],[
            'name' => 'Biker1',
            'email' => 'biker1@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker2',
            'email' => 'biker2@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker3',
            'email' => 'biker3@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker4',
            'email' => 'biker4@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker5',
            'email' => 'biker5@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker6',
            'email' => 'biker6@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker7',
            'email' => 'biker7@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker8',
            'email' => 'biker8@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker9',
            'email' => 'biker9@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ],[
            'name' => 'Biker10',
            'email' => 'biker10@biker.com',
            'password' => Hash::make('12345678'),
            'user_type_id' => 2,
        ]]);

        foreach($users as $user)
            User::create($user);
    }
}
