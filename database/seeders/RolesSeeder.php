<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'title' => 'Manager',
            'permissions' => 'a:11:{i:0;s:17:"can_see_dashboard";i:1;s:16:"can_edit_setting";i:2;s:15:"can_see_setting";i:3;s:17:"can_see_user_list";i:4;s:18:"can_edit_user_list";i:5;s:13:"can_see_dhaka";i:6;s:16:"can_manage_dhaka";i:7;s:18:"can_see_chittagong";i:8;s:21:"can_manage_chittagong";i:9;s:14:"can_see_sylhet";i:10;s:17:"can_manage_sylhet";}',
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);

        Role::insert([
            'title' => 'dhaka',
            'permissions' => 'a:2:{i:0;s:13:"can_see_dhaka";i:1;s:16:"can_manage_dhaka";}',
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);
        Role::insert([
            'title' => 'chittagong',
            'permissions' => 'a:2:{i:0;s:18:"can_see_chittagong";i:1;s:21:"can_manage_chittagong";}',
            'created_by' => 2,
            'created_at' => Carbon::now(),
        ]);
    }
}
