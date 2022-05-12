<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Http\Traits\ApiJsonExternal;
use App\Models\User;

class UserSeed extends Seeder
{
    use ApiJsonExternal;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->getUsersData();

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'website' => $user['website'],
                'address' => json_encode($user['address']),
                'company' => json_encode($user['company'])
            ]);
        }
    }
}
