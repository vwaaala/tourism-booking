<?php

namespace Bunker\TourismBooking\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TourismBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'tb_service_create',
            'tb_service_edit',
            'tb_service_delete',
            'tb_service_show',
            'tb_region_create',
            'tb_region_edit',
            'tb_region_delete',
            'tb_region_show',
            'tb_destination_create',
            'tb_destination_edit',
            'tb_destination_delete',
            'tb_destination_show',
            'tb_package_create',
            'tb_package_edit',
            'tb_package_delete',
            'tb_package_show',
            'tb_package_event_create',
            'tb_package_event_edit',
            'tb_package_event_delete',
            'tb_package_event_show',
            'tb_booking_create',
            'tb_booking_edit',
            'tb_booking_delete',
            'tb_booking_show',
            'tb_faq_create',
            'tb_faq_edit',
            'tb_faq_delete',
            'tb_faq_show',
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $super = Role::where(['name' => 'Super Admin'])->first();
        $super->givePermissionTo($permissions);
    }
}
