@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creating a new questsffdionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter the title"
                            name="title" value="{{old('title')}}">
                            <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter the purpose"
                            name="purpose" value="{{old('purpose')}}">
                            <small id="purposeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('purpose')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
