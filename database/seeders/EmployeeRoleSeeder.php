<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeRoles;

class EmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeRoles::create([
            'empr_role' => 'Manager',
            'empr_desc' => 'Manage the Branch Request for Quotation',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        EmployeeRoles::create([
            'empr_role' => 'Field Technician',
            'empr_desc' => 'Goes to clients location to configure',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        EmployeeRoles::create([
            'empr_role' => 'Sales Staffs',
            'empr_desc' => 'manage clients product inquiries',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        EmployeeRoles::create([
            'empr_role' => 'Support',
            'empr_desc' => 'Buy wards',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
