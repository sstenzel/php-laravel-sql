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
                        <a class="nav-link active" href="/user/index">Wyniki</a>
                    </li>
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="/user/users">Użytkownicy</a>
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
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                Język
                            </div>
                            <div class="col-md-3">
                                Podkategoria
                            </div>
                            <div class="col-md-3">
                                Zestaw
                            </div>
                            <div class="col-md-3">
                                Wynik
                            </div>
                        </div>
                        <hr>

                    @foreach ($results as $result)
                            <div class="row justify-content-center">
                                <div class="col-md-3">
                                    {{ $result->set->subcategory->language->name}}
                                </div>
                                <div class="col-md-3">
                                    {{ $result->set->subcategory->name }}
                                </div>
                                <div class="col-md-3">
                                    {{ $result->set->name }}
                                </div>
                                <div class="col-md-3">
                                    {{ $result->percentage }}
                                </div>
                            </div>
                            <hr>
                    @endforeach
                    <div class="row justify-content-center">
                        <canvas id="canvas" width="400" height="300"></canvas>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('chart')
<script type="text/javascript" src="{{ asset('js/chart/Chart.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chart/Utils.js') }}"></script>


<script>
      var color = Chart.helpers.color;
          var ctx = document.getElementById('canvas').getContext('2d');
          window.myHorizontalBar = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: [
                      @foreach($results as $result)
                      '{{ $result->set->name }}',
                      @endforeach
                  ],
                  datasets: [{
                             label: 'Procent',
                             backgroundColor: 'rgba(71, 83, 107, 0.2)',
                             borderColor: 'rgba(71, 83, 107, 0.5)',
                             borderWidth: 1,
                             data: [
                                 @foreach($results as $result)
                                 '{{ $result->percentage }}',
                                 @endforeach
                             ]
                } ]
              },
              options: {
                  elements: {
                      rectangle: {
                          borderWidth: 2,
                      }
                  },
                  responsive: true,
                  title: {
                      display: true,
                      text: 'Postępy w nauce'
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
  </script>

@endsection
