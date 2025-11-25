<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $doctor = Role::firstOrCreate(['name' => 'doctor']);
        $staff = Role::firstOrCreate(['name' => 'staff']);
        $patient = Role::firstOrCreate(['name' => 'patient']);

        // Create permissions
        $permissions = [
            'view patients',
            'add patients',
            'edit patients',
            'delete patients',
            'view users',
            'add users',
            'edit users',
            'delete users',
            'view lab_result',
            'add lab_result',
            'edit lab_result',
            'delete lab_result',
            'view vital_sign',
            'add vital_sign',
            'edit vital_sign',
            'delete vital_sign',
            'view dialysis_session',
            'add dialysis_session',
            'edit dialysis_session',
            'delete dialysis_session',
            'view session_staff',
            'add session_staff',
            'edit session_staff',
            'delete session_staff',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }
        $admin->givePermissionTo(Permission::all());


        $doctor->givePermissionTo([
            'view patients',
            'add patients',
            'edit patients',
            'view dialysis_session',
            'add dialysis_session',
            'edit dialysis_session',
            'view lab_result',
            'add lab_result',
            'edit lab_result',
            'view vital_sign',
            'add vital_sign',
            'edit vital_sign',
        ]);

        $staff->givePermissionTo([
            'view patients',
            'add patients',
            'edit patients',
            'view dialysis_session',
            'add dialysis_session',
            'edit dialysis_session',
            'view lab_result',
            'add lab_result',
            'edit lab_result',
            'view vital_sign',
            'add vital_sign',
            'edit vital_sign',
            'view session_staff',
            'add session_staff',
            'edit session_staff',
        ]);

        $patient->syncPermissions([]);


        $adminuser = User::create([
            'name' => 'admin',
            'email' => 'lovelyferrydomingo.basc@gmail.com',
            'password' => bcrypt('s@nildefonsodialysave')
        ]);
        $adminuser->assignRole('admin');
    }
}
