<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

use App\Models\SectionQuestion;
use App\Models\SectionQuestionOption;
use App\Models\SectionQuestionAnswer;

class DefaultController extends Controller
{
    public function index()
    {
        $data = [];
        $questions = SectionQuestion::get();
        foreach ($questions as $question) {
            $options = SectionQuestionAnswer::where('section_question_id', $question->id)->pluck('section_question_option_id');
            $answers = SectionQuestionOption::whereIn('id', $options)->sum('value');
            $data[] = [
                'question_id' => $question->id,
                'question_title' => $question->name,
                'answers' => $answers
            ];
        }
        return view('dashboard.index', ['title' => 'Dashboard', 'data' => $data]);
    }
}
