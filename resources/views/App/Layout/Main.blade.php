<!DOCTYPE html>
<html lang="en">
<head>
    @include('App.Layout.MetaHead')
</head>
<body>
<div class="page">
  <!--========================================================
                            HEADER
  =========================================================-->

  <header class="head1">
    @include('App.Layout.Header')
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
    @include('App.Layout.Footer')
  </footer>
</div>
    @include('App.Layout.MetaFoot')
</body>
</html>
