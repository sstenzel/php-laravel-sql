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
                        <a class="nav-link" href="/user/languages">Języki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/user/permissions">Uprawnienia</a>
                    </li>
                    @endif
                </ul>
            </div>

        <div class="card-body">

            <div class="row">
                <div class="col-sm-3">
                    Nazwa
                 </div>
                <div class="col-sm-2">
                    Rola
                </div>
                <div class="col-sm-2">
                    Język
                </div>
                <div class="col-sm-2">
                    Podkategoria
                </div>
            </div>
<hr/>
            <div class="row justify-content-center">

            @foreach ($users as $user)
            @foreach ($user->getSubcategories()  as $subcategory)

                    <form action="/user/permissions/delete/{{  $user->id }}/{{ $subcategory->id }}"
                          method="post">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                              <div class="row row justify-content-center">
                              <div class="col-sm-3">
                                   <input type="string" class="form-control" placeholder='{{ $user->name }}' disabled>
                               </div>
                               <div class="col-sm-2">
                                    <input type="string" class="form-control" placeholder='{{ $user->role->name}}' disabled>
                                </div>
                                <div class="col-sm-2">
                                     <input type="string" class="form-control" placeholder='{{  $subcategory->language->name }}' disabled>
                                 </div>
                                 <div class="col-sm-3">
                                      <input type="string" class="form-control" placeholder='{{  $subcategory->name }}' disabled>
                                  </div>

                              <div class="col-sm-1">
                                  <button type="submit" class="btn btn-danger">Usuń</button>
                              </div>
                              </div>
                              </div>
                    </form>

            @endforeach
            @endforeach
        </div>
        <hr/>
             <div class="row justify-content-center">
                    <div class="col-sm-10 text-left">
                        Nowe uprawnienie
                    </div>
                </div>
                    <div class="col-sm-12">
                    <form action="/user/permissions/add"
                          method="post">
                          {{ method_field('POST') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                              <div class="row">

                              <div class="col-sm-4">
                                      <select class="form-control" name="userId" >
                                          @foreach ($users as $user)
                                              <option value="{{ $user->id }}">
                                                  {{ $user->name }}
                                              </option>
                                          @endforeach
                                      </select>
                               </div>
                               <div class="col-sm-6">
                               <select  class="form-control" name="subcategoryId">
                                        @foreach ($languages as $language)
                                            @foreach($language->getSubcategories() as $subcategory)
                                            <option value="{{ $subcategory->id }}">
                                            {{ $language->name }}:      {{ $subcategory->name }}
                                           </option>
                                           @endforeach
                                        @endforeach
                                        </select>
                                </div>
                              <div class="col-sm-1">
                                  <button type="submit" class="btn btn-default">Dodaj</button>
                              </div>
                              </div>
                              </div>
                    </form>

                </div>
                <hr/>



            </div>
        </div>
    </div>
</div>
@endsection
