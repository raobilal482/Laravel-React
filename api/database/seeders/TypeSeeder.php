<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Apartment',
                'parent_id' => null,
                'type' => 'property',
                'created_by' => 1,
            ],
            [
                'name' => 'House',
                'parent_id' => null,
                'type' => 'property',
                'created_by' => 1,
            ],
            [
                'name' => 'Villa',
                'parent_id' => null,
                'type' => 'property',
                'created_by' => 1,
            ],
            [
                'name' => 'Office',
                'parent_id' => null,
                'type' => 'property',
                'created_by' => 1,
            ],
            [
                'name' => 'Land',
                'parent_id' => null,
                'type' => 'property',
                'created_by' => 1,
            ],
        ];

        Type::insert($types);
    }
}
