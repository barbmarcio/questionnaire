@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creating a new question for "{{$questionnaire->title}}"</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter the question"
                            name="question[question]" value="{{old('question')}}">
                            <small id="questionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choicesHelp">Give the choice that give you the most insight.</small>

                                <div class="form-group">
                                    <label for="answer1">Choice 1</label>
                                    <input type="text" class="form-control" id="answer1" aria-describedby="choicesHelp"
                                    name="answers[][answer]">
                                    @error('answers.0.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer2">Choice 2</label>
                                    <input type="text" class="form-control" id="answer2" aria-describedby="choicesHelp"
                                    name="answers[][answer]">
                                    @error('answers.1.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer3">Choice 3</label>
                                    <input type="text" class="form-control" id="answer3" aria-describedby="choicesHelp"
                                    name="answers[][answer]">
                                    @error('answers.2.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer4">Choice 4</label>
                                    <input type="text" class="form-control" id="answer4" aria-describedby="choicesHelp"
                                    name="answers[][answer]">
                                    @error('answers.3.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                            </fieldset>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
