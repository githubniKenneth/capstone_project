<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Employee::create([
            'branch_id' => '1',
            'empr_id' => '1',
            'emp_first_name' => 'Kenneth',
            'emp_middle_name' => 'Buli',
            'emp_last_name' => 'Hontuca',
            'emp_full_name' => 'Kenneth Buli Hontucan',
            'emp_suffix' => null,
            'emp_lot_no' => '787-C',
            'emp_street' => 'Limasawa St.',
            'emp_brgy' => 'Pitogo',
            'emp_city' => 'Makati City',
            'emp_full_address' => '787-C Limasawa St. Pitogo Makati City',
            'emp_tele_no' => null,
            'emp_phone_no' => '09123123123',
            'emp_email' => 'hontucankenneth@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Employee::create([
            'branch_id' => '2',
            'empr_id' => '3',
            'emp_first_name' => 'Cyber',
            'emp_middle_name' => 'C',
            'emp_last_name' => 'Angustia',
            'emp_full_name' => 'Cyber C Angustia',
            'emp_suffix' => 'Jr.',
            'emp_lot_no' => '1',
            'emp_street' => 'Street',
            'emp_brgy' => 'Barangay',
            'emp_city' => 'City',
            'emp_full_address' => '1 Street Barangay City',
            'emp_tele_no' => null,
            'emp_phone_no' => '09123613732',
            'emp_email' => 'cyber@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Employee::create([
            'branch_id' => '3',
            'empr_id' => '4',
            'emp_first_name' => 'Roice ivan',
            'emp_middle_name' => 'B',
            'emp_last_name' => 'Bulalacao',
            'emp_full_name' => 'Roice Ivan B Bulalacao',
            'emp_suffix' => null,
            'emp_lot_no' => '2',
            'emp_street' => 'Street',
            'emp_brgy' => 'BCDA',
            'emp_city' => 'Taguig City',
            'emp_full_address' => '2 Street BCDA Taguig City',
            'emp_tele_no' => null,
            'emp_phone_no' => '09123456789',
            'emp_email' => 'roice@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Employee::create([
            'branch_id' => '2',
            'empr_id' => '2',
            'emp_first_name' => 'Christy',
            'emp_middle_name' => null,
            'emp_last_name' => 'Fab',
            'emp_full_name' => 'Christy Fab',
            'emp_suffix' => null,
            'emp_lot_no' => null,
            'emp_street' => 'Limasawa St. Pitogo Makati City',
            'emp_brgy' => null,
            'emp_city' => 'Makati City',
            'emp_full_address' => 'Limasawa St. Pitogo Makati City',
            'emp_tele_no' => null,
            'emp_phone_no' => '09123456789',
            'emp_email' => 'christy.fab@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Employee::create([
            'branch_id' => '3',
            'empr_id' => '1',
            'emp_first_name' => 'Doug',
            'emp_middle_name' => 'C',
            'emp_last_name' => 'Schmidth',
            'emp_full_name' => 'Doug C Schmidth Jr',
            'emp_suffix' => 'Jr',
            'emp_lot_no' => 'blk 25',
            'emp_street' => 'england',
            'emp_brgy' => 'mexico',
            'emp_city' => 'New york',
            'emp_full_address' => 'blk 25 england mexico New york',
            'emp_tele_no' => '3333',
            'emp_phone_no' => '44444',
            'emp_email' => 'ccharilie@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
