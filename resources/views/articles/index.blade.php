@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="text-align: center;"><h1>Fil d'actualité :</h1></div>
                    <div class="panel-heading"> <a style="margin-left: 300px;" href="{{route('article.create')}}">Ajouter un Post</a></div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h3>{{ $article->title }}</h3>

                            @if(!$article->picture)
                                <img src="http://placehold.it/50x50"><br>
                            @else
                                <img src="{{ asset('uploads/article_pictures/' . $article->picture) }}" alt=""><br>
                            @endif


                                @foreach ($article->likes as $user)
                                    {{ $user->name }} likes this !
                                @endforeach

                                @include('components.share', ['url' => route('article.show', ['id' => $article->id])])<br>



                            {{ $article->likes->count() }} Likes<br>

                                @if ($article->isLiked)
                                    <a href="{{ route('article.like', $article->id) }}">Unlike</a><br>
                                @else
                                    <a href="{{ route('article.like', $article->id) }}">Like this!</a><br>
                                @endif

                            <a href="{{route('article.show', ['id' => $article->id])}}">
                                Voir ce Post
                            </a>



                                <hr>


                        @empty
                            Rien du tout
                        @endforelse
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection