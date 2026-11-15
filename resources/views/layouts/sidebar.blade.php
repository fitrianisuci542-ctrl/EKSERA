
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">E</div>
        <div class="brand-text">
            <h2>EKSERA</h2>
            <p>Sistem Informasi<br>Ekstrakurikuler Seni dan Budaya</p>
        </div>
    </div>

    <div class="sidebar-divider"></div>

    <div class="sidebar-label">MENU UTAMA</div>

    <nav class="sidebar-menu">

        <a href="{{ url('/dashboard') }}"
           class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <span class="menu-icon">⌂</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/siswa') }}"
           class="sidebar-link {{ request()->is('siswa*') ? 'active' : '' }}">
            <span class="menu-icon">♙</span>
            <span>Data Siswa</span>
        </a>

        <a href="{{ url('/ekskul') }}"
           class="sidebar-link {{ request()->is('ekskul*') ? 'active' : '' }}">
            <span class="menu-icon">✿</span>
            <span>Ekstrakurikuler</span>
        </a>

        <a href="{{ url('/pendaftaran') }}"
           class="sidebar-link {{ request()->is('pendaftaran*') ? 'active' : '' }}">
            <span class="menu-icon">▤</span>
            <span>Pendaftaran</span>
        </a>

        <a href="{{ url('/jadwal') }}"
           class="sidebar-link {{ request()->is('jadwal*') ? 'active' : '' }}">
            <span class="menu-icon">◷</span>
            <span>Jadwal Latihan</span>
        </a>

        <a href="{{ url('/kehadiran') }}"
           class="sidebar-link {{ request()->is('kehadiran*') ? 'active' : '' }}">
            <span class="menu-icon">✓</span>
            <span>Kehadiran</span>
        </a>

    </nav>

    <div class="sidebar-bottom">
        <div class="sidebar-divider"></div>

        <div class="sidebar-label">SISTEM</div>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link logout-link">
                <span class="menu-icon">⇥</span>
                <span>Keluar</span>
            </button>
        </form>

        <div class="sidebar-footer">
            <p>EKSERA © 2026</p>
            <small>Seni • Budaya • Prestasi</small>
        </div>
    </div>
</aside>

<style>
    * {
        box-sizing: border-box;
    }

    .sidebar {
        width: 260px;
        height: 100vh;
        background: #123b5d;
        color: white;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        padding: 25px 18px;
        z-index: 1000;
        overflow-y: auto;
        font-family: Arial, sans-serif;
    }

    .sidebar-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 5px 5px 20px;
    }

    .brand-logo {
        width: 48px;
        height: 48px;
        background: #8fd3ff;
        color: #123b5d;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
        font-weight: bold;
    }

    .brand-text h2 {
        font-size: 21px;
        letter-spacing: 2px;
        margin: 0 0 5px;
    }

    .brand-text p {
        font-size: 10px;
        line-height: 1.5;
        color: #c8e5f7;
        margin: 0;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255,255,255,.16);
        margin: 12px 0 22px;
    }

    .sidebar-label {
        font-size: 10px;
        font-weight: bold;
        letter-spacing: 1.5px;
        color: #9ebdd3;
        padding: 0 12px;
        margin-bottom: 12px;
    }

    .sidebar-menu {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 14px;
        border-radius: 10px;
        text-decoration: none;
        color: #d9e9f5;
        font-size: 14px;
        transition: .2s;
        width: 100%;
        border: none;
        background: transparent;
        cursor: pointer;
        font-family: Arial, sans-serif;
        text-align: left;
    }

    .sidebar-link:hover {
        background: rgba(143,211,255,.15);
        color: white;
    }

    .sidebar-link.active {
        background: #8fd3ff;
        color: #123b5d;
        font-weight: bold;
    }

    .menu-icon {
        width: 22px;
        text-align: center;
        font-size: 20px;
    }

    .sidebar-bottom {
        margin-top: auto;
    }

    .logout-link {
        color: #ffcaca;
    }

    .logout-link:hover {
        background: rgba(255,100,100,.15);
    }

    .sidebar-footer {
        text-align: center;
        margin-top: 25px;
        color: #c8e5f7;
    }

    .sidebar-footer p {
        font-size: 11px;
        margin-bottom: 5px;
    }

    .sidebar-footer small {
        font-size: 10px;
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 220px;
        }
    }
</style>
