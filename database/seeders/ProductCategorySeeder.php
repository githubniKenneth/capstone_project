<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::create([
            'product_category' => 'Monitor',
            'status' => '1',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
