@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-dark">Create a new questionnaire</a>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Your Questionnaires</div>
                <div class="card-body">
                    @foreach ($questionnaires as $questionnaire)
                        <div class="list-group-item list-group-item-action mt-2 pb-4" style="border-style: groove;">
                            <a href="{{$questionnaire->path()}}">
                                <strong>
                                    {{$questionnaire->title}}
                                </strong>
                            </a>

                            <div class="float-right">
                                <form action="{{$questionnaire->path()}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ml-2"{{ ($questionnaire->surveys->count() == 0) ? 'enabled' : 'disabled' }}>Delete</button>
                                </form>

                            </div>

                            <div class="float-right">
                                <a href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}"
                                   class="btn btn-outline-success ml-2"
                                   target='blank'>Take Survey</a>
                            </div>

                            <small class="float-right mt-2"><em>{{$questionnaire->surveys->count()}} Responses</em></small>
                        </div>
                    @endforeach
                </div>




            </div>
        </div>
    </div>
</div>
@endsection
