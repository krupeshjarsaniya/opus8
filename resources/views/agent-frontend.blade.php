@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light "><b>Website </b> Visit</h1>
        <div id="app">
              <div id="agentFrontendChart">
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
             

            if ($(window).width() <= 767) 
            {  
             $('.apexcharts-theme-light').css('height','500');
             $('.apexcharts-svg').attr('height','500');
             $('.apexcharts-svg foreignObject').css('height','500');
            }  
            else
            {
               $('.apexcharts-graphical').attr('transform','translate(150, 0)');
               $('.apexcharts-theme-light').css('width','800');
               $('.apexcharts-svg').attr('width','800');
               $('.apexcharts-svg foreignObject').css('width','800'); 
            }
        })
      
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
              breakpoint: 767,
              options: {
                chart: {
                  width: 300,
                  height:1000,
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