@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a class="btn btn-outline-danger float-left" href="/home">Go Back</a>
                <div class="card-header">{{$questionnaire->title}}</div>

                <div class="card-body">
                    <a href="/questionnaires/{{$questionnaire->id}}/questions/create" class="btn btn-dark">Create a new question</a>
                    <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}"
                       class="btn btn-outline-success"
                       {{ ($questionnaire->questions->count() == 0 ) ? 'style=display:none;' : '' }}>Take Survey</a>
                </div>
            </div>

            @foreach ($questionnaire->questions as $question)
                <div class="card mt-4">
                    <div class="card-header">
                        {{$question->question}}
                        <div class="float-right">
                            <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>{{$answer->answer}}</div>
                                    @if ($question->responses->count())
                                        <div>{{ intval($answer->responses->count() * 100 / $question->responses->count()) }}%</div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
