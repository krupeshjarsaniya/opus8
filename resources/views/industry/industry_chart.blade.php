@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center mb-5 font-weight-light">Sign Ups Broken down by <b>industry</b></h1>
        
       <div id="app" class="px-5">
          <div id="chart">
            <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>
          </div>
       </div>

        <!-- <div id="app">
            <div class="img">
                <img src="{{ asset('assets/images/avatar-img.png') }}" class="middleimg">
            </div>
            <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>       
        </div> -->


        
    <div>
</section>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>
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
          series: [44, 55, 41, 17, 15],
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
