@extends('layouts.template')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ $language->name }}
        </div>

        <div class="card bg-light text-dark">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/language/{{ $language->shortcut}}">Lista podkategorii</a>
                    </li>
                    @auth
                        @if($language->editPermission(Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link active" href="/language/{{ $language->shortcut}}/edytuj">Edytuj</a>
                        </li>
                        @endif
                    @endauth
                    <div class="col-md-2 text-right">
                        <a class="btn btn-default pull-right"
                           href="/">
                          Wróć
                      </a>
                  </div>
                </ul>
        </div>
        <div class="row justify-content-center">
            <div class="card-body">

            @foreach ($language->subcategories as $subcategory)
                <div class="row">
                    <div class="col-md-6">
                        <a class="nav-link" href = "/language/{{ $language->shortcut}}/{{ $subcategory->name }}">
                        {{ $subcategory -> name }}
                    </a></div>
                    <div class="col-md-3">
                        <a class="btn btn-default pull-right"
                           href="/language/{{ $language->shortcut}}/{{ $subcategory->name }}/edytuj">
                          Edytuj
                        </a>
                    </div>
                    <div class="col-md-3">
                        <form action="/subcategory/delete/{{ $subcategory->id }}"
                              method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default pull-right">
                                Usuń
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach


            <hr>
                <form action="/subcategory/store/{{ $language->id }}"
                  method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"> Nowa podkategoria </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <input type="string" class="form-control" name="name" id="name"
                           placeholder="Wprowadź nazwe">
                       </div>
                       <div class="col-md-3">
                           <button type="submit" class="btn btn-default">Dodaj</button>
                       </div>
                   </div>
               </form>

            </div>
        </div>
    </div>
</div>
@endsection
