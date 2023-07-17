<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i data-feather="grid"></i>
    </a>
    <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
        <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
            <p class="mb-0 fw-bold">Web Apps</p>
            <a href="javascript:;" class="text-muted">Edit</a>
        </div>
        <div class="row g-0 p-1">
            <div class="col-3 text-center">
                <a href="{{ asset("../../pages/apps/chat.html") }}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
            </div>
            <div class="col-3 text-center">
                <a href="{{ asset("../../pages/apps/calendar.html") }}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
            </div>
            <div class="col-3 text-center">
                <a href="{{ asset("../../pages/email/inbox.html") }}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
            </div>
            <div class="col-3 text-center">
                <a href="{{ asset("../../pages/general/profile.html") }}" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
            </div>
        </div>
        <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
            <a href="javascript:;">View all</a>
        </div>
    </div>
</li>
