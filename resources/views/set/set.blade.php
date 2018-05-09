@extends('layouts.template')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            {{ $set->name }}
        </div>

        <div class="card bg-light text-dark">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}">Pokaż listę</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/cwicz">Ćwicz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/test">Sprawdź się!</a>
                    </li>
                    @auth
                        @if($set->editPermission(Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/edycja">Edytuj</a>
                        </li>
                        @endif
                    @endauth
                    <div class="col-md-2 text-right">
                        <a class="btn btn-default pull-right"
                           href="/set/back/{{$set->id}}">
                          Wróć
                      </a>
                  </div>
                </ul>
        </div>
        <div class="card-body">
            <div class="card-title">
                <div class="row justify-content-center">
                      <div class="col-md-3">Polski</div>
                      <div class="col-md-3">{{ $set->languageName() }}</div>
                </div>
            </div>
        <hr/>
                @foreach ($set->words as $word)
                    <div class="row justify-content-center">
                      <div class="col-md-3">{{ $word -> word1 }}</div>
                      <div class="col-md-3">{{ $word -> word2 }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
