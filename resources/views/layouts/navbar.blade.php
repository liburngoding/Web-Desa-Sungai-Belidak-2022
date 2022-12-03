<nav class="navbar navbar-inverse navbar-fixed form-shadow">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                <img alt="Brand" src="{{ asset('images/logo1.png') }}" style="width: 50px;height: 50px;">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav nav-link">
                <li><a href="/">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/visimisi">Visi Misi</a></li>
                        <li class="divider"></li>
                        <li><a href="/sejarah">Sejarah Desa</a></li>
                        <li class="divider"></li>
                        <li><a href="/struktur">Perangkat Desa</a></li>
                        <li class="divider"></li>
                        <li><a href="/penduduk">Data Penduduk</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informasi<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="/posts">Semua Informasi</a>
                        </li>
                        <li class="divider"></li>
                        @foreach ($categories as $category)
                            @if ($loop->last)
                                <li>
                                    <a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
                                </li>
                            @elseif(!$loop->last)
                                <li>
                                    <a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
                                </li>
                                <li class="divider"></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li><a href="/kontak">Kontak</a></li>
                <li><a href="https://www.lapor.go.id/">Lapor</a></li>
                @auth
                    <li class="dropdown" style="float: right;">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Selamat Datang, {{ auth()->user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard">
                                    Dashboard</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-auto" style="float: right;">
                        <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>
            <ul class="nav navbar-nav nav-link">

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
