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
                        <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}">Pokaż listę</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/cwicz">Ćwicz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/test">Sprawdź się!</a>
                    </li>
                    @auth
                        @if($set->editPermission(Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/edycja">Edytuj</a>
                        </li>
                        @endif
                    @endauth
                    </li>
                        <div class="col-md-4 text-right">
                        <a class="btn btn-default pull-right"
                           href="/set/back/{{$set->id}}">
                          Wróć
                      </a>

                  </div>
                   </li>
                </ul>
        </div>
        <div class="card-body">


                    <form action="/test/start/{{ $set->id }}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row justify-content-center">
                                    <input type="radio" name="toForeign" value=1 checked>Polski -> {{ $set->languageName() }}</label>
                            </div>
                            <div class="row justify-content-center">
                                    <input type="radio" name="toForeign" value=0>{{ $set->languageName() }} -> Polski</label>
                            </div>

                            <hr>
                            <div class="row justify-content-center">
                                       <button type="submit" class="btn btn-default">Start</button>
                            </div>
                        </div>
                    </form>


        </div>
        </div>
    </div>
</div>
@endsection
