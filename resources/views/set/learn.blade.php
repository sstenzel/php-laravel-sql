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
                        <a class="nav-link active" href="/language/{{ $set->subcategory->language->shortcut}}/{{ $set->subcategory->name }}/{{ $set->name }}/cwicz">Ćwicz</a>
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
                    </li>
                        <div class="col-md-2 text-right">
                        <a class="btn btn-default pull-right"
                           href="/set/back/{{$set->id}}">
                          Wróć
                      </a>

                  </div>
                   </li>
                </ul>
        </div>
        <div class="card-body">

            <div class="row justify-content-center">
                  <div class="col-md-6">{{ $lang1 }}</div>
                  <div class="col-md-6">{{ $lang2 }}</div>
            </div>
            <form action="/learn/check/{{$set->id}}"
                  method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                      @foreach ($shuffledSet as $word1 => $word2)
                            <div class="row justify-content-center">
                                  <div class="col-sm-6">
                                      <input type="string" class="form-control" placeholder='{{ $word1 }}' disabled>

                                  </div>
                                  <div class="col-sm-6">
                                      @if ($answersEnabled)
                                        <input type="string" class="form-control" placeholder="{{ $word2 }}" disabled>
                                      @else
                                        <input type="string" class="form-control" name= '{{ $word1 }}'  placeholder="Tłumaczenie">
                                      @endif
                                  </div>
                              </div>
                        @endforeach
                         @if (! $answersEnabled)
                        <div class="row justify-content-center">
                                  <button type="submit" class="btn btn-default">Sprawdź</button>
                        </div>
                        @endif
                  </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
