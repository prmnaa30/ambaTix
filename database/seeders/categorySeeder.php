<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('ALTER SEQUENCE public.event_categories_id_seq RESTART WITH 1');

        DB::table('event_categories')->insert([
            [
                'name' => 'Seminar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Workshop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Konser',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
