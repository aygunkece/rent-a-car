@role('admin')

<li class="nav-item">
    <a href="{{ route('rsa.index') }}" class="nav-link">
        <i class="link-icon" data-feather="globe"></i>
        <span class="link-title">Anasayfa</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#languages" role="button" aria-expanded="false" aria-controls="languages">
        <i class="link-icon" data-feather="globe"></i>
        <span class="link-title">Dil Yönetimi</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="languages">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('language.create') }}" class="nav-link {{ Route::is('language.create') ? 'active' : '' }}">Dil Ekleme Güncelleme</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('language.index') }}" class="nav-link {{ Route::is('language.index') ? 'active' : '' }}">Dil Listesi</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
        <i class="link-icon" data-feather="mail"></i>
        <span class="link-title">Firmalar</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="emails">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="{{ route('company.preConfirm.list') }}" class="nav-link" style="text-decoration: none!important;">Ön Onay Firma Listesi</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('company.preConfirm.list') }}" class="nav-link" style="text-decoration: none!important;">Firma Listesi</a>
            </li>

        </ul>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
        <i class="link-icon" data-feather="mail"></i>
        <span class="link-title">Firma</span>
        <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="emails">
        <ul class="nav sub-menu">
            <li class="nav-item">
                <a href="#" class="nav-link" style="text-decoration: none!important;">Firma Bilgileri Ekle</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" style="text-decoration: none!important;">Firma Bilgileri Listesi</a>
            </li>

        </ul>
    </div>
</li>
@endrole
