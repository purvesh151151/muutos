<?php

use Illuminate\Database\Seeder;
use App\Permission;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'job-list',
           'job-create',
           'job-edit',
           'job-delete',
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission,'guard_name'=>'web']);
        }
    }
}
