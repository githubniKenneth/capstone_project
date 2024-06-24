<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'branch_name' => 'Cavite Branch',
            'branch_lot_no' => 'B38 L23',
            'branch_street' => 'P1 Cityhomes Resortsville Langkaan 2',
            'branch_brgy' => 'Dasmariñas',
            'branch_city' => 'Cavity',
            'full_address' => 'B38 L23 P1 Cityhomes Resortsville Langkaan 2 Dasmariñas Cavite',
            'branch_tele_no' => '(046)-866-7729',
            'branch_phone_no' => '09123456789',
            'branch_email' => 'citisec2020@gmail.com',
            'branch_status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        
        User::create([
            'branch_name' => 'Manila Branch',
            'branch_lot_no' => null,
            'branch_street' => '2675 Pinoy St.',
            'branch_brgy' => 'Brgy. 135 Balut Tondo',
            'branch_city' => 'Manila',
            'full_address' => ' 2675 Pinoy St. Brgy. 135 Balut Tondo Manila',
            'branch_tele_no' => '(02)-8-635-7552',
            'branch_phone_no' => '+639560896852',
            'branch_email' => 'citisec2020@gmail.com',
            'branch_status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        User::create([
            'branch_name' => 'Batangas Branch',
            'branch_lot_no' => null,
            'branch_street' => 'Sitio Pulo 7B',
            'branch_brgy' => 'Brgy. Tambo,',
            'branch_city' => 'Lipa City Batangas,',
            'full_address' => ' Sitio Pulo 7B Brgy. Tambo, Lipa City Batangas',
            'branch_tele_no' => '(046)-866-7729',
            'branch_phone_no' => '+639770553036',
            'branch_email' => 'citisec2020@gmail.com',
            'branch_status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        User::create([
            'branch_name' => 'DGH',
            'branch_lot_no' => '21',
            'branch_street' => '25',
            'branch_brgy' => 'Pinagsama',
            'branch_city' => 'Taguig',
            'full_address' => '21 25 Pinagsama Taguig',
            'branch_tele_no' => '123',
            'branch_phone_no' => '123',
            'branch_email' => 'roiceivan212@gmail.com',
            'branch_status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
