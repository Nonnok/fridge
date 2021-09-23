<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FridgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => "豆腐",
            'quantity' => '10丁',
            'memo' => '麻婆豆腐用'
        ];
        DB::table('fridges')->insert($param);
        $param = [
            'name' => "ネギ",
            'pqantity' => '１本',
            'memo'=> '切って冷凍保存'
        ];
        DB::table('fridges')->insert($param);
        $param = [
            'name' => "豚肉",
            'pqantity' => '２パック',
            'memo'=> '一パックは麻婆豆腐に'
        ];
        DB::table('fridges')->insert($param);
        $param = [
            'name' => "オレンジジュース",
            'pqantity' => '２パック',
            'memo'=> '朝食用'
        ];
        DB::table('fridges')->insert($param);
    }
}
