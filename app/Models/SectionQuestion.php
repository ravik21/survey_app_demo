<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionQuestion extends Model
{
    public function options()
    {
        return $this->hasMany(SectionQuestionOption::class, 'section_question_id', 'id');
    }
}
