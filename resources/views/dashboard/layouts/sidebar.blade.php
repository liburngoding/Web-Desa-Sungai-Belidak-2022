<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        {{-- Logo Kiri Atas Headbar --}}
        <a href="/" class="app-brand-link">
            {{-- ! style="pointer-events: none; cursor: default;" --}}
            {{-- ? Kalau pengen matikan linknya --}}
            <span class="app-brand-logo demo">
                <img alt="Brand" src="{{ asset('images/logo1.png') }}" width="25" viewBox="0 0 25 42">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Sungai Belidak</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard', 'dashboard/myprofile*') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-dashboard"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
            <a href="/dashboard/posts" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Post</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('dashboard/villagers*') ? 'active' : '' }}">
            <a href="/dashboard/villagers" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Analytics">Data Warga</div>
            </a>
        </li>

        @can('admin')
            <li class="menu-header small text-uppercase">
                <i class="menu-icon tf-icons bx bxs-customize"></i>
                <span class="menu-header-text">Administrator Level</span>
            </li>

            <li
                class="menu-item
            {{ Request::is('dashboard/professions*') ? 'active open' : '' }}
            {{ Request::is('dashboard/maritals*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-edit"></i>
                    <div data-i18n="Account Settings">Warga</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ Request::is('dashboard/professions*') ? 'active' : '' }}">
                        <a href="/dashboard/professions" class="menu-link">
                            <div data-i18n="Connections">Pekerjaan</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('dashboard/maritals*') ? 'active' : '' }}">
                        <a href="/dashboard/maritals" class="menu-link">
                            <div data-i18n="Connections">Status Perkawinan</div>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="menu-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                <a href="/dashboard/categories" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-category"></i>
                    <div data-i18n="Analytics">Kategori Post</div>
                </a>
            </li>

            <li class="menu-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
                <a href="/dashboard/users" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                    <div data-i18n="Analytics">Manajemen Pengguna</div>
                </a>
            </li>
        @endcan

    </ul>
</aside>
