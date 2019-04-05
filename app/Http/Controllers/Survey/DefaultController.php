<?php

namespace App\Http\Controllers\Survey;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SectionQuestionAnswer;
Use Auth;

class DefaultController extends Controller
{
    public function index($section = 1)
    {
        $user             = Auth::user();
        $answers          = $user->answers();
        $sectionAnswered  = clone $answers;
        $sectionAnswered  = $answers->groupBy('section_id')->pluck('section_id')->toArray();
        $section          = Section::whereNotIn('id', $sectionAnswered)->first();

        if(!$section) {
          $user->update(['taken_survey' => 1]);
        }

        return view('survey.index', ['section' => $section]);
    }

    public function store(Request $request)
    {
        foreach ($request->answers as $sectionQuestionId => $sectionQuestionOptionId) {
          SectionQuestionAnswer::updateOrCreate([
            'user_id'     => Auth::id(),
            'section_id'  => $request->section_id,
            'section_question_id' => $sectionQuestionId
          ], ['section_question_option_id' => $sectionQuestionOptionId]);
        }

        return redirect('/take-survey');
    }
}
