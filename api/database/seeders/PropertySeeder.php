<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeIds = Type::pluck('id');
        $userIds = User::pluck('id');
        $properties = [
            [
                'name' => 'Test Property',
                'type' => 'HMO',
                'type_id' => $typeIds->random(),
                'owner_id' => $userIds->random(),
                'monthly_payment' => null,
                'rent' => null,
                'rent_frequency' => null,
                'available_from' => null,
                'address' => null,
                'meta' => null,
                'created_by' => $userIds->random(),
            ],
        ];

        foreach ($properties as $property) {
            \App\Models\Property::create($property);
        }

    }
}
