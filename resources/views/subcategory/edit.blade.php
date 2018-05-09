@extends('layouts.template')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ $subcategory->name }}
        </div>

        <div class="card bg-light text-dark">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}">Lista zestawów</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}/edytuj">Edytuj</a>
                        </li>
                    @endauth
                    <div class="col-sm-12 col-md-7 text-right">
                        <a class="btn btn-default pull-right"
                           href="/subcategory/back/{{$subcategory->id}}">
                          Wróć
                      </a>
                  </div>
                </ul>
            </div>
            <div class="row justify-content-center">
                <div class="card-body">
                @if(Auth::user()->isAdmin())
                    <form action="/subcategory/rename/{{ $subcategory->id }}"
                          method="post">
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"> Nowa nazwa</div>
                                <div class="col-md-4">
                                    <input type="string" class="form-control" name="name"
                                   placeholder="{{$subcategory -> name}}" required>
                               </div>
                               <div class="col-md-2">
                                   <button type="submit" class="btn btn-default">Akceptuj zmianę</button>
                               </div>
                        </div>
                        </div>
                    </form>
                    @endif
                    <hr/>

                    @foreach ($subcategory->setsToEdit(Auth::user()) as $set)
                        <div class="row">
                            <div class="col-md-6">
                                <a class="nav-link" href = "/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}/{{ $set->name }}">
                                {{ $set -> name }}
                            </a></div>
                            <div class="col-md-3">
                                <a class="btn btn-default pull-right"
                                   href="/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}/{{ $set->name }}/edycja">
                                  Edytuj
                                </a>
                            </div>
                            <div class="col-md-3">
                                <form action="/set/delete/{{ $set->id }}"
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
                    <form action="/set/store/{{ $subcategory->id }}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"> Nowy zestaw </div>
                                @if($subcategory->publicSetPermission(Auth::user()))
                                        <div class="col-md-2">
                                            <input type="radio" name="private" value=0 checked>Publiczny</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" name="private" value=1>Prywatny</label>
                                        </div>
                                @endif
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <input type="string" class="form-control" name="name"
                                   placeholder="Wprowadź nazwe" required>
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
