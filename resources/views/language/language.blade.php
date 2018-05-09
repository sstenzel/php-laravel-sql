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
                        <a class="nav-link active" href="/language/{{ $language->shortcut}}">Lista podkategorii</a>
                    </li>
                    @auth
                        @if($language->editPermission(Auth::user()))
                        <li class="nav-item">
                            <a class="nav-link" href="/language/{{ $language->shortcut}}/edytuj">Edytuj</a>
                        </li>
                        @endif
                    @endauth
                    <div class="col-md-7 float-right">
                        <a class="btn btn-default float-right"
                           href="/">
                          Wróć
                      </a>
                  </div>
                </ul>
        </div>

        <div class="card-body">
            @foreach ($language->subcategories as $subcategory)
                <div class="row justify-content-center">

                        <div class="col-md-6">
                        <a class="nav-link" href = "/language/{{ $language->shortcut}}/{{ $subcategory->name }}">
                            {{ $subcategory -> name }}
                        </a></div>

                </div>
            @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
