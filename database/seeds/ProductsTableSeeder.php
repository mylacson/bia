<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            ['Coca Cola', 12000,100],
            ['Sting', 12000,100],
            ['Revive', 12000,100],
            ['Number one', 12000,100],
            ['RedBull', 15000,100],
            ['Heineken', 20000,200],
            ['Tiger', 18000,200],
            ['Nha đam', 12000,50],
            ['Thuốc lá', 24000,100],
            ['NuTri Boost', 15000,100],
        ];
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => $arr[$i][0],
                'money' => $arr[$i][1],
                'amount'=>$arr[$i][2],
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
