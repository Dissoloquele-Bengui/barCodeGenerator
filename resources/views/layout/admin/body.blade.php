<!doctype html>
<html lang="pt-br">
@include('layout.admin.head')
<body class="Hhrizontal  light  ">
    <div class="wrapper">
        @include('layout.admin.menu')
        <main role="main" class="main-content">
            @yield('conteudo')
        </main>

    </div> <!-- .wrapper -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/simplebar.min.js')}}"></script>
    <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('js/tinycolor-min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/d3.min.js')}}"></script>
    <script src="{{asset('js/topojson.min.js')}}"></script>
    <script src="{{asset('js/datamaps.all.min.js')}}"></script>
    <script src="{{asset('js/datamaps-zoomto.js')}}"></script>
    <script src="{{asset('js/datamaps.custom.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{asset('js/gauge.min.js')}}"></script>
    <script src="{{asset('js/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/apexcharts.min.js')}}"></script>
    <script src="{{asset('js/apexcharts.custom.js')}}"></script>
    <script src="{{asset('js/apps.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
