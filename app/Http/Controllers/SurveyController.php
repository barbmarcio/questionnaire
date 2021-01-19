<?php

namespace App\Http\Controllers;

use App\Mail\SurveyMail;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire) {
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

 //       Mail::to($survey['email'])->send(new SurveyMail());
        return 'Thank you';
    }
}
