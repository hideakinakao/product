<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('Companies')->insert([
            [
                'company_name' => 'サントリー',
                'street_address' => 'nobutada.saji@suntory.com',
                'representative_name' => '佐治 信忠',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'company_name' => 'Coca-Cola',
                'street_address' => 'murat.ozgur@cocacola.com',
                'representative_name' => 'ムラット・オズゲル',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'company_name' => 'キリン',
                'street_address' => 'yoshinori.isozaki@kirin.com',
                'representative_name' => '磯崎 功典',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'company_name' => '伊藤園',
                'street_address' => 'daisuke.honjo@itoen.com',
                'representative_name' => '本庄 大介',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
