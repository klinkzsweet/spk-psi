<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternative = [
            [
                'code' => 'A1',
                'name' => 'cPanel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A2',
                'name' => 'Plesk',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A3',
                'name' => 'DirectAdmin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A4',
                'name' => 'Core-Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A5',
                'name' => 'InterWorx',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A6',
                'name' => 'ISPmanager',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A7',
                'name' => 'iMSCP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A8',
                'name' => 'Froxlor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A9',
                'name' => 'Vesta',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A10',
                'name' => 'ZPanel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A11',
                'name' => 'Webmin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A12',
                'name' => 'Ajenti',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A13',
                'name' => 'Virtualmin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A14',
                'name' => 'BlueOnyx',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A15',
                'name' => 'Virtualizor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A16',
                'name' => 'aaPanel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A17',
                'name' => 'CyberPanel',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A18',
                'name' => 'RavenCore',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A19',
                'name' => 'ISP System',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A20',
                'name' => 'EHCP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A21',
                'name' => 'VHCS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'A22',
                'name' => 'DTC',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Alternative::insert($alternative);
    }
}
