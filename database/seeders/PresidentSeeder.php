<?php

namespace Database\Seeders;

use App\Models\President;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $presidents = [
            [
                'name' => 'George Washington',
                'birth_date' => '1732-02-22',
                'death_date' => '1799-12-14',
                'party' => 'None',
                'term_start_year' => 1789,
                'term_end_year' => 1797,
            ],
            [
                'name' => 'John Adams',
                'birth_date' => '1735-10-30',
                'death_date' => '1826-07-04',
                'party' => 'Federalist',
                'term_start_year' => 1797,
                'term_end_year' => 1801,
            ],
            [
                'name' => 'Thomas Jefferson',
                'birth_date' => '1743-04-13',
                'death_date' => '1826-07-04',
                'party' => 'Democratic-Republican',
                'term_start_year' => 1801,
                'term_end_year' => 1809,
            ],
            [
                'name' => 'Joe Biden',
                'birth_date' => '1942-11-20',
                'death_date' => null,
                'party' => 'Democratic',
                'term_start_year' => 2021,
                'term_end_year' => null,
            ],
        ];

        foreach ($presidents as $president) {
            President::create($president);
        }
    }
}
