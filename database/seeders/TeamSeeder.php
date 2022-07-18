<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $email = 'applicationadmin@mailtrap.com';
        // $password = '123456789';
        // // Auth::login(['email' => $email, 'password' => $password]);
        // Auth::loginUsingId(1);
        // Auth::user()->switchTeam( 1 );
        // dd(auth()->user());
        $teams= [
            [
                'id'    => 999999999,
                'name' => 'Default-Admin Team',
                'owner_id'=> 1,
                'teamtype_id'=>1,
                'created_by'=>1,
            ],
            [
                'id'    => 1,
                'name' => 'Client Team1',
                'owner_id'=> 3,
                'teamtype_id'=>2,
                'created_by'=>1,
            ],
            [
                'id'    => 2,
                'name' => 'Client Team2',
                'owner_id'=> 4,
                'teamtype_id'=>2,
                'created_by'=>1,
            ],
            [
                'id'    => 3,
                'name' => 'Client Team3',
                'owner_id'=> 5,
                'teamtype_id'=>2,
                'created_by'=>1,
            ],
            [
                'id'    => 4,
                'name' => 'Tax-Consultant Team1',
                'owner_id'=> 12,
                'teamtype_id'=>3,
                'created_by'=>1,
            ],
            [
                'id'    => 5,
                'name' => 'Tax-Consultant Team2',
                'owner_id'=> 13,
                'teamtype_id'=>3,
                'created_by'=>1,

            ],
        ];

        Team::insert($teams);

    }
}