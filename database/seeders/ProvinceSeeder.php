<?php

namespace Database\Seeders;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Schema::disableForeignKeyConstraints();
        DB::table('districts')->truncate();
        DB::table('cities')->truncate();
        DB::table('provinces')->truncate();
        Schema::enableForeignKeyConstraints();

        $files = [
            'provinces' => 'app/data/provinces.csv',
            'cities' => 'app/data/regencies.csv',
            'districts' => 'app/data/districts.csv'
        ];

        foreach($files as $table => $path){
            $this->processFile($table, $path);
        }
    }


    private function processFile($table, $path){
        $fullpath = storage_path($path);

        if(!file_exists($fullpath)){
            $this->command->error("File not found: $path");
        }

        $this->command->info("Seeding $table...");

        $csv = Reader::createFromPath($fullpath, 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        $chunk = [];
        $timestamp = now();

        foreach($records as $record){
            $row = [
                'id' => $record['id'],
                'name' => $record['name'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];

            if(isset($record['province_id'])){
                $row['province_id'] = $record['province_id'];
            }

            if(isset($record['city_id'])){
                $row['city_id'] = $record['city_id'];
            }

            $chunk[] = $row;

            if(count($chunk) >= 500){
                DB::table($table)->insert($chunk);
                $chunk = [];
            }

        }

        // Insert remaining records
        if (!empty($chunk)) {
            DB::table($table)->insert($chunk);
        }
    }
}
