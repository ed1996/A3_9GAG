@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('article.update', [$article->id])}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div style="text-align: center;"><p>Titre du Post :</p></div>
                            <div style="text-align: center;"><textarea required name="title" id="" cols="100" rows="1">{{$article->title}}</textarea></div>
                            <br>
                            <div style="text-align: center;"><p>Ajoutez une image :</p></div>
                            <div style="text-align: center;"><input type="file" name="picture" class="form-control"></div>
                            <br>
                            <div style="text-align: center;"><input type="submit" value="Envoyer"></div>
                        </form>


                        <form method="POST" action="{{route('article.destroy', [$article->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Supprimer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
