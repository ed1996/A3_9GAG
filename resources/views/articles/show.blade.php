@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><div style="text-align: center;"><h1>{{$article->title}}</h1></div><br>

                    </div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif


                        <p>{{$article->content}}</p>
                        @if(!$article->picture)
                            <img src="http://placehold.it/50x50">
                        @else
                            <img src="{{ asset('uploads/article_pictures/' . $article->picture) }}" alt="">
                        @endif
                        <p>
                            @if($article->user)
                                Utilisateur: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif

                        </p>

                            @if ($article->isLiked)
                                <a href="{{ route('article.like', $article->id) }}">Unlike</a><br>
                            @else
                                <a href="{{ route('article.like', $article->id) }}">Like this!</a><br>
                            @endif

                        @include('components.share', ['url' => route('article.show', ['id' => $article->id])])

                            <p>
                                {{ $article->likes->count() }} likes

                        <a href="{{route('article.index')}}">Retour</a><br>
                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        <hr>

                        <div class="row">
                            <div id="backend-comments" style="margin-top: 50px;">
                                <h3>Commentaires <small>{{ $article->comments()->count() }} total</small></h3>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Commentaire</th>
                                        <th width="70px"></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($article->comments as $comment)
                                        <tr>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->comment }}</td>
                                            <td>
                                                @if( $comment->user_id == Auth::user()->id)
                                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                                {{ Form::open(['route' => ['comments.store', $article->id], 'method' => 'POST']) }}

                                <div class="row">
                                    <div class="col-md-6">
                                        {{ Form::label('name', "Nom:") }}
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="col-md-6">
                                        {{ Form::label('email', 'Email:') }}
                                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                                    </div>

                                    <div class="col-md-12">
                                        {{ Form::label('comment', "Commentaire:") }}
                                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

                                        {{ Form::submit('Ajouter un commentaire', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                                    </div>
                                </div>

                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
