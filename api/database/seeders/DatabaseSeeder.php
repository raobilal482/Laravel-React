<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $count = 2;
        User::factory(10)->create();
        $this->command->info('Createing Properties');
        $bar = $this->command->getOutput()->createProgressBar($count);
        $bar->start();
        for($i=0; $i<$count; $i++){

            Property::factory($count)->create();
            $bar->advance();
        }
        $bar->finish();
        $this->command->getOutput()->newLine();
         $this->command->newLine();
        $this->command->getOutput()->info('Properties Created');



        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
