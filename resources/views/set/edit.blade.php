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
                        <a class="nav-link" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/test">Sprawdź się!</a>
                    </li>
                    @auth
                        @if($set->editPermission(Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link active" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/edycja">Edytuj</a>
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

                <form action="/set/rename/{{ $set->id }}"
                      method="post">
                      {{ method_field('PATCH') }}
                      {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"> Nowa nazwa </div>
                            <div class="col-md-4">
                                <input type="string" class="form-control" name="name" id="nameaaa"
                               placeholder="{{$set -> name}}">
                           </div>
                           <div class="col-md-2">
                               <button type="submit" class="btn btn-default">Akceptuj zmianę</button>
                           </div>
                    </div>
                    </div>
                </form>

                <hr/>
                <div class="row">
                      <div class="col-md-3">Polski</div>
                      <div class="col-md-3">{{ $set->languageName() }}</div>
                </div>

                @foreach ($set->words as $word)
                 <div class="row">
                        <div class="col-sm-10">
                        <form action="/word/rename/{{  $word->id }}"
                              method="post">
                              {{ method_field('PATCH') }}
                              {{ csrf_field() }}
                              <div class="form-group">
                                  <div class="row">
                                  <div class="col-sm-4">
                                      <input type="string" class="form-control" name="word1" id="word1"
                                     placeholder="{{ $word -> word1 }}">
                                  </div>
                                  <div class="col-sm-4">
                                      <input type="string" class="form-control" name="word2" id="word2"
                                     placeholder="{{ $word -> word2 }}">
                                  </div>
                                  <div class="col-sm-3">
                                      <button type="submit" class="btn btn-default">Zapisz zmianę</button>
                                  </div>
                                  </div>
                                  </div>
                        </form>
                        </div>

                        <div class="col-form-label">
                        <form action="/word/delete/{{ $word->id }}"
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
                <form action="/word/store/{{$set->id }}"
                      method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"> Nowe słówko </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="string" class="form-control" name="newWord1"
                               placeholder="Polski">
                           </div>
                           <div class="col-md-4">
                               <input type="string" class="form-control" name="newWord2"
                              placeholder="{{ $set->languageName() }}">
                          </div>
                           <div class="col-md-2">
                               <button type="submit" class="btn btn-default">Dodaj</button>
                           </div>
                    </div>
                </div>
            </form>


            </div>

        </div>
    </div>
</div>
@endsection
