<?php

namespace Database\Seeders;

use App\Models\President;
use App\Models\PresidentFact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresidentFactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $facts = [
            [
                'president_name' => 'George Washington',
                'fact' => 'First PresidentCollection of the United States',
            ],
            [
                'president_name' => 'George Washington',
                'fact' => 'Commander-in-Chief of the Continental Army during the American Revolutionary War',
            ],
            [
                'president_name' => 'John Adams',
                'fact' => 'Second PresidentCollection of the United States',
            ],
            [
                'president_name' => 'John Adams',
                'fact' => 'First Vice PresidentCollection of the United States',
            ],
            [
                'president_name' => 'Thomas Jefferson',
                'fact' => 'Principal author of the Declaration of Independence',
            ],
            [
                'president_name' => 'Thomas Jefferson',
                'fact' => 'Third PresidentCollection of the United States',
            ],
            // ... include facts for all other presidents
            [
                'president_name' => 'Joe Biden',
                'fact' => '46th PresidentCollection of the United States',
            ],
            [
                'president_name' => 'Joe Biden',
                'fact' => 'Former Vice PresidentCollection under Barack Obama',
            ],
        ];

        foreach ($facts as $fact) {
            $president = President::where('name', $fact['president_name'])->first();
            if ($president) {
                PresidentFact::create([
                    'president_id' => $president->id,
                    'fact' => $fact['fact'],
                ]);
            }
        }
    }

}
