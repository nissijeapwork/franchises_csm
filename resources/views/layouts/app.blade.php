<!doctype html>
<html lang="en">
    
    @include('layouts.head')

    <body data-sidebar="dark">
    
        @include('layouts.loader')

        <!-- Begin page -->
        <div id="layout-wrapper">

                @include('layouts.nav')

                @include('layouts.sidebar')

                @include('layouts.setting')


                @yield('content')


                <!-- @include('layouts.footer') -->
        </div>

        @include('layouts.script')
    </body>
</html>
