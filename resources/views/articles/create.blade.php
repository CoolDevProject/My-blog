@extends('base')

@section('content')
    <div class="container">
        <h1 class="text-center mt-y">Poster un nouvel article</h1>
        <form action="{{ route('article.store')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="">Titre</label>
                    <input type="text" name="title" class="form-control @error('title')  is-invalid @enderror" placeholder="Titre de votre article"/>
                </div>
                @error('title') 
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" name="subtitle" class="form-control @error('subtitle')  is-invalid @enderror" placeholder="Sous-titre de votre article"/>
                    <small class="form-text text-muted">Décrivez le contenu de votre article, le thème traité</small>
                </div>
                @error('subtitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select name="category" class="form-control" id="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->label}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Contenu</label>
                    <textarea id="TinymceText"  name="content" class="form-control @error('content') is-invalid @enderror w-100" id="" cols="30" rows="10"></textarea>
                </div>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
                <script>
                    tinymce.init({
                        selector:'#TinymceText'
                    })
                </script>
            <div class="d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-primary">Poster l'article</button>
            </div>
        </form>
    </div>
@endsection