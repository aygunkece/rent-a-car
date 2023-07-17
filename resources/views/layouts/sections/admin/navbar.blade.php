<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        @include('layouts.sections.admin.navbar.navbar-search')
        <ul class="navbar-nav">
            @include('layouts.sections.admin.navbar.navbar-language')
            @include('layouts.sections.admin.navbar.navbar-apps')
            @include('layouts.sections.admin.navbar.navbar-messages')
            @include('layouts.sections.admin.navbar.navbar-notifications')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ isset(auth()->user()->name) ? auth()->user()->name : "" }}</p>
                            <p class="tx-12 text-muted">{{ isset(auth()->user()->email) ? auth()->user()->email : "" }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{ asset("../../pages/general/profile.html") }}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="javascript:;" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Profili Düzenle</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Çıkış Yap</span>
                            </a>
                            @auth('rsa')
                                <form action="{{ route("auth.rsa.logout") }}" method="POST" id="logoutForm">
                                    @csrf
                                </form>
                            @elseauth('company')
                                <form action="{{ route("auth.company.logout") }}" method="POST" id="logoutForm">
                                    @csrf
                                </form>
                            @endauth
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
