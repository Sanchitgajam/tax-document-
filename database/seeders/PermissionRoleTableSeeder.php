<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Ramsey\Uuid\v1;

class PermissionRoleTableSeeder extends Seeder
{

    public function run()
    {

        
       $Application_admin = Permission::select('id')->whereIn('id', [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25])->get();
       Role::findOrFail(1)->permissions()->sync($Application_admin->pluck('id'));

        $Application_support = Permission::select('id')->whereIn('id', [11,14,6,9,1,4])->get();
        Role::findOrFail(2)->permissions()->sync($Application_support->pluck('id'));

        $Client_admin = Permission::select('id')->whereIn('id', [21,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40])->get();
        Role::findOrFail(3)->permissions()->sync($Client_admin->pluck('id'));

        $Client_user = Permission::select('id')->whereIn('id', [31,32,33,34,35,36,37,38,39,40])->get();
        Role::findOrFail(4)->permissions()->sync($Client_user->pluck('id'));

        $Tax_consultant_admin = Permission::select('id')->whereIn('id', [21,22,23,24,26,28,29,30,31,32,33,34,35,36,37,38,39,40])->get();
        Role::findOrFail(5)->permissions()->sync($Tax_consultant_admin->pluck('id'));

        $Tax_consultant_user = Permission::select('id')->whereIn('id', [31,32,33,34,35,36,37,38,39,40])->get();
        Role::findOrFail(6)->permissions()->sync($Tax_consultant_user->pluck('id'));

        $Client_Viewer = Permission::select('id')->whereIn('id', [21,24,26,29,31,34,36,39])->get();
        Role::findOrFail(7)->permissions()->sync($Client_Viewer->pluck('id'));

        $Tax_Consultant_Viewer = Permission::select('id')->whereIn('id', [21,24,26,29,31,34,36,39])->get();
        Role::findOrFail(8)->permissions()->sync($Tax_Consultant_Viewer->pluck('id'));

    }
}

