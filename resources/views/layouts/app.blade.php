<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #c83e59;
            --primary-dark: #a92e47;
            --primary-soft: #fdebf0;
            --page-bg: #fff7f8;
            --surface: #ffffff;
            --text-dark: #35232a;
            --text-muted: #78666c;
            --border-color: #f0dce1;
            --sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--text-dark);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            color: var(--primary-dark);
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            width: var(--sidebar-width);
            padding: 26px 18px;
            overflow-y: auto;
            background: #f1e1e1;
            border-right: 1px solid var(--border-color);
            transition: transform .25s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 4px 8px;
            margin-bottom: 42px;
            color: var(--text-dark);
        }

        .brand:hover {
            color: var(--text-dark);
        }

        .brand-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            color: #fff;
            background: linear-gradient(135deg, #d94c68, #ad304c);
            border-radius: 15px;
            font-size: 25px;
        }

        .brand-name {
            margin: 0;
            font-size: 18px;
            font-weight: 750;
            line-height: 1.3;
        }

        .brand-subtitle {
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.2px;
        }

        .menu-label {
            padding: 0 12px;
            margin-bottom: 12px;
            color: #a18e94;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 15px;
            margin-bottom: 7px;
            color: #68575e;
            border-radius: 11px;
            font-size: 16px;
            font-weight: 550;
            transition: .2s ease;
        }

        .sidebar-link i {
            width: 22px;
            font-size: 19px;
        }

        .sidebar-link:hover {
            color: var(--primary);
            background: #fff5f7;
        }

        .sidebar-link.active {
            color: var(--primary-dark);
            background: var(--primary-soft);
            font-weight: 700;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 22px;
            border-top: 1px solid var(--border-color);
        }

        .logout-button {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 13px 15px;
            color: #c03950;
            background: #fff1f3;
            border: 0;
            border-radius: 11px;
            font-size: 16px;
            font-weight: 650;
            text-align: left;
            transition: .2s ease;
        }

        .logout-button:hover {
            background: #ffe2e8;
        }

        /* Main layout */
        .main-wrapper {
            min-height: 100vh;
            margin-left: var(--sidebar-width);
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 1020;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            min-height: 82px;
            padding: 15px 34px;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--border-color);
        }

        .topbar-title {
            margin: 0;
            font-size: 20px;
            font-weight: 750;
        }

        .topbar-subtitle {
            margin-top: 2px;
            color: var(--text-muted);
            font-size: 14px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            color: var(--primary);
            background: var(--primary-soft);
            border-radius: 50%;
            font-size: 20px;
        }

        .user-name {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .user-role {
            color: var(--text-muted);
            font-size: 13px;
        }

        .mobile-menu-button {
            display: none;
            width: 42px;
            height: 42px;
            color: var(--text-dark);
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 21px;
        }

        .sidebar-overlay {
            display: none;
        }

        .content {
            padding: 34px;
        }

        /* Page headings */
        .page-heading {
            margin-bottom: 27px;
        }

        .page-heading h2 {
            margin: 0 0 7px;
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 750;
        }

        .page-heading p {
            margin: 0;
            color: var(--text-muted);
            font-size: 16px;
        }

        /* Cards */
        .card {
            overflow: hidden;
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(89, 37, 51, .045);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 19px 23px;
            color: var(--text-dark);
            background: #fff;
            border-bottom: 1px solid var(--border-color);
            font-size: 17px;
            font-weight: 700;
        }

        .card-body {
            padding: 25px;
        }

        /* Dashboard statistics */
        .stat-card {
            height: 100%;
            padding: 25px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(89, 37, 51, .09);
        }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 54px;
            height: 54px;
            margin-bottom: 20px;
            border-radius: 15px;
            font-size: 25px;
        }

        .stat-icon.rose {
            color: #c83e59;
            background: #fdebf0;
        }

        .stat-icon.plum {
            color: #7950a3;
            background: #f2eafa;
        }

        .stat-label {
            margin-bottom: 7px;
            color: var(--text-muted);
            font-size: 15px;
            font-weight: 550;
        }

        .stat-number {
            margin: 0;
            color: var(--text-dark);
            font-size: 36px;
            font-weight: 800;
        }

        .stat-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            font-size: 15px;
            font-weight: 650;
        }

        /* Buttons */
        .btn {
            min-height: 42px;
            padding: 9px 17px;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 650;
        }

        .btn-primary {
            color: #fff;
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            color: #fff;
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: #e5aab6;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-warning {
            color: #80520d;
            background: #fff2d5;
            border-color: #fff2d5;
        }

        .btn-warning:hover {
            color: #69420a;
            background: #ffe7ad;
            border-color: #ffe7ad;
        }

        .btn-danger {
            color: #fff;
            background: #d94b59;
            border-color: #d94b59;
        }

        .btn-light {
            color: #55464b;
            background: #fff;
            border-color: var(--border-color);
        }

        .btn-sm {
            min-height: 35px;
            padding: 6px 11px;
            font-size: 14px;
        }

        /* Forms */
        .form-label {
            margin-bottom: 8px;
            color: var(--text-dark);
            font-size: 15px;
            font-weight: 650;
        }

        .form-control,
        .form-select {
            min-height: 47px;
            padding: 10px 13px;
            color: var(--text-dark);
            border: 1px solid #e8d6dc;
            border-radius: 9px;
            font-family: inherit;
            font-size: 16px;
        }

        textarea.form-control {
            min-height: 120px;
        }

        .form-control::placeholder {
            color: #aa9ba0;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(200, 62, 89, .12);
        }

        /* Tables */
        .table-responsive {
            width: 100%;
        }

        .table {
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            padding: 16px 17px;
            color: #755e66;
            background: #fff6f8;
            border-bottom: 1px solid var(--border-color);
            font-size: 13px;
            font-weight: 750;
            letter-spacing: .35px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 17px;
            color: #57474d;
            border-color: #f4e9ec;
            font-size: 15px;
        }

        .table tbody tr:hover td {
            background: #fffafb;
        }

        .table .btn-sm {
            min-height: 34px;
        }

        .record-id {
            color: var(--primary);
            font-weight: 750;
        }

        .soft-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            color: var(--primary-dark);
            background: var(--primary-soft);
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
        }

        /* Alerts and pagination */
        .alert {
            border: 0;
            border-radius: 11px;
            font-size: 15px;
        }

        .pagination {
            gap: 5px;
            margin-bottom: 0;
        }

        .page-link {
            color: var(--primary);
            border-color: var(--border-color);
            border-radius: 8px !important;
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* Mobile */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 10px 0 30px rgba(40, 20, 28, .08);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-menu-button {
                display: grid;
                place-items: center;
                flex-shrink: 0;
            }

            .sidebar-overlay.show {
                position: fixed;
                inset: 0;
                z-index: 1035;
                display: block;
                background: rgba(35, 20, 26, .42);
            }

            .topbar {
                padding: 13px 20px;
            }

            .content {
                padding: 25px 20px;
            }
        }

        @media (max-width: 575.98px) {
            .topbar {
                gap: 10px;
                min-height: 70px;
                padding: 12px 15px;
            }

            .topbar-title {
                font-size: 17px;
            }

            .topbar-subtitle {
                font-size: 12px;
            }

            .user-details {
                display: none;
            }

            .content {
                padding: 22px 14px;
            }

            .page-heading h2 {
                font-size: 24px;
            }

            .card-body {
                padding: 18px;
            }

            .stat-card {
                padding: 20px;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<aside class="sidebar" id="sidebar">
    <a href="{{ route('dashboard') }}" class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <div>
            <h5 class="brand-name">Student System</h5>
            <span class="brand-subtitle">MANAGEMENT</span>
        </div>
    </a>

    <div class="menu-label">MAIN MENU</div>

    <a href="{{ route('dashboard') }}"
       class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('students.index') }}"
       class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill"></i>
        <span>Students</span>
    </a>

    <a href="{{ route('departments.index') }}"
       class="sidebar-link {{ request()->routeIs('departments.*') ? 'active' : '' }}">
        <i class="bi bi-building"></i>
        <span>Departments</span>
    </a>

    <div class="sidebar-bottom">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout-button">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<div class="main-wrapper">

    <header class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button
                type="button"
                class="mobile-menu-button"
                id="mobileMenuButton"
                aria-label="Toggle navigation"
                aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>

            <div>
                <h1 class="topbar-title">@yield('page-title', 'Dashboard')</h1>
                <div class="topbar-subtitle">Student Management System</div>
            </div>
        </div>

        <div class="topbar-user">
            <div class="user-avatar">
                <i class="bi bi-person-fill"></i>
            </div>

            <div class="user-details">
                <p class="user-name">{{ auth()->user()->name ?? 'User' }}</p>
                <div class="user-role">Administrator</div>
            </div>
        </div>
    </header>

    <main class="content">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <strong>Please check the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const menuButton = document.getElementById('mobileMenuButton');

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
        menuButton.setAttribute('aria-expanded', 'false');
    }

    menuButton.addEventListener('click', function () {
        const isOpen = sidebar.classList.toggle('show');

        overlay.classList.toggle('show', isOpen);
        menuButton.setAttribute('aria-expanded', String(isOpen));
    });

    overlay.addEventListener('click', closeSidebar);

    window.addEventListener('resize', function () {
        if (window.innerWidth > 991) {
            closeSidebar();
        }
    });
</script>

@stack('scripts')

</body>
</html>
