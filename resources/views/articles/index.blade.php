@extends('base')

@section('content')
    <div class="container">
       
        <h1 class="text-center my-5">Articles</h1> 
        <div class="d-flex justify-content-center">
            <a href="{{route('article.create')}}" class="btn btn-info my-3"><i class="fas fa-plus"></i> Ajouter un nouvel article</a>
        </div>
        <table class="table table-hover">
            <thead>
              <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Crée le</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr >
                        <th>{{$article->id}}</th>
                        <th>{{$article->title}}</th>
                        <th>{{date('d-m-Y', strtotime($article->created_at))}}</th>
                        <th class="d-flex">
                            <a href="{{route('article.edit', $article->id)}}" class="btn btn-warning mx-3">Editer</a>
                            <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-delete-{{$article->id}}').style.display='block'">Supprimer</button>
                            <form action="{{route('article.destroy', $article->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                    <div class="modal" id="modal-delete-{{$article->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">La suppression d'un élément est définitive</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="document.getElementById('modal-delete-{{$article->id}}').style.display='none'">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Etes vous sûr de vouloir supprimer cet élément</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Oui</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  onclick="document.getElementById('modal-delete-{{$article->id}}').style.display='none'">Annuler</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{$articles->links('vendor.pagination.custom')}}
        </div>
    </div>
@endsection