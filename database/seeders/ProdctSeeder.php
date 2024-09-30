<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdctSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting seeds to the products table
        $products_list = [
            [
                'product_code' => 'MOB001',
                'product_name' => 'Apple iPhone 14',
                'product_description' => 'Display: 6.1 inches (15.40 cm) OLED Display|Memory: 128GB ROM|Processor: A15 Bionic Chip, Hexa Core|Camera: 12 MP + 12 MP Dual Rear & 12 MP Front Camera',
                'product_price' => '78000',
                'product_quantity' => 100
            ],
            [
                'product_code' => 'MOB002',
                'product_name' => 'Apple iPhone 13 (128GB, Pink)',
                'product_description' => 'Display: 6.1 inches (15.4 cm), Super Retina XDR OLED|Memory: 128GB ROM|Processor: Apple A15 Bionic, Hexa Core|Camera: 12 MP + 12 MP Dual Rear & 12 MP Front Camera',
                'product_price' => '64900',
                'product_quantity' => 50
            ],
            [
                'product_code' => 'MOB003',
                'product_name' => 'Apple iPhone 11 (128GB, White)',
                'product_description' => 'Display: 6.1 inches (15.49 cm), HD LCD with IPS|Memory: 128GB ROM|Processor: Apple A13 Bionic, Hexa Core|Camera: 12 MP + 12 MP Dual Rear & 12 MP Front Camera|Battery: 3110 mAh',
                'product_price' => '47990',
                'product_quantity' => 150
            ],
            [
                'product_code' => 'MOB004',
                'product_name' => 'Apple iPhone 14 Pro Max (1TB, Gold)',
                'product_description' => 'Display: 6.7 inches (17.00 cm) OLED Display|Memory: 1TB ROM|Processor: A16 Bionic Chip, Hexa Core|Camera: 48 MP + 12 MP + 12 MP Triple Rear & 12 MP Front Camera|Battery: Qi Wireless Charging Up to 7.5W',
                'product_price' => '2000000',
                'product_quantity' => 100
            ],
            [
                'product_code' => 'MOB005',
                'product_name' => 'Battery: Qi Wireless Charging Up to 7.5W',
                'product_description' => 'Display: 6.7 inches (17.02 cm), Super Retina XDR, 120 Hz Refresh Rate|Memory: 1TB ROM|Processor: Apple A15 Bionic, Hexa Core|Camera: 48 MP + 12 MP + 12 MP Triple Rear & 12 MP Front Camera|Battery: 20W Fast Charging',
                'product_price' => '26000',
                'product_quantity' => 175
            ]
        ];
        DB::table('products')->insert($products_list);
    }
}
