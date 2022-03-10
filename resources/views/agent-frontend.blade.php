@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light "><b>Website </b> Visit</h1>
        <div id="app">
              <div id="chart1">
                <apexchart type="polarArea" :options="chartOptions" :series="series"></apexchart>
              </div>
        </div>
    <div>
</section>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-apexcharts"></script>

    <script>
        $(document).ready(function(){
            $('.apexcharts-graphical').attr('transform','translate(150, 0)');
        })
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
          
          series: [9,25,13,10,19,18],

          chartOptions: {
             labels: [ "Referrals","Facebook","Google","Orgenic","Twiter","Email Marketing"],
             colors: ['#ffd704', '#e38c01', '#0073af', '#d7d7d7', '#a8d7a9','#4f5050'],
            chart: {
              type: 'polarArea',
              
            },

            stroke: {
              colors: ['#fff']
            },
            fill: {
              opacity: 1
            },
            responsive: [{
              breakpoint: 375,
              options: {
                chart: {
                  width: 310,
                  height:500,
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