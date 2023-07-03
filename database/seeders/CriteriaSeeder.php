<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria = [
            [
                'code' => 'C1',
                'name' => 'Support Linux',
                'type' => 'benefit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C2',
                'name' => 'Harga',
                'type' => 'cost',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C3',
                'name' => 'Memory Requirement',
                'type' => 'cost',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C4',
                'name' => 'Resource CPU Requirement',
                'type' => 'cost',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C5',
                'name' => 'Support Windows',
                'type' => 'benefit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C6',
                'name' => 'Open Source',
                'type' => 'benefit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C7',
                'name' => 'Plugin Support',
                'type' => 'benefit',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'C8',
                'name' => 'IPV6 Support',
                'type' => 'benefit',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Criteria::insert($criteria);
    }
}
