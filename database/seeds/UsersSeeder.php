<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
        	'name' => 'admin', 
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin@123')
        ]);
  		// $role = Role::create(['name' => 'Admin','guard_name'=>'web']);
        $role = Role::find(1);
   
        $permissions = Permission::pluck('id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}
