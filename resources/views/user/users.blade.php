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
                        <a class="nav-link active" href="/user/users">Użytkownicy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/languages">Języki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/permissions">Uprawnienia</a>
                    </li>
                    @endif
                </ul>
            </div>

        <div class="card-body">

            <div class="row">
                <div class="col-sm-1">
                    Id
                </div>
                <div class="col-sm-3">
                    Nazwa
                 </div>
                 <div class="col-sm-4">
                    Email
                </div>
                <div class="col-sm-2">
                    Rola
                </div>
            </div>
<hr/>
            @foreach ($users as $user)
             <div class="row">
                    <div class="col-sm-12">
                    <form action="/user/edit/{{  $user->id }}"
                          method="post">
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                          <div class="form-group">
                              <div class="row">
                              <div class="col-sm-1">
                                  <input type="string" class="form-control" placeholder='{{ $user->id }}' disabled>
                              </div>
                              <div class="col-sm-3">
                                   <input type="string" class="form-control" placeholder='{{ $user->name }}' disabled>
                               </div>
                               <div class="col-sm-4">
                                  <input type="string" class="form-control" name="email"
                                 placeholder="{{ $user->email }}">
                              </div>
                              <div class="col-sm-2">
                                  <select class="form-control" name="role_id" >
                                      @foreach($roles as $role)
                                          <option value="{{ $role->id }}">
                                              {{ $role->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-sm-1">
                                  <button type="submit" class="btn btn-default">Zapisz</button>
                              </div>
                              </div>
                              </div>
                    </form>
                    </div>

                    <div class="col-sm-12 text-right">
                    <form action="/user/delete/{{ $user->id }}"
                          method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger pull-right">
                            Usuń użytkownika
                        </button>
                    </form>

                </div>

            </div>
            <hr/>
            @endforeach



            </div>
        </div>
    </div>
</div>
@endsection
