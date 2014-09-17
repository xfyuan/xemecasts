<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('roles')->delete();
        DB::table('permissions')->delete();

        $roles = ['Administrator', 'Users Manager', 'Eraser', 'Premium Author', 'Author', 'Premium User', 'User', 'Guest'];
        foreach ($roles as $role) {
			Role::create([
                'name' => $role
			]);
        }

        $perms = ['Manage Users', 'Manage Series', 'Manage Premium Casts', 'Manage Free Casts', 'Delete Users', 'Delete Series', 'Delete Casts', 'View Premium Casts', 'View Free Casts'];
        foreach ($perms as $perm) {
            Permission::create([
                'display_name' => $perm,
                'name' => str_replace(' ', '_', strtolower($perm)),
            ]);
        }
	}

}
