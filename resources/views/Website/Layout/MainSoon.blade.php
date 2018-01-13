<!DOCTYPE html>
<html lang="en">
<head>
    @include('Website.Layout.MetaHead')
</head>
<body>
<div class="page page-1">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header class="head-3">
        @include('Website.Layout.HeaderSoon')
    </header>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer class="foot">
        @include('Website.Layout.FooterSoon')
    </footer>
</div>

@include('Website.Layout.MetaFoot')
<style>
    @media  (max-width: 480px){
        .own-opacity, .page-1 .swiper-container {
            height: 1050px !important;
        }
    }
</style>
</body>
</html>
