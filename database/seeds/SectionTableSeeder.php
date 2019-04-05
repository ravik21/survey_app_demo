<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();

        $sections = [
          [
            'name' => 'Let us know some basic facts?',
            'description' => 'Basic Facts Section'
          ],
          [
            'name' => 'Let us know some general facts',
            'description' => 'General Facts Section'
          ]
        ];

        foreach ($sections as $section) {
          Section::updateOrCreate($section);
        }

        echo 'Section Table Seeded ' . PHP_EOL;

    }
}
