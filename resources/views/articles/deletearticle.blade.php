@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Voulez vous vraiment supprimer ce Post?</h1>
            <p>
                <strong>Name:</strong> {{ $article->name }}<br>
                <strong>Email:</strong> {{ $article->email }}<br>
                <strong>Comment:</strong> {{ $article->comment }}
            </p>

            {{ Form::open(['route' => ['article.destroy', $comment->id], 'method' => 'DELETE']) }}
            {{ Form::submit('OUI', ['class' => 'btn btn-lg btn-block btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>

@endsection