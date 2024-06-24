<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'client_business_name' => 'Kenneth Inc.',
            'client_first_name' => null,
            'client_middle_name' => null,
            'client_last_name' => null,
            'client_full_name' => null,
            'client_suffix' => null,
            'client_lot_no' => null,
            'client_street' => null,
            'client_brgy' => 'asd',
            'client_city' => 'asd',
            'client_mobile_no' => 'asd',
            'client_tele_no' => 'asd',
            'client_email' => 'asf@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Client::create([
            'client_business_name' => 'Valve ',
            'client_first_name' => 'Gabe',
            'client_middle_name' => 'D',
            'client_last_name' => 'Newell',
            'client_full_name' => 'Gabe D Newell',
            'client_suffix' => null,
            'client_lot_no' => '25th',
            'client_street' => 'Cornelia',
            'client_brgy' => 'Pinagsama',
            'client_city' => 'Makati',
            'client_mobile_no' => '654987',
            'client_tele_no' => '09123456789',
            'client_email' => 'gabenewell@gmail.com',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
