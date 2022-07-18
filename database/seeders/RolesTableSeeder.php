<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => ' Application Admin',
                'roletype_id' => 1,
                'created_by'=> 1,
                'updated_by'=>1
               
            ],
            [
                'id'    => 2,
                'title' => 'Application Support',
                'roletype_id' => 1,
                'created_by'=> 1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 3,
                'title' => 'Client Admin',
                'roletype_id' => 2,
                'created_by'=> 1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 4,
                'title' => 'Client User',
                'roletype_id' => 2,
                'created_by'=>1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 5,
                'title' => 'Tax-Consultant Admin',
                'roletype_id' => 3,
                'created_by'=> 1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 6,
                'title' => 'Tax-Consultant User',
                'roletype_id' => 3,
                'created_by'=> 1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 7,
                'title' => 'Client Viewer',
                'roletype_id' => 2,
                'created_by'=> 1,
                'updated_by'=>1
                
            ],
            [
                'id'    => 8,
                'title' => 'Tax-Consultant Viewer',
                'roletype_id' => 3,
                'created_by'=> 1,
                'updated_by'=>1
                
            ]

        ];

        Role::insert($roles);
    }
}
