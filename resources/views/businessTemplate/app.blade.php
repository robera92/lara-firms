<!DOCTYPE html>
<html lang="en">
    @include('businessTemplate/_partials/head')
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            @include('businessTemplate/_partials/sidebar')
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                @include('businessTemplate/_partials/navigation')
                <!-- Page content-->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('businessTemplate/_partials/footer')
    </body>
</html>