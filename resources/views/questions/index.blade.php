@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._message')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>All Questions</h2>
                            <div class="ml-auto">
                                <a href="{{ route('question.create') }}" class="btn btn-outline-secondary"> Ask Question </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong>{{Str::plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{ $question->answers }}</strong>{{Str::plural('answer',$question->answers)}}
                                    </div>
                                    <div class="views">
                                        {{ $question->views ." ".Str::plural('view',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                        <div class="ml-auto">
                                            <a href="{{ route('question.edit',$question->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <form class="form-delete" method="post" action="{{ route('question.destroy',$question->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('are you sure . ?')">DELETE</button>
                                            </form>
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked By
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    {{Str::limit($question->body,250)}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{$questions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
