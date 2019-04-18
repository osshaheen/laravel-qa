@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h2>Edit Question</h2>
                            <div class="ml-auto">
                                <a href="{{ route('question.index') }}" class="btn btn-outline-secondary"> Back to all questions </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @include('layouts._message')
                        <form action="{{ route('question.update',$question->id) }}" method="post">
                            @method('put')
                            @include('questions._form',['buttonText'=>'Update your question'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
