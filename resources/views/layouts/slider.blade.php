<div id="mainCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#mainCarousel" data-slide-to="1"></li>
        <li data-target="#mainCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="{{ asset('images/header_02.jpg') }}" loading="lazy">
            <div class="carousel-caption welcome">
                <h2 class="animated bounceInRight">Selamat Datang</h2>
                <h3 class="animated bounceInLeft">Website Pemerintah Desa Sungai Belidak</h3>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('images/header_01.jpg') }}" loading="lazy">
            <div class="carousel-caption">
                <h2 class="animated bounceInDown">Perangkat Desa</h2>
            </div>
        </div>
        <div class="item">
            <img src="{{ asset('images/header_03.jpg') }}" loading="lazy">
            <div class="carousel-caption">
                <h2 class="animated bounceInUp">Pengumuman</h2>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#mainCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#mainCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
