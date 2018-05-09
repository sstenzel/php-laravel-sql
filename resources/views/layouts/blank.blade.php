
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} </title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <div class="row justify-content-center">
<canvas id="canvas" width="400" height="300"></canvas>
</div>
<div class="row justify-content-center">
<canvas id="myChart" width="400" height="400"></canvas>
</div>
  <script type="text/javascript" src="{{ asset('js/chart/Chart.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chart/utils.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


<script>
var color = Chart.helpers.color;
var ctx = document.getElementById('canvas').getContext('2d');
window.myHorizontalBar = new Chart(ctx, {
type: 'horizontalBar',
data: {
  labels: [
  ],
  datasets: [
          @foreach($results as $result)
          @php
              $c1 = rand(1,255);
              $c2 = rand(1,255);
              $c3 = rand(1,255);
          @endphp
      {
          label: 'label',
          backgroundColor: color('rgb({{$c1}},{{$c2}},{{$c3}})').alpha(0.5).rgbString(),
          borderColor: 'rgb({{$c1}},{{$c2}},{{$c3}})',
          borderWidth: 1,
          data: [
              {{ $result->percentage }},
          ]
      },
      @endforeach
  ]
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
      text: 'Wyniki'
  },
  scales: {
      xAxes: [{
          ticks: {
              beginAtZero:true
          }
      }]
  }
}
});
</script>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
datasets: [{
label: '# of Votes',
data: [12, 19, 3, 5, 2, 3],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(75, 192, 192, 0.2)',
'rgba(153, 102, 255, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
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

</body>
</html>
