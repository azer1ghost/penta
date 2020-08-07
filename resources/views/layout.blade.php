<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keyword')">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @include('frontend.default.stylesheets')
        @yield('style')
    </head>
    <body class="sj-home">
        @include('frontend.moduls.static.loader')
            <!--Wrapper Start-->
            <div id="sj-wrapper" class="sj-wrapper">
                <!--Content Wrapper Start-->
                <div class="sj-contentwrapper">
                    @yield('content')
                </div>
                <!--Content Wrapper End-->
            </div>
            <!--Wrapper End-->
        @include('frontend.moduls.static.search')
        @include('frontend.default.js_scripts')
    </body>
</html>