<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4fbfd;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #1f1f1f;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            letter-spacing: 1px;
        }

        .header nav {
            display: flex;
            gap: 15px;
        }

        .header nav a {
            color: white;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .header nav a:hover {
            background-color: #3a3a3a;
        }

        main {
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <button class="sidebar-toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
        <i class="fas fa-bars"></i>
    </button>
    <div class="admin-container">
        @if(session('logout_success'))
            <div id="logout-success-alert" class="alert alert-success fade-in" style="max-width:500px;margin:24px auto 0 auto;background:#e6f7ff;color:#0070c9;border-radius:12px;padding:18px 28px;font-size:1.1rem;font-weight:600;box-shadow:0 4px 18px #0070c91a;text-align:center;transition:opacity 0.5s;z-index:999;">
                <i class="fas fa-check-circle" style="margin-right:8px;"></i> {{ session('logout_success') }}
            </div>
            <script>
                setTimeout(function() {
                    var el = document.getElementById('logout-success-alert');
                    if (el) {
                        el.style.opacity = 0;
                        setTimeout(function() { el.style.display = 'none'; }, 500);
                    }
                }, 3000);
            </script>
        @endif
        <!-- Sidebar -->
        <div class="sidebar open" id="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('assets/images/ppsdm-logo.png') }}" alt="Logo Pelindo" style="width:60px; height:auto; margin-bottom:10px; display:block; margin-left:auto; margin-right:auto;">
                <h1 style="
                    font-size: 24px;
                    font-weight: 700;
                    margin-bottom: 5px;
                    color: #fff;
                    text-align: center;
                ">Admin PPSDM </h1>
                <p style="color:#b3e0f7; text-align:center;">Pelindo Management</p>
            </div>
            <nav class="nav-menu">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{ route('admin.berita.index') }}" class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-newspaper"></i> Berita</a>
                <a href="{{ route('admin.pengumuman') }}" class="nav-link {{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                <a href="{{ route('admin.lowongan') }}" class="nav-link {{ request()->routeIs('admin.lowongan') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-briefcase"></i> Tambah Lowongan</a>
                <a href="{{ route('admin.rekomendasi') }}" class="nav-link {{ request()->routeIs('admin.rekomendasi') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-user-graduate"></i> Rekomendasi Magang</a>
                <a href="{{ route('admin.pelamar-diterima.index') }}" class="nav-link {{ request()->routeIs('admin.pelamar-diterima.*') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-user-check"></i> Pelamar Diterima</a>
                <a href="{{ route('admin.tentang') }}" class="nav-link {{ request()->routeIs('admin.tentang') ? 'active' : '' }}" onclick="closeSidebarOnMobile()"><i class="fas fa-info-circle"></i> Tambah Tentang</a>
                <a href="{{ route('actionlogout') }}" class="nav-link" id="logout-link" onclick="closeSidebarOnMobile()"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <div class="content-header fade-in">
                <h1>@yield('title', 'Admin Dashboard')</h1>
                <p>Selamat datang di panel administrasi PPSDM </p>
            </div>
            <div class="content-body fade-in">
                @yield('content')
            </div>
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background: #0070c9;
            color: white;
            box-shadow: 4px 0 15px rgba(0,0,0,0.08);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
            z-index: 2000;
            left: 0;
            top: 0;
        }
        .sidebar.open {
            transform: translateX(0);
        }
        .sidebar:not(.open) {
            transform: translateX(-110%);
        }
        .sidebar-header {
            padding: 30px 20px 10px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: 20px;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 15px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-link.active, .nav-link:hover {
            background: #005fa3;
            color: #fff;
        }
        .nav-link i {
            min-width: 20px;
            text-align: center;
            font-size: 16px;
        }
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 40px 30px 30px 30px;
            background: #fff;
            min-height: 100vh;
            transition: margin-left 0.3s cubic-bezier(.4,2,.6,1);
        }
        .sidebar:not(.open) ~ .main-content {
            margin-left: 0 !important;
        }
        .content-header {
            background: #0070c9;
            color: #fff;
            padding: 28px 32px 18px 32px;
            border-radius: 18px;
            margin-bottom: 30px;
            box-shadow: 0 6px 24px rgba(0,112,201,0.08);
        }
        .content-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .content-header p {
            font-size: 15px;
            opacity: 0.95;
        }
        .content-body {
            background: #fff;
            border-radius: 16px;
            padding: 28px 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border: 1px solid #f0f0f0;
        }
        .mobile-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2100;
            background: #0070c9;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.2s;
            display: none;
        }
        .mobile-toggle:hover {
            background: #005fa3;
        }
        .sidebar-toggle-btn {
            display: block;
            position: fixed;
            top: 18px;
            left: 18px;
            z-index: 3001;
            background: #0070c9;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 22px;
            cursor: pointer;
            box-shadow: 0 2px 8px #0070c91a;
            transition: background 0.2s;
        }
        .sidebar-toggle-btn:hover {
            background: #005fa3;
        }
        @media (max-width: 900px) {
            .main-content {
                margin-left: 0;
                padding: 24px 6px 24px 6px;
            }
            .admin-container {
                flex-direction: column;
            }
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                left: 0;
                top: 0;
                height: 100vh;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 20px 5px 20px 5px;
            }
            .mobile-toggle {
                display: block;
            }
        }
        @media (max-width: 600px) {
            .sidebar-toggle-btn {
                top: 10px;
                left: 10px;
                font-size: 18px;
                padding: 7px 10px;
            }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('open');
        });
    </script>
    <!-- Logout Modal HTML (letakkan di akhir body) -->
    <div id="logoutModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.18);justify-content:center;align-items:center;">
        <div class="custom-logout-modal">
            <div class="custom-logout-title">Apakah Anda yakin ingin keluar?</div>
            <div class="custom-logout-btns">
                <button id="cancelLogoutBtn" class="custom-logout-btn cancel">Cancel</button>
                <button id="confirmLogoutBtn" class="custom-logout-btn yes">Yes</button>
            </div>
        </div>
    </div>
    <style>
    .custom-logout-modal {
        background: linear-gradient(180deg, #0070c9 0%, #005fa3 100%);
        border-radius: 18px;
        box-shadow: 0 4px 24px #0003;
        padding: 36px 32px 28px 32px;
        max-width: 350px;
        width: 90vw;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Arial, sans-serif;
    }
    .custom-logout-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 28px;
        color: #fff;
        font-family: Arial, sans-serif;
    }
    .custom-logout-btns {
        display: flex;
        justify-content: center;
        gap: 28px;
        width: 100%;
    }
    .custom-logout-btn {
        padding: 12px 32px;
        font-size: 1.25rem;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        background: linear-gradient(180deg, #e3f0fa 0%, #b3d8f7 100%);
        color: #0070c9;
        box-shadow: 2px 2px 8px #0002;
        cursor: pointer;
        transition: background 0.2s, box-shadow 0.2s, color 0.2s;
        font-family: Arial, sans-serif;
    }
    .custom-logout-btn.yes {
        background: linear-gradient(180deg, #0070c9 0%, #005fa3 100%);
        color: #fff;
    }
    .custom-logout-btn.cancel {
        background: linear-gradient(180deg, #e3f0fa 0%, #b3d8f7 100%);
        color: #0070c9;
    }
    .custom-logout-btn:hover {
        background: linear-gradient(180deg, #005fa3 0%, #0070c9 100%);
        color: #fff;
        box-shadow: 0 4px 16px #0003;
    }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutLink = document.getElementById('logout-link');
        const modal = document.getElementById('logoutModal');
        const cancelBtn = document.getElementById('cancelLogoutBtn');
        const confirmBtn = document.getElementById('confirmLogoutBtn');
        let logoutHref = logoutLink.getAttribute('href');

        logoutLink.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'flex';
        });
        cancelBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        confirmBtn.addEventListener('click', function() {
            window.location.href = logoutHref;
        });
        // Optional: close modal on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') modal.style.display = 'none';
        });
    });
    </script>
    <script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    function toggleSidebar() {
        sidebar.classList.toggle('open');
        // Atur main-content margin
        const mainContent = document.querySelector('.main-content');
        if (!sidebar.classList.contains('open')) {
            mainContent.style.marginLeft = '0';
        } else {
            mainContent.style.marginLeft = '260px';
        }
    }
    function closeSidebarOnMobile() {
        sidebar.classList.remove('open');
        const mainContent = document.querySelector('.main-content');
        mainContent.style.marginLeft = '0';
    }
    toggleBtn.addEventListener('click', function() {
        toggleSidebar();
    });
    // Optional: close sidebar when clicking outside (mobile)
    document.addEventListener('click', function(e) {
        if(sidebar.classList.contains('open')) {
            if(!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('open');
                const mainContent = document.querySelector('.main-content');
                mainContent.style.marginLeft = '0';
            }
        }
    });
</script>
</body>
</html>
