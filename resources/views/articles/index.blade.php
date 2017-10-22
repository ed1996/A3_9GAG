@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center;"><h3>{{ $article->title }}</h3></div>

                    <div class="panel-body">
                            @if(!$article->picture)
                                <img src="http://placehold.it/50x50"><br>
                            @else
                                <img src="{{ asset('uploads/article_pictures/' . $article->picture) }}" alt="" width="auto" height="100%" class="center-block"><br>
                            @endif

                                {{ $article->likes->count() }} Likes
                                @if ($article->isLiked)
                                    <a href="{{ route('article.like', $article->id) }}">Unlike</a><br>
                                @else
                                    <a href="{{ route('article.like', $article->id) }}">Like this!</a><br>
                                @endif
                                <p>Les personnes qui ont aimées ce post :
                                @foreach ($article->likes as $user)
                                    {{ $user->name }} likes this !
                                @endforeach
                            </p>
                            @include('components.share', ['url' => route('article.show', ['id' => $article->id])])<br>









                        </div>

                    </div>

                </div>
            @empty
                Rien du tout
            @endforelse
        </div>
    </div>
@endsection