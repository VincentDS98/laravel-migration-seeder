<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Train;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {
            // Istanzio il model
            $train = new train();
            // Ne riempio le colonne
            $train->agency_name = fake()->words(rand(1, 5), true);
            $train->departure_station = fake()->words(rand(1,4), true);
            $train->arrival_station = fake()->words(rand(1,4), true);
            $train->departure_date = fake()->date('Y_m_d').' '.fake()->time();
            $train->arrival_date = fake()->date('Y_m_d').' '.fake()->time();
            $train->train_code = fake()-> randomNumber(8, true);
            $train->wagons_number = fake()->numberBetween(3, 15);
            $train->is_on_time = fake()-> boolean();
            $train->is_deleted = fake()-> boolean();
            // Lo salvo in persistenza
            $train->save();
        }
    }
}