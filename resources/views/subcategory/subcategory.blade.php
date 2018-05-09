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
                        <a class="nav-link active" href="/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}">Lista zestawów</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}/edytuj">Edytuj</a>
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

            <div class="card-body">
                    @foreach ($subcategory->setsToShow(Auth::user()) as $set)

                            <div class="row justify-content-center">

                                <div class="col-md-6">
                                    <a class="nav-link" href = "/language/{{ $subcategory->language->shortcut}}/{{ $subcategory->name }}/{{ $set->name }}">
                                    {{ $set -> name }}
                                </a></div>
                            </div>
                            <hr>
                    @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
