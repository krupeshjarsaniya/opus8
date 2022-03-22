@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center mb-5 font-weight-light">Sign <b> Up</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 25px auto"></div>
        <div id="sign_chart"></div>
        <div>
        <input type="hidden" value="{{ json_encode($agent) }}" id="getArray">
</section>
@endsection
@push('js')
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script type="text/javascript">

 /**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/**
 * Chart design taken from Samsung health app
 */

var chart = am4core.create("sign_chart", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingRight = 40;

var MainValue = $('#getArray').val();
chart.data = JSON.parse(MainValue);

// chart.data = [{
//     "name": "Monica",
//     "steps": 45688,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }, {
//     "name": "Joey",
//     "steps": 35781,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }, {
//     "name": "Ross",
//     "steps": 25464,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }, {
//     "name": "Phoebe",
//     "steps": 18788,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }, {
//     "name": "Rachel",
//     "steps": 15465,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }, {
//     "name": "Chandler",
//     "steps": 11561,
//     "href": "{{asset('assets/images/avatar-img.png')}}"
// }];



var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.strokeOpacity = 0;
categoryAxis.renderer.minGridDistance = 10;
categoryAxis.renderer.labels.template.dx = -40;
categoryAxis.renderer.minWidth = 120;
categoryAxis.renderer.tooltip.dx = -40;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.fillOpacity = 0.3;
valueAxis.renderer.grid.template.strokeOpacity = 0;
valueAxis.min = 0;
valueAxis.cursorTooltipEnabled = false;
valueAxis.renderer.baseGrid.strokeOpacity = 0;
valueAxis.renderer.labels.template.dy = 20;

var series = chart.series.push(new am4charts.ColumnSeries);
series.dataFields.valueX = "steps";
series.dataFields.categoryY = "name";
series.tooltip.pointerOrientation = "horizontial";
series.tooltip.dy = -20;
series.tooltip.dx = 30;
// series.columnsContainer.zIndex = 100;
series.columns.template.tooltipText = "{valueX.value}%";
series.columns.template.showTooltipOn = "always";
series.columns.template.tooltipX = 0;

var columnTemplate = series.columns.template;
columnTemplate.height = am4core.percent(50);
columnTemplate.maxHeight = 50;
columnTemplate.column.cornerRadius(5, 10, 5, 10);   
columnTemplate.strokeOpacity = 0;

series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueX", min: am4core.color("#ffbd01"), max: am4core.color("#ff8701") });
series.mainContainer.mask = undefined;

var cursor = new am4charts.XYCursor();
chart.cursor = cursor;
cursor.lineX.disabled = true;
cursor.lineY.disabled = true;
cursor.behavior = "none";

var bullet = columnTemplate.createChild(am4charts.CircleBullet);
bullet.circle.radius = 28;
bullet.valign = "middle";
bullet.align = "right";
bullet.isMeasured = true;
bullet.interactionsEnabled = false;
bullet.horizontalCenter = "right";
bullet.interactionsEnabled = false;

// var hoverState = bullet.states.create("hover");
var outlineCircle = bullet.createChild(am4core.Circle);
outlineCircle.adapter.add("radius", function (radius, target) {
    var circleBullet = target.parent;
    return circleBullet.circle.pixelRadius + 0;
})

var image = bullet.createChild(am4core.Image);
image.width = 100;
image.height = 100;
image.horizontalCenter = "middle";
image.verticalCenter = "middle";
image.propertyFields.href = "href";

image.adapter.add("mask", function (mask, target) {
    var circleBullet = target.parent;
    return circleBullet.circle;
})

var previousBullet;
chart.cursor.events.on("cursorpositionchanged", function (event) {
    var dataItem = series.tooltipDataItem;

    if (dataItem.column) {
        var bullet = dataItem.column.children.getIndex(1);

        if (previousBullet && previousBullet != bullet) {
            previousBullet.isHover = false;
        }

        if (previousBullet != bullet) {

            var hs = bullet.states.getKey("hover");
            hs.properties.dx = dataItem.column.pixelWidth;
            bullet.isHover = true;

            previousBullet = bullet;
        }
    }
})
  </script>
@endpush
