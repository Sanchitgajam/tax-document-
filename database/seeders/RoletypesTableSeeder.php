<?php

namespace Database\Seeders;

use App\Models\Roletype;
use Illuminate\Database\Seeder;

class RoletypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Application',
                'created_by'=> 1
                
                
            ],
            [
                'id'    => 2,
                'title' => 'Client',
                'created_by'=> 1
                
            
            ],
            [
                'id'    => 3,
                'title' => 'Tax-Consultant',
                'created_by'=> 1
                
               
            ],

        ];

        Roletype::insert($roles);
    }
}
  


