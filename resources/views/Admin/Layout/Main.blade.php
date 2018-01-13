<!DOCTYPE html>
<html>

<head>
    @include('Admin.Layout.MetaHeader')
</head>

<body class="fixed-navigation">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        @include('Admin.Layout.NavBar')
    </nav>

    <div id="page-wrapper" class="gray-bg sidebar-content">
        <div class="row border-bottom">
            @include('Admin.Layout.Header')
        </div>
        <!--<div class="sidebard-panel">
            @include('Admin.Layout.LeftSidebar')
        </div>-->
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        <div class="footer">
            @include('Admin.Layout.Footer')
        </div>

    </div>
    <div id="right-sidebar">
        @include('Admin.Layout.RightSidebar')
    </div>
</div>

@include('Admin.Layout.MetaFooter')
@yield('extra-js')
</body>
</html>
