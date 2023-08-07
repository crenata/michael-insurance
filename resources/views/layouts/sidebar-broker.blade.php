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
            <a href="{{ route("broker.quotation.create") }}" class="nav-link {{ Route::is("broker.quotation.create") ? "active" : "" }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Create Quotation
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("quotation.created") }}" class="nav-link {{ Route::is("quotation.created") ? "active" : "" }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    View Created Quotation
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("quotation.rejected") }}" class="nav-link {{ Route::is("quotation.rejected") ? "active" : "" }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    View Rejected Quotation
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("broker.discount.create") }}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Add Discount
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("chart") }}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Traffic Graph
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
