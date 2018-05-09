@extends('layouts.template')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Panel użytkownika
        </div>

        <div class="card bg-light text-dark">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index">Wyniki</a>
                    </li>
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="/user/users">Użytkownicy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/user/languages">Języki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/permissions">Uprawnienia</a>
                    </li>
                    @endif
                </ul>
            </div>

        <div class="card-body">
            <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-2">
                    Id
                </div>
                <div class="col-sm-4">
                    Nazwa
                 </div>
                 <div class="col-sm-2">
                    Skrót
                  </div>
                 </div>
                 </div>
<hr/>
            @foreach ($languages as $language)
             <div class="row">
                    <div class="col-sm-10">
                    <form action="/user/languages/rename/{{  $language->id }}"
                          method="post">
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                              <div class="row">
                              <div class="col-sm-2">
                                  <input type="string" class="form-control" placeholder='{{ $language->id }}' disabled>
                              </div>
                               <div class="col-sm-4">
                                  <input type="string" class="form-control" name="name"
                                 placeholder="{{ $language->name }}">
                              </div>
                              <div class="col-md-2">
                                  <input type="string" class="form-control" name="shortcut"
                                 placeholder="{{ $language->shortcut }}">
                             </div>
                              <div class="col-sm-1">
                                  <button type="submit" class="btn btn-default">Zapisz</button>
                              </div>
                              </div>
                              </div>
                    </form>
                    </div>

                    <div class="col-form-label">
                    <form action="/user/languages/delete/{{ $language->id }}"
                          method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger pull-right">
                            Usuń język
                        </button>
                    </form>
                    </div>
                    </div>

                    @foreach ($language->subcategories as $subcategory)
                    <div class="row">
                        <div class="col-md-3">
                        Podkategoria:
                        </div>
                        <div class="col-md-3">
                            <div class="col-form-label">
                            {{    $subcategory->name }}
                        </div></div>
                        <div class="col-form-label">
                        <form action="/user/languages/subcategory/delete/{{ $subcategory->id }}"
                              method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">
                                Usuń
                            </button>
                        </form>
                        </div>
                        </div>
                    @endforeach
            <hr/>
            @endforeach


            <form action='/user/languages/add'
                  method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"> Nowy język </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="string" class="form-control" name="name"
                           placeholder="Wprowadź nazwę" required>
                       </div>
                       <div class="col-md-4">
                           <input type="string" class="form-control" name="shortcut"
                          placeholder="Skrót" required>
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
