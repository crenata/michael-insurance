<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="{{ route("home") }}" class="nav-link {{ Route::is("home") ? "active" : "" }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Home
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("register") }}" class="nav-link {{ Route::is("register") ? "active" : "" }}">
                <i class="nav-icon fa-solid fa-user-plus"></i>
                <p>
                    Register User
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("users") }}" class="nav-link {{ Route::is("users") ? "active" : "" }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Registered User List
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("quotation.flow") }}" class="nav-link {{ Route::is("quotation.flow") ? "active" : "" }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    View Quotation Flow
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Logout
                </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
