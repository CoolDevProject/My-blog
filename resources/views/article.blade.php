@extends('base')
@section('content')
    <div class="jumboton">
        <h2 class="display-4 text-center py-5">{{$article->title}}</h2>
        <div class="d-flex justify-content-center pb-5">
            <a href="{{route('articles')}}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>
                retour
            </a>
        </div>
        <h5 class="text-center py-3 pt-3">{{$article->subtitle}}</h5>
        <div class="d-flex justify-content-center">
            <span class="badge bg-dark">{{$article->category->label}}</span>
        </div>
    </div>
    <div class="container">
        <p class="text-center">{!! $article->content !!}</p>
    </div>
@endsection