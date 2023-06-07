<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list babies']);
        Permission::create(['name' => 'view babies']);
        Permission::create(['name' => 'create babies']);
        Permission::create(['name' => 'update babies']);
        Permission::create(['name' => 'delete babies']);

        Permission::create(['name' => 'list babydevelopmentmilestones']);
        Permission::create(['name' => 'view babydevelopmentmilestones']);
        Permission::create(['name' => 'create babydevelopmentmilestones']);
        Permission::create(['name' => 'update babydevelopmentmilestones']);
        Permission::create(['name' => 'delete babydevelopmentmilestones']);

        Permission::create(['name' => 'list babymedicalhistories']);
        Permission::create(['name' => 'view babymedicalhistories']);
        Permission::create(['name' => 'create babymedicalhistories']);
        Permission::create(['name' => 'update babymedicalhistories']);
        Permission::create(['name' => 'delete babymedicalhistories']);

        Permission::create(['name' => 'list babyprogresshealthreports']);
        Permission::create(['name' => 'view babyprogresshealthreports']);
        Permission::create(['name' => 'create babyprogresshealthreports']);
        Permission::create(['name' => 'update babyprogresshealthreports']);
        Permission::create(['name' => 'delete babyprogresshealthreports']);

        Permission::create(['name' => 'list babyvaccinations']);
        Permission::create(['name' => 'view babyvaccinations']);
        Permission::create(['name' => 'create babyvaccinations']);
        Permission::create(['name' => 'update babyvaccinations']);
        Permission::create(['name' => 'delete babyvaccinations']);

        Permission::create(['name' => 'list birthcertificates']);
        Permission::create(['name' => 'view birthcertificates']);
        Permission::create(['name' => 'create birthcertificates']);
        Permission::create(['name' => 'update birthcertificates']);
        Permission::create(['name' => 'delete birthcertificates']);

        Permission::create(['name' => 'list bloodtypes']);
        Permission::create(['name' => 'view bloodtypes']);
        Permission::create(['name' => 'create bloodtypes']);
        Permission::create(['name' => 'update bloodtypes']);
        Permission::create(['name' => 'delete bloodtypes']);

        Permission::create(['name' => 'list cards']);
        Permission::create(['name' => 'view cards']);
        Permission::create(['name' => 'create cards']);
        Permission::create(['name' => 'update cards']);
        Permission::create(['name' => 'delete cards']);

        Permission::create(['name' => 'list clinics']);
        Permission::create(['name' => 'view clinics']);
        Permission::create(['name' => 'create clinics']);
        Permission::create(['name' => 'update clinics']);
        Permission::create(['name' => 'delete clinics']);

        Permission::create(['name' => 'list allcomposesms']);
        Permission::create(['name' => 'view allcomposesms']);
        Permission::create(['name' => 'create allcomposesms']);
        Permission::create(['name' => 'update allcomposesms']);
        Permission::create(['name' => 'delete allcomposesms']);

        Permission::create(['name' => 'list deseases']);
        Permission::create(['name' => 'view deseases']);
        Permission::create(['name' => 'create deseases']);
        Permission::create(['name' => 'update deseases']);
        Permission::create(['name' => 'delete deseases']);

        Permission::create(['name' => 'list fathers']);
        Permission::create(['name' => 'view fathers']);
        Permission::create(['name' => 'create fathers']);
        Permission::create(['name' => 'update fathers']);
        Permission::create(['name' => 'delete fathers']);

        Permission::create(['name' => 'list insurances']);
        Permission::create(['name' => 'view insurances']);
        Permission::create(['name' => 'create insurances']);
        Permission::create(['name' => 'update insurances']);
        Permission::create(['name' => 'delete insurances']);

        Permission::create(['name' => 'list messagetemplates']);
        Permission::create(['name' => 'view messagetemplates']);
        Permission::create(['name' => 'create messagetemplates']);
        Permission::create(['name' => 'update messagetemplates']);
        Permission::create(['name' => 'delete messagetemplates']);

        Permission::create(['name' => 'list mothers']);
        Permission::create(['name' => 'view mothers']);
        Permission::create(['name' => 'create mothers']);
        Permission::create(['name' => 'update mothers']);
        Permission::create(['name' => 'delete mothers']);

        Permission::create(['name' => 'list motherhealthstatuses']);
        Permission::create(['name' => 'view motherhealthstatuses']);
        Permission::create(['name' => 'create motherhealthstatuses']);
        Permission::create(['name' => 'update motherhealthstatuses']);
        Permission::create(['name' => 'delete motherhealthstatuses']);

        Permission::create(['name' => 'list mothermedicalhistories']);
        Permission::create(['name' => 'view mothermedicalhistories']);
        Permission::create(['name' => 'create mothermedicalhistories']);
        Permission::create(['name' => 'update mothermedicalhistories']);
        Permission::create(['name' => 'delete mothermedicalhistories']);

        Permission::create(['name' => 'list pregnants']);
        Permission::create(['name' => 'view pregnants']);
        Permission::create(['name' => 'create pregnants']);
        Permission::create(['name' => 'update pregnants']);
        Permission::create(['name' => 'delete pregnants']);

        Permission::create(['name' => 'list allpregnantcomplications']);
        Permission::create(['name' => 'view allpregnantcomplications']);
        Permission::create(['name' => 'create allpregnantcomplications']);
        Permission::create(['name' => 'update allpregnantcomplications']);
        Permission::create(['name' => 'delete allpregnantcomplications']);

        Permission::create(['name' => 'list prenatalapointments']);
        Permission::create(['name' => 'view prenatalapointments']);
        Permission::create(['name' => 'create prenatalapointments']);
        Permission::create(['name' => 'update prenatalapointments']);
        Permission::create(['name' => 'delete prenatalapointments']);

        Permission::create(['name' => 'list schedules']);
        Permission::create(['name' => 'view schedules']);
        Permission::create(['name' => 'create schedules']);
        Permission::create(['name' => 'update schedules']);
        Permission::create(['name' => 'delete schedules']);

        Permission::create(['name' => 'list allsms']);
        Permission::create(['name' => 'view allsms']);
        Permission::create(['name' => 'create allsms']);
        Permission::create(['name' => 'update allsms']);
        Permission::create(['name' => 'delete allsms']);

        Permission::create(['name' => 'list vacinations']);
        Permission::create(['name' => 'view vacinations']);
        Permission::create(['name' => 'create vacinations']);
        Permission::create(['name' => 'update vacinations']);
        Permission::create(['name' => 'delete vacinations']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'staff']);
        $userRole->givePermissionTo($currentPermissions);

        //create parent role and assign permissions related to parents
        $parentRole = Role::create(['name' => 'parent']);
        $parentRole->givePermissionTo(['list babies', 'view babies', 'create babies', 'update babies', 'delete babies', 'list clinics', 'view clinics', 'list insurances', 'view insurances', 'list pregnants', 'view pregnants', 'list prenatalapointments', 'view prenatalapointments', 'list schedules', 'view schedules', 'list vacinations', 'view vacinations']);

        //create doctor role and assign permissions related to doctors
        $doctorRole = Role::create(['name' => 'doctor']);
        $doctorRole->givePermissionTo(['list babies', 'view babies', 'list clinics', 'view clinics', 'list pregnants', 'view pregnants', 'list prenatalapointments', 'view prenatalapointments', 'list schedules', 'view schedules', 'list vacinations', 'view vacinations']);

        //create nurse role and assign permissions related to nurses
        $nurseRole = Role::create(['name' => 'nurse']);
        $nurseRole->givePermissionTo(['list babies', 'view babies', 'list clinics', 'view clinics', 'list pregnants', 'view pregnants', 'list prenatalapointments', 'view prenatalapointments', 'list schedules', 'view schedules', 'list vacinations', 'view vacinations']);

        
       

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        //create admin role and assign permissions related to admins
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['list roles', 'view roles', 'create roles', 'update roles', 'delete roles', 'list permissions', 'view permissions', 'create permissions', 'update permissions', 'delete permissions', 'list users', 'view users', 'create users', 'update users', 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
