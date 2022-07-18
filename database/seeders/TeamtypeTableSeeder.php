<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamType;
use Illuminate\Support\Facades\Auth;

class TeamtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $teams= [
          
            [
                'id'    => 1,
                'title' => 'Application',
                'created_by'=>1,
            ],
            [
                'id'    => 2,
                'title' => 'Client',                
                'created_by'=>1,
            ],
            [
                'id'    => 3,
                'title' => 'Tax-Consultant',                
                'created_by'=>1,
            ],            
        ];

        TeamType::insert($teams);

    }
}