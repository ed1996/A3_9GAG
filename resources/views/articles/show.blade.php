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

                            <a href="{{route('article.index')}}">Retour</a><br>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
