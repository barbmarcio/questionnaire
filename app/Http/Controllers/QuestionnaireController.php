<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function create() {
        return view('questionnaire.create');
    }

    public function store() {
        $questionnaire = auth()->user()->questionnaires()->create($this->F_DataValidation());
        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers.responses');
        return view('questionnaire.show', compact('questionnaire'));
    }

    public function destroy(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers');
        $questions = $questionnaire->questions;

        foreach($questions as $question) {
            if ($question->count() >= 1) {
                $answers = $question->answers;
                foreach ($answers as $answer) {
                    $answer->delete();
                }
            }
            $question->delete();
        }
        $questionnaire->delete();

        $questionnaires = Questionnaire::all();
        $questionnaires->load('surveys', 'questions.answers');
        return view('home', compact('questionnaires'));
    }

    public function F_DataValidation() {
        return $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);
    }
}
