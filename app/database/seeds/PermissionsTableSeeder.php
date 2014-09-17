<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{

        $admin = Role::where('name', '=', 'administrator')->first();
        $perms = Permission::all();
        $admin->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'users manager')->first();
        $perms = Permission::where('name', '=', 'manage_users')
                            ->orWhere('name', '=', 'delete_users')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'premium author')->first();
        $perms = Permission::where('name', '=', 'manage_premium_casts')
                            ->orWhere('name', '=', 'manage_free_casts')
                            ->orWhere('name', '=', 'manage_series')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'author')->first();
        $perms = Permission::where('name', '=', 'manage_free_casts')
                            ->orWhere('name', '=', 'manage_series')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'eraser')->first();
        $perms = Permission::where('name', '=', 'delete_series')
                            ->orWhere('name', '=', 'delete_casts')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'premium user')->first();
        $perms = Permission::where('name', '=', 'view_premium_casts')
                            ->orWhere('name', '=', 'view_free_casts')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'user')->first();
        $perms = Permission::where('name', '=', 'view_free_casts')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));

        $man = Role::where('name', '=', 'guest')->first();
        $perms = Permission::where('name', '=', 'view_free_casts')
                            ->get();
        $man->perms()->sync(array_pluck($perms, 'id'));
	}

}
