<?php

use Illuminate\Database\Seeder;
use App\Models\SectionQuestion;
use App\Models\SectionQuestionOption;

class SectionQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectionQuestion::truncate();
        SectionQuestionOption::truncate();

        $files = [
           ['sections'=> '1', 'file' => 'section_1'],
           ['sections'=> '2', 'file' => 'section_2'],
        ];

        foreach ($files as $key => $file) {
            include($file['file'].'.php');

            echo 'Updating Question for '. $file['file'] . PHP_EOL;

            foreach ($questions as $sectionQuestion) {
              $question = $this->storeQuestion($sectionQuestion);
              if(isset($sectionQuestion['options'])) {
                foreach ($sectionQuestion['options'] as $sectionOption) {
                  $this->storeQuestionOption($sectionOption, $question->id);
                }
              }

            }
        }
    }

    public function storeQuestion($sectionQuestion)
    {
        $question['name']         = $sectionQuestion['name'];
        $question['description']  = isset($sectionQuestion['description'])? $sectionQuestion['description'] : NULL;
        $question['section_id']   = $sectionQuestion['section_id'];
        $question['parent_id']    = 0;
        $question['type']         = $sectionQuestion['type'];
        $question['required']     = isset($sectionQuestion['required'])? $sectionQuestion['required'] : 0;
        $question['info']         = isset($sectionQuestion['info'])? $sectionQuestion['info'] : NULL;

        $question = SectionQuestion::updateOrCreate($question);

        return $question;
    }

    public function storeQuestionOption($sectionOption,$questionId)
    {
        $sectionOption['section_question_id'] = $questionId;
        $option = SectionQuestionOption::updateOrCreate($sectionOption);

        return $option;
    }
}
