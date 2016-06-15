<!DOCTYPE html>
<html lang="en">
<head>
    @include('App.Layout.MetaHead')
</head>
<body>
<div class="page page-1">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="head-3">
        @include('App.Layout.HeaderSoon')
    </header>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer class="foot">
        @include('App.Layout.FooterSoon')
    </footer>
</div>

@include('App.Layout.MetaFoot')
<style>
    @media  (max-width: 480px){
        .own-opacity, .page-1 .swiper-container {
            height: 1050px !important;
        }
    }
</style>
</body>
</html>
