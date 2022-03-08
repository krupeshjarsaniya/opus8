@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
      <h1 class="text-center mb-5 font-weight-light">Sign Ups Broken down by <b>industry</b></h1>
      <div class="col-lg-8" id="app">
            <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>
      </div>
    <div>
</section>

<script src="{{ asset('assets/js/chart/chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/chart/vue-apexcharts.js') }}"></script>
<script>
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>
    <script>
      new Vue({
        el: '#app',
        components: {
          apexchart: VueApexCharts,
        },
        data: {
          
          series: [40, 55, 41, 17, 15],
          chartOptions: {
            chart: {
              type: 'donut',
            },
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width:  500
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
          
          
        },
        
      })
    </script>
@endsection
