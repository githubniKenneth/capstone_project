<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSeries;

class ProductSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSeries::create([
            'series_name' => 'A-111',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        ProductSeries::create([
            'series_name' => 'A-222',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
