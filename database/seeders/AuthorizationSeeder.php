<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthorizationSeeder extends Seeder
{
    public function run(): void
    {
        collect(['admin', 'user'])->each(
            fn($name) => Role::create(compact('name'))
        );

        collect(['apps.horizon.view', 'apps.pulse.view'])->each(
            fn($name) => Permission::create(compact('name'))
        );

        Role::findByName('admin')->givePermissionTo(Permission::all());
    }
}
