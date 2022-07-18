<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\TeamUser;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamUser = [
            [
                'id'    => 1,
                'user_id' => 1,
                'team_id'=> 999999999,
                'role_id'=>1,
                'created_by'=>1,
            ],  
            [
                'id'    => 2,
                'user_id' => 2,
                'team_id'=> 999999999,
                'role_id'=>2,
                'created_by'=>1,
            ],
            [
                'id'    => 3,
                'user_id' => 3,
                'team_id'=> 1,
                'role_id'=> 3,
                'created_by'=>1,
            ],
            [
                'id'    => 4,
                'user_id' => 4,
                'team_id'=> 2,
               
                'role_id'=>3,
                'created_by'=>1,
            ],
            [
                'id'    => 5,
                'user_id' => 5,
                'team_id'=> 3,
               
                'role_id'=>3,
                'created_by'=>1,
            ],
            [
                'id'    => 6,
                'user_id' => 6,
                'team_id'=>1,                
                'role_id'=>4,
                'created_by'=>1,
            ],
            [
                'id'    => 7,
                'user_id' => 7,
                'team_id'=> 1,                
                'role_id'=>4,  
                'created_by'=>1,        
            ],
            [
                'id'    => 8,
                'user_id' => 8,
                'team_id'=> 2,
       
                'role_id'=>4,
                'created_by'=>1,
            ],
            [
                'id'    => 9,
                'user_id' => 9,
                'team_id'=> 2,
               
                'role_id'=>4,
                'created_by'=>1,
            ],
            [
                'id'    => 10,
                'user_id' => 10,
                'team_id'=> 3,
               
                'role_id'=>4,
                'created_by'=>1,
            ],
            [
                'id'    => 11,
                'user_id' => 11,
                'team_id'=> 3,
            
                'role_id'=>4,
                'created_by'=>1,
            ],
            [
                'id'    => 12,
                'user_id' => 12,
                'team_id'=> 4,
             
                'role_id'=>5,
                'created_by'=>1,
            ],
            [
                'id'    => 13,
                'user_id' => 13,
                'team_id'=> 5,
             
                'role_id'=>5,
                'created_by'=>1,
            ],
            [
                'id'    => 14,
                'user_id' => 14,
                'team_id'=> 4,
             
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 15,
                'user_id' => 15,
                'team_id'=> 4,
              
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 16,
                'user_id' => 16,
                'team_id'=> 5,
              
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 17,
                'user_id' => 17,
                'team_id'=> 5,
                
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 18,
                'user_id' => 14,
                'team_id'=> 1,
             
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 19,
                'user_id' => 15,
                'team_id'=> 1,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 20,
                'user_id' => 16,
                'team_id'=> 1,
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 21,
                'user_id' => 17,
                'team_id'=> 1,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 22,
                'user_id' => 14,
                'team_id'=> 2,
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 23,
                'user_id' => 15,
                'team_id'=> 2,
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 24,
                'user_id' => 16,
                'team_id'=> 2,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 25,
                'user_id' => 17,
                'team_id'=> 2,
                'role_id'=>6,
                'created_by'=>1,
            ],
            [
                'id'    => 26,
                'user_id' => 14,
                'team_id'=> 3,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 27,
                'user_id' => 15,
                'team_id'=> 3,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 28,
                'user_id' => 16,
                'team_id'=> 3,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 29,
                'user_id' => 17,
                'team_id'=> 3,
                'role_id'=> 6,
                'created_by'=>1,
            ],
            [
                'id'    => 30,
                'user_id' => 18,
                'team_id'=> 1,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 31,
                'user_id' => 19,
                'team_id'=> 1,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 32,
                'user_id' => 20,
                'team_id'=> 2,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 33,
                'user_id' => 21,
                'team_id'=> 2,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 34,
                'user_id' => 22,
                'team_id'=> 3,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 35,
                'user_id' => 23,
                'team_id'=> 3,
                'role_id'=> 7,
                'created_by'=>1,
            ],
            [
                'id'    => 36,
                'user_id' => 24,
                'team_id'=> 4,
                'role_id'=> 8,
                'created_by'=>1,
            ],
            [
                'id'    => 37,
                'user_id' => 25,
                'team_id'=> 4,
                'role_id'=> 8,
                'created_by'=>1,
            ],
            [
                'id'    => 38,
                'user_id' => 26,
                'team_id'=> 5,
                'role_id'=> 8,
                'created_by'=>1,
            ],
            [
                'id'    => 39,
                'user_id' => 27,
                'team_id'=> 5,
                'role_id'=> 8,
                'created_by'=>1,
            ],
        ];
        
        TeamUser::insert($teamUser);
    }
}

