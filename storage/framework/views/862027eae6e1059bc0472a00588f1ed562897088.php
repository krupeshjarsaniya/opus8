<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('body-class', 'hd-auth-body'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
      <h1 class="text-center mb-5 font-weight-light"><b>Meetigns</b></h1>
      <div id="app"></div>
    <div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

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
             $('.apexcharts-theme-light').css('height','500');
             $('.apexcharts-svg').attr('height','500');
             $('.apexcharts-svg foreignObject').css('height','500');
            }
            else
            {

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
      class ApexChart extends React.Component {
        constructor(props) {
          super(props);

          this.state = {
          
             series: [44, 55, 67, 83, 100, 90],
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
                    image: '<?php echo e(asset('assets/images/avatar-img.png')); ?>',
                    imageWidth: 64,
                    imageHeight: 64,
                    imageClipped: false
                  },
                }
              },
                labels: ['Industrial', 'Healthcare', 'Gas & Oil', 'Hospitality','Logistisc','Finance'],
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/opus8/resources/views/meeting-frontend-chart.blade.php ENDPATH**/ ?>