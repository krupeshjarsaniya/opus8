@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
      <h1 class="text-center font-weight-light mb-3"><b>Meetigns</b></h1>
      <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 0 auto"></div>
      <div id="app"></div>
      <svg width="500" height="350">
         <defs>
            <clipPath id="myCircle">
               <circle cx="475" cy="175" r="31.37267421602789" fill="transparent" />
            </clipPath>
         </defs>
      </svg>
    <div>
      <input type="hidden" value="{{ json_encode($agent) }}" id="getArray">
</section>
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

  $(document).ready(function(){

        // alert('hii');

            if ($(window).width() <= 767)
            {
                $('svg').css('width','100%');
                $('image').attr('clip-path','url(#myCircle)');
                $('#myCircle').children('circle').attr('cx','113');
                $('#myCircle').children('circle').attr('cy','113');
                $('#myCircle').children('circle').attr('r','20');
                $('.apexcharts-datalabel-label').remove();
                $('.apexcharts-datalabel-value').remove();
                $(".apexcharts-radialbar>g").css('transform','translate(-16%, -3%) scale(1.5)');
                $('.apexcharts-theme-light').css('height','500');
                $('.apexcharts-svg').attr('height','500');
                $('.apexcharts-svg foreignObject').css('height','500');
            }
            else
            {
               $('image').attr('clip-path','url(#myCircle)');
               $('#myCircle').children('circle').attr('cx','459');
                $('#myCircle').children('circle').attr('cy','175');
                $('#myCircle').children('circle').attr('r','31');
               $('.apexcharts-datalabel-label').remove();
               $('.apexcharts-datalabel-value').remove();
               $('.apexcharts-radialbar-hollow').css('width','800');
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

<script type="text/babel">

      var MainValue = $('#getArray').val();
        MainValue = JSON.parse(MainValue)
        console.log(MainValue);

      class ApexChart extends React.Component {
        constructor(props) {
          super(props);
          this.state = {
            series: MainValue,
            options: {

              chart: {

                height: 350,
                type: 'radialBar',
              },

              legend: {
                show: true,
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
                horizontalAlign: "center",
                floating: false,
                fontSize: "14px",
                fontFamily: "Helvetica, Arial",
                width: undefined,
                height: undefined,
                formatter: undefined,
                offsetX: 0,
                offsetY: 0,
                labels: {
                  colors: undefined,
                  useSeriesColors: false
                },
                markers: {
                  width: 12,
                  height: 12,
                  strokeWidth: 0,
                  strokeColor: "#fff",
                  radius: 12,
                  customHTML: undefined,
                  onClick: undefined,
                  offsetX: 0,
                  offsetY: 0
                },

                onItemClick: {
                  toggleDataSeries: true
                },
                onItemHover: {
                  highlightDataSeries: true
                }
              },
              plotOptions: {
                radialBar: {
                  size: undefined,
                  inverseOrder: false,
                  startAngle: -90,
                  endAngle: 270,
                  offsetX: 0,
                  offsetY: 0,
                  hollow: {
                    margin: 15,
                    size: '25%',
                    image: '{{ $agentImage->agent->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}',
                    imageWidth: 64,
                    imageHeight: 64,
                    imageClipped: false
                  },
                }
              },
              
                labels: ['Industrial '+{{ $agent[0] }}+'%', 'Healthcare '+{{ $agent[1] }}+'%', 'Gas & Oil '+{{ $agent[2] }}+'%', 'Hospitality '+{{ $agent[3] }}+'%','Logistisc '+{{ $agent[4] }}+'%','Finance '+{{ $agent[5] }}+'%'],
                colors: ['#e38c01', '#ffd704', '#74cdd6', '#0073af', '#a8d7a9','#4f5050'],
                stroke: {
                  lineCap: 'round',

                }
            },

          };
        }

        render() {
          return (
            <div>
              <div id="meetignChart">
                <ReactApexChart options={this.state.options} series={this.state.series} type="radialBar" height={350} />
              </div>
              <div id="html-dist"></div>
            </div>
          );
        }
      }

      const domContainer = document.querySelector('#app');
      ReactDOM.render(React.createElement(ApexChart), domContainer);
</script>


@endpush
