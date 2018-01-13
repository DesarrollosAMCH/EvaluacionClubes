<!DOCTYPE html>
<html lang="en">
<head>
    @include('Website.Layout.MetaHead')
</head>
<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>
        @include('Website.Layout.Header')
    </header>

    <!--========================================================
                              CONTENT
    =========================================================-->


    <main>
        @yield('content')
    </main>

    <!--========================================================
                            FOOTER
  =========================================================-->
    <footer>
        @include('Website.Layout.Footer')
    </footer>
</div>


@include('Website.Layout.MetaFoot')


</body>
</html>
