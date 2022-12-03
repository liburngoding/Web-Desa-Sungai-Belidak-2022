<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    @yield('title')
    @include('layouts.stylesheet')
    @yield('stylesheet')
</head>

<body>
    <div id="fb-root"></div>


    <div class="shadow">
        <!-- navbar -->
        @include('layouts.navbar')
        <!-- end navbar -->

        <!-- start slider -->
        @include('layouts.slider')
        <!-- end Slider -->

        <!-- content -->
        <div class="main-content">
            <!-- section -->
            <div class="section">
                <div class="row">

                    <div class="col-md-1">

                    </div>
                    <!-- laporan Terbaru -->
                    <div class="col-md-10">
                        @yield('authsection')
                        <br>
                        @yield('judul')

                        <hr class="custom-line" />
                        <!-- End Laporan Terbaru -->
                        @yield('container2')
                    </div>
                    <div class="col-md-1"></div>
                </div>
                @yield('container')
                <!-- end row -->
            </div>
            <!-- /.section -->
        </div>
        <!-- end main-content -->
        <!-- shadow -->
        <!-- Footer -->
        @include('layouts.footer')
        <!-- /footer -->
    </div>
</body>

@yield('script')
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</html>
