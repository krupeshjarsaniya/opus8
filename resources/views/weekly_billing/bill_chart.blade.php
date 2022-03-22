@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light mb-3">Week 41 <b>Billings</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 0 auto"></div>
        <div id="bill_chart"></div>
    <div>
<input type="hidden" value="{{ json_encode($billingArray) }}" id="getArray">
</section>
@endsection
@push('js')
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/**
 * Chart design taken from Samsung health app
 */

var chart = am4core.create("bill_chart", am4charts.XYChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.paddingBottom = 30;

 var MainValue = $('#getArray').val();
  chart.data = JSON.parse(MainValue);


var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.strokeOpacity = 0;
categoryAxis.renderer.minGridDistance = 10;
categoryAxis.renderer.labels.template.dy = 35;
categoryAxis.renderer.tooltip.dy = 35;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.fillOpacity = 0.3;
valueAxis.renderer.grid.template.strokeOpacity = 0;
valueAxis.min = 0;
valueAxis.cursorTooltipEnabled = false;
valueAxis.renderer.baseGrid.strokeOpacity = 0;

var series = chart.series.push(new am4charts.ColumnSeries);
series.dataFields.valueY = "steps";
series.dataFields.categoryX = "name";

series.tooltip.pointerOrientation = "vertical";
series.tooltip.dy = -50;
series.columnsContainer.zIndex = 100;

series.columns.template.tooltipText = "{valueY}%";
series.columns.template.showTooltipOn = "always";
series.columns.template.tooltipY = 0;

var columnTemplate = series.columns.template;
columnTemplate.width = am4core.percent(50);
columnTemplate.maxWidth = 66;
columnTemplate.column.cornerRadius(0, 0, 0, 0);
columnTemplate.strokeOpacity = 0;

series.heatRules.push({ target: columnTemplate, property: "fill", dataField: "valueY", min: am4core.color("#ffbd01"), max: am4core.color("#ff8701") });
series.mainContainer.mask = undefined;

var cursor = new am4charts.XYCursor();
chart.cursor = cursor;
cursor.lineX.disabled = true;
cursor.lineY.disabled = true;
cursor.behavior = "none";

// Add bullets
    var bullet = columnTemplate.createChild(am4charts.CircleBullet);
    bullet.circle.radius = 30;
    bullet.align = "center";
    bullet.isMeasured = true;
    bullet.mouseEnabled = false;
    bullet.interactionsEnabled = false;

    var outlineCircle = bullet.createChild(am4core.Circle);
    outlineCircle.adapter.add("radius", function (radius, target) {
        var circleBullet = target.parent;
        return circleBullet.circle.pixelRadius + 10;
    })

    var image = bullet.createChild(am4core.Image);
    image.width = 60;
    image.height = 60;
    image.horizontalCenter = "middle";
    image.verticalCenter = "middle";
    image.propertyFields.href = "href";
    // image.dy = -80;

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
            hs.properties.dy = -bullet.parent.pixelHeight + 30;
            bullet.isHover = true;

            previousBullet = bullet;
        }
    }
})

}); // end am4core.ready()
</script>
@endpush
