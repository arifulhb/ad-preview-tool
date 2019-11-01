<?php

use App\Models\Publisher;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', env('ADMIN_EMAIL'))->first();

        if ($user) {
            $publishers = [
                [
                    'name' => 'Google',
                    'slug' => Str::slug('Google'),
                    'is_active' => true,
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ];

            Publisher::insert($publishers);
        }

    }
}
