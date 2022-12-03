<div class="col-md-4 col-12 mb-3 mb-md-0">
    <div class="list-group">
        <a class="list-group-item {{ Request::is('dashboard/myprofile') ? 'active' : '' }}"
            href="/dashboard/myprofile">User
            Profile</a>
        <a class="list-group-item {{ Request::is('dashboard/myprofile/password') ? 'active' : '' }}"
            href="/dashboard/myprofile/password">Ganti
            Password</a>
    </div>
</div>
