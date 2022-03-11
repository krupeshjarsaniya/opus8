<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<link rel="stylesheet" href="{!! url(mix('assets/css/app.css')) !!}" />
<link rel="stylesheet" href="{!! url(mix('assets/css/style.css')) !!}" />
<link rel="stylesheet" href="{!! url(mix('assets/fonts/stylesheet.css')) !!}" />
<link rel="stylesheet" href="{!! url(mix('assets/css/vendor.css')) !!}" />
<style>
    .remedy-layout-wrapper::before {
        position: absolute;
        content: "";
        background: url({{ asset('/images/remedy-umbrella-bg-image.png?4c9bf4196c83975faddf73ce557d016a')}}) no-repeat;
        background-position: bottom;
        background-size: contain;
        width: 100%;
        height: 610px;
        right: 0;
        left: 0;
        bottom: 0;
        z-index: -1;
    }
</style>
@stack('styles')
@show
