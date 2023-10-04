<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=     User::create([
                    'name'=>'Gonzalo Peñaloza',
                    'email'=>'gonzaloenmundo@gmail.com',
                    'password'=>bcrypt('hola1234')
                ]);

        $user->assignRole('Admin');

        User::create([
            'name'=>'John Dollenz',
            'email'=>'dollenzjohn@gmail.com',
            'password'=>bcrypt('hola1234')
        ]);


    }
}
