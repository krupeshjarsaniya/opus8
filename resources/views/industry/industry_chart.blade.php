@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light  mb-3">Sign Ups Broken down by <b>industry</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 0 auto"></div>
        <div id="app">
          <div id="industry_chart">
            <div class="chart_image">
              <img src="{{ asset('assets/images/avatar-img.png') }}" />
            </div>
            <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>
          </div>
        </div>
    <div>
</section>

@endsection
@push('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/chart/chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/chart/vue-apexcharts.js') }}"></script>
<script>
  
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b

      $(document).ready(function(){
            // $('.apexcharts-graphical').attr('transform','translate(150, 0)');
            // $('.apexcharts-theme-light').css('width','800');
            // $('.apexcharts-svg').attr('width','800');
            // $('.apexcharts-svg foreignObject').css('width','800');
            // $(".apexcharts-pie circle").append('<image x="0%" y="0%" width="512" height="512" xlink:href="https://www.w3schools.com/tags/img_girl.jpg"></image>');
            
            if ($(window).width() <= 767) 
            {  
              $(".apexcharts-pie>g").css('transform','translate(0, 0) scale(3)');
              $('.apexcharts-theme-light').css('height','500');
              $('.apexcharts-svg').attr('height','500');
              $('.apexcharts-svg foreignObject').css('height','700');
              $('.apexcharts-datalabels text').attr('font-size','4px');
            } 
            else{
              $('.apexcharts-datalabels text').attr('font-size','16px');
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
          series: [44, 55, 41, 17, 15],
          chartOptions: {
            labels: ['Healthcare', 'IT', 'Hospitality', 'Finance', 'Industrial'],
            chart: {
              type: 'donut',
            },
          },
        },
      })
    </script>
@endpush
