<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('serial_id');
            $table->string('name', 50);
            $table->string('manufacturer', 50);
            $table->date('manufactured_date');
            $table->date('exp_date');
            $table->double('price', 10, 2);
            $table->integer('quantity');
            $table->text('image')->default('default.png');
            $table->string('status', 20);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('products')->insert([
            [
                'serial_id' => '1234567',
                'name' => 'Magic Chips Cheese',
                'manufacturer' => 'Foods W.L',
                'manufactured_date' => '2022-06-30',
                'exp_date' => '2027-06-30',
                'price' => 17.00,
                'quantity' => 20,
                'image' => '64a20e2179237.jpg',
                'status' => 'Not Available',
            ],
            [
                'serial_id' => '7777777',
                'name' => 'Muncher',
                'manufacturer' => 'BigHit Company',
                'manufactured_date' => '2013-06-06',
                'exp_date' => '2023-10-05',
                'price' => 10.20,
                'quantity' => 1,
                'image' => '651e9d2bcf3c4.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '47178481',
                'name' => 'Tahoos',
                'manufacturer' => 'W.L Foods',
                'manufactured_date' => '2023-08-20',
                'exp_date' => '2028-08-28',
                'price' => 8.25,
                'quantity' => 250,
                'image' => '64a20e663d377.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '123456780',
                'name' => 'Family Sardines',
                'manufacturer' => 'Universal Canning Inc.',
                'manufactured_date' => '2023-07-18',
                'exp_date' => '2025-06-17',
                'price' => 18.50,
                'quantity' => 720,
                'image' => '64a20ecdee936.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '1863136023',
                'name' => 'Ethyl Alcohol Casino',
                'manufacturer' => 'International Pharmaceutical Inc.',
                'manufactured_date' => '2023-10-27',
                'exp_date' => '2026-10-27',
                'price' => 49.25,
                'quantity' => 950,
                'image' => '64a20f47e2579.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '2627671640',
                'name' => 'Eskinol',
                'manufacturer' => 'Unilever Phil. Inc.',
                'manufactured_date' => '2021-06-21',
                'exp_date' => '2024-06-24',
                'price' => 32.50,
                'quantity' => 200,
                'image' => '64a20fccab5a9.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '2818977248',
                'name' => '24 Seven',
                'manufacturer' => 'W.L Foods',
                'manufactured_date' => '2022-02-22',
                'exp_date' => '2023-12-29',
                'price' => 17.85,
                'quantity' => 800,
                'image' => '64a21023a90d1.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '5772240384',
                'name' => 'Ponds',
                'manufacturer' => 'Unilever Phil. Inc.',
                'manufactured_date' => '2021-07-04',
                'exp_date' => '2023-12-31',
                'price' => 220.00,
                'quantity' => 530,
                'image' => '64a210601ff4f.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '6151703620',
                'name' => 'Magic Junior',
                'manufacturer' => 'Universal Robina Corp.',
                'manufactured_date' => '2022-03-25',
                'exp_date' => '2024-06-25',
                'price' => 89.00,
                'quantity' => 2000,
                'image' => '64a21095bc533.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '6953141485',
                'name' => 'Quickchow',
                'manufacturer' => 'Zest-O Corp.',
                'manufactured_date' => '2023-10-26',
                'exp_date' => '2025-09-10',
                'price' => 8.25,
                'quantity' => 60,
                'image' => '64a2110a8f3e3.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '7145657846',
                'name' => 'Datu Puti Vinegar',
                'manufacturer' => 'Nutri-Asia, Inc.',
                'manufactured_date' => '2022-12-13',
                'exp_date' => '2024-06-13',
                'price' => 33.00,
                'quantity' => 200,
                'image' => '64a2118281c1d.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '7423749338',
                'name' => 'Carne Norte Holiday',
                'manufacturer' => 'Sunpride Foods, Inc.',
                'manufactured_date' => '2022-12-21',
                'exp_date' => '2026-12-04',
                'price' => 26.00,
                'quantity' => 1800,
                'image' => '64a211397bbb6.jpg',
                'status' => 'Available',
            ],
            [
                'serial_id' => '8546958310',
                'name' => 'Wow Ulam Argentina',
                'manufacturer' => 'Century Pacific Food, Inc.',
                'manufactured_date' => '2022-06-27',
                'exp_date' => '2025-03-27',
                'price' => 20.25,
                'quantity' => 1200,
                'image' => '64a20f8abfa27.jpg',
                'status' => 'Available',
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
