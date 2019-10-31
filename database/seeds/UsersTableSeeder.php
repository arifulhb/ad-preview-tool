<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'email' => env('ADMIN_EMAIL'),
            'account' => 'admin',
            'password' => env('ADMIN_PASSWORD'),
            'is_admin' => true,
            'is_active' => true
        ];

        $users = [$admin];

        foreach($users as $user){
            $record = User::create($user);
            $record->save();
        }
    }
}
