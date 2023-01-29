<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ([[
            'title' => 'Sender',
        ],[
            'title' => 'Biker',
        ]]);

        foreach($types as $type)
            UserType::create($type);
    }
}
