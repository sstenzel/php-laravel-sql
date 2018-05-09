@extends('layouts.template')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{ config('app.name') }}
        </div>



        <div class="links">
                @foreach ($languages as $language)
                <a href = "/language/{{ $language->shortcut }}">
                    {{ $language -> name }}
                </a>
                @endforeach
        </div>
</div>
</div>
@endsection
