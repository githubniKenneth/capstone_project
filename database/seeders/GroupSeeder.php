<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'group_name' => 'Personnel',
            'group_code' => '/personnel',
            'group_icon' => 'fa fa-user',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Group::create([
            'group_name' => 'Product',
            'group_code' => '/product',
            'group_icon' => 'fa-solid fa-suitcase',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        
        Group::create([
            'group_name' => 'User Account',
            'group_code' => '/user-account',
            'group_icon' => 'fa-regular fa-user',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        
        Group::create([
            'group_name' => 'Component',
            'group_code' => '/component',
            'group_icon' => 'fa-solid fa-bars',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        
        Group::create([
            'group_name' => 'Clients',
            'group_code' => '/client',
            'group_icon' => 'fa-solid fa-person',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        
        Group::create([
            'group_name' => 'Deployment',
            'group_code' => '/deployment/job-order',
            'group_icon' => 'fa-solid fa-van-shuttle',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        
        Group::create([
            'group_name' => 'Sales',
            'group_code' => '/request',
            'group_icon' => 'fa-solid fa-sack-dollar',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        Group::create([
            'group_name' => 'Inventory',
            'group_code' => '/inventory',
            'group_icon' => 'fa-solid fa-warehouse',
            'group_description' => null,
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
