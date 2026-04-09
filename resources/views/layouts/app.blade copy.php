<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIPANDU - Dashboard' }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --bg-main: #f9fafb;
            --bg-sidebar: #ffffff;
            --bg-white: #ffffff;
            --bg-active: #f3f4f6;
            --bg-active-light: #f7f9fc;
            /* Untuk header tanggal */
            --bg-header: #ffffff;

            --text-primary: #111827;
            --text-secondary: #6B7280;
            --text-muted: #9CA3AF;
            --text-light: #ffffff;

            --border-color: #d1d5db;

            --primary-blue: #4a6fff;
            --primary-blue-light: #e6e9ff;
            --logo-bg: #1f2937;

            --radius-sm: 8px;
            --radius-md: 10px;
            --radius-lg: 12px;

            --shadow-lift: 0 6px 20px rgba(0, 0, 0, 0.08);

            --transition-timing: cubic-bezier(0.4, 0, 0.2, 1);
            --transition-duration: 0.35s;
        }

        body.dark-mode {
            --bg-main: #111827;
            --bg-sidebar: #1f2937;
            --bg-white: #1f2937;
            --bg-active: #374151;
            --bg-active-light: #2c333f;
            /* Darker shade for sticky header */
            --bg-header: #1f2937;

            --text-primary: #f9fafb;
            --text-secondary: #9CA3AF;
            --text-muted: #6B7280;

            --border-color: #374151;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* [PERUBAHAN 1] */
        html {
            overflow: hidden;
            height: 100%;
        }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--bg-main);
            color: var(--text-primary);
            line-height: 1.5;
            /* [PERUBAHAN 2] */
            height: 100%;
            overflow: hidden;
            transition: background-color 0.3s, color 0.3s;
        }

        .zoom-wrapper {
            display: flex;
            transform: scale(0.8);
            transform-origin: top left;
            width: 125vw;
            height: 125vh;
            overflow: hidden;
            background-color: var(--bg-main);
            color: var(--text-primary);
            transition: background-color 0.3s, color 0.3s;
        }

        body.dark-mode .zoom-wrapper {
            background-color: var(--bg-main);
            color: var(--text-primary);
        }

        .card {
            background-color: var(--bg-white);
            border-radius: var(--radius-lg);
            box-shadow: none;
            border: 1px solid var(--border-color);
            padding: 24px;
            transition: background-color 0.3s, border-color 0.3s, transform 0.3s var(--transition-timing), box-shadow 0.3s var(--transition-timing);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lift);
        }

        .section-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
        }

        .see-all-link {
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .sidebar-left {
            width: 260px;
            /* [PERUBAHAN 3] */
            height: 100%;
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            padding: 20px;
            flex-shrink: 0;
            transition: width var(--transition-duration) var(--transition-timing), background-color 0.3s, border-color 0.3s, transform 0.3s var(--transition-timing);
            z-index: 100;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 99;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            padding: 4px 4px 20px 4px;
            overflow: hidden;
        }

        .sidebar-logo .logo-icon {
            width: 36px;
            height: 36px;
            background-color: var(--logo-bg);
            color: var(--text-light);
            display: grid;
            place-items: center;
            border-radius: var(--radius-md);
            margin-right: 12px;
            font-size: 1.1rem;
            flex-shrink: 0;
            transition: margin var(--transition-duration) var(--transition-timing);
        }

        .sidebar-logo .logo-text {
            transition: opacity 0.2s var(--transition-timing), transform 0.2s var(--transition-timing);
            opacity: 1;
            transform: translateX(0);
        }

        .sidebar-logo .logo-text strong {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
        }

        .sidebar-nav {
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-nav ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-nav li {
            margin-bottom: 4px;
            position: relative;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--radius-md);
            transition: background-color 0.2s var(--transition-timing), color 0.2s var(--transition-timing), padding var(--transition-duration) var(--transition-timing);
            white-space: nowrap;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .sidebar-nav a i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            color: var(--text-muted);
            flex-shrink: 0;
            transition: margin var(--transition-duration) var(--transition-timing), color 0.2s var(--transition-timing);
        }

        .sidebar-nav a span {
            transition: opacity 0.2s var(--transition-timing), transform 0.2s var(--transition-timing);
            opacity: 1;
            transform: translateX(0);
        }

        .sidebar-nav a:hover {
            background-color: var(--bg-active);
            color: var(--text-primary);
        }

        .sidebar-nav a:hover i {
            color: var(--primary-blue);
        }

        .sidebar-nav>ul>li>a.active {
            color: var(--text-primary);
            font-weight: 600;
            background-color: var(--bg-active);
            box-shadow: none;
        }

        .sidebar-nav>ul>li>a.active i {
            color: var(--primary-blue);
        }

        /* Perbaikan untuk status aktif Log Aktivitas/Arsip Submenu */
        .sidebar-nav a.active {
            color: var(--text-primary);
            font-weight: 600;
            background-color: var(--bg-active);
        }

        .sidebar-nav a.active i {
            color: var(--primary-blue);
        }


        .submenu-toggle {
            margin-left: auto;
            padding-left: 10px;
            font-size: 0.7rem;
            transition: opacity 0.2s var(--transition-timing);
            opacity: 1;
            align-self: center;
        }

        .submenu {
            list-style: none;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
            margin: 4px 0 4px 24px; /* Geser agar sejajar dengan garis ikon */
            padding-left: 0;
            border-left: 1px solid var(--border-color); /* Garis bantu vertikal */
        }

        .submenu.open {
            max-height: 300px;
        }

        .submenu a {
            padding-left: 16px; /* Jarak teks dari garis vertikal */
            font-size: 0.9rem;
            padding-top: 8px;
            padding-bottom: 8px;
            color: var(--text-secondary);
            border-radius: 0 8px 8px 0; /* Radius hanya di sisi kanan */
        }

        .submenu a.active {
            font-weight: 600;
            color: var(--primary-blue);
            background-color: var(--bg-active-light);
        }

        .submenu a.active i {
            color: var(--primary-blue);
        }


        .submenu a:hover {
            color: var(--text-primary);
            background-color: var(--bg-active);
        }

        .nav-heading {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap;
            transition: opacity 0.2s var(--transition-timing), height var(--transition-duration) ease-out, padding var(--transition-duration) ease-out, margin var(--transition-duration) ease-out;
            opacity: 0;
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        /* ⭐️ KODE UNTUK MENAMPILKAN HEADER NAVIGASI ⭐️ */
        body:not(.sidebar-collapsed) .nav-heading {
            opacity: 1;
            height: auto;
            padding: 16px 14px 8px;
            /* Nilai padding asli */
            margin-top: 8px;
        }

        /* ⭐️ AKHIR KODE UNTUK MENAMPILKAN HEADER NAVIGASI ⭐️ */


        .main-content {
            flex: 1;
            height: 100%;
            overflow-y: auto;
            padding: 8px 40px 32px 40px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            position: relative;
            z-index: 1;
        }

        .content-header {
            display: flex;
            justify-content: flex-start;
            align-items: center !important;
            gap: 16px;
            padding: 10px 0 20px 0 !important; /* Memberi ruang lebih di bawah garis */
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
            transition: border-color 0.3s;
            margin-bottom: 12px; /* Jarak ke konten dashboard di bawahnya */
            min-height: auto; /* Biarkan konten yang menentukan tinggi */
        }

        .sidebar-toggle-btn {
            padding: 12px;
            line-height: 1;
            font-size: 1.1rem;
            background-color: var(--bg-white);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.2s var(--transition-timing);
        }

        .sidebar-toggle-btn:hover {
            background-color: var(--bg-active);
            color: var(--text-primary);
            box-shadow: var(--shadow-lift);
            transform: scale(1.05);
        }

        .breadcrumbs {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-right: auto;
        }

        .breadcrumb-item {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-decoration: none;
            white-space: nowrap;
        }

        .breadcrumb-item:not(.active):hover {
            color: var(--text-primary);
        }

        .breadcrumb-item.active {
            color: var(--text-primary);
        }

        .breadcrumb-separator {
            font-size: 0.9rem;
            color: var(--text-muted);
            transition: color 0.3s;
        }

        body.dark-mode .breadcrumb-separator {
            color: #7B8797;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .login-btn {
            padding: 12px;
            line-height: 1;
            font-size: 1.1rem;
            background-color: var(--bg-white);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.2s var(--transition-timing);
        }

        .login-btn:hover {
            background-color: var(--bg-active);
            color: var(--text-primary);
            box-shadow: var(--shadow-lift);
            transform: scale(1.05);
        }

        .notification-btn-container,
        .profile-menu-container {
            position: relative;
        }

        .notification-btn {
            padding: 12px;
            line-height: 1;
            font-size: 1.1rem;
            background-color: var(--bg-white);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.2s var(--transition-timing);
            position: relative;
        }

        .notification-btn:hover {
            background-color: var(--bg-active);
            color: var(--text-primary);
            box-shadow: var(--shadow-lift);
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 10px;
            height: 10px;
            background-color: #ff5c5c;
            border-radius: 50%;
            border: 2px solid var(--bg-white);
        }

        .notification-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 340px;
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 100;
            padding: 0;
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            transition: opacity 0.2s ease-out, transform 0.2s ease-out;
        }

        .notification-dropdown.open {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .notification-header {
            padding: 16px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header strong {
            font-size: 1rem;
            color: var(--text-primary);
        }

        .notification-header .see-all-link {
            font-size: 0.875rem;
        }

        .notification-list {
            list-style: none;
            padding: 8px;
            max-height: 300px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            border-radius: var(--radius-md);
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .notification-item:hover {
            background-color: var(--bg-active);
        }

        .notification-item .icon-box {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            display: grid;
            place-items: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .notification-item .text-content strong {
            display: block;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .notification-item .text-content span {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        body.dark-mode .sidebar-toggle-btn,
        body.dark-mode .login-btn,
        body.dark-mode .notification-btn {
            border-color: #4B5563;
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 280px;
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            z-index: 100;
            padding: 8px;
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            transition: opacity 0.2s ease-out, transform 0.2s ease-out;
        }

        .profile-dropdown.open {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .profile-dropdown .user-info {
            padding: 12px;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 8px;
        }

        .profile-dropdown .user-info strong {
            display: block;
            font-size: 0.95rem;
            color: var(--text-primary);
        }

        .profile-dropdown .user-info span {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .profile-dropdown .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            color: var(--text-primary);
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }

        .profile-dropdown .dropdown-item i {
            color: var(--text-muted);
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .profile-dropdown .dropdown-item:hover {
            background-color: var(--bg-active);
        }

        .profile-dropdown .dropdown-item .icon-sun {
            display: none;
        }

        body.dark-mode .profile-dropdown .dropdown-item .icon-sun {
            display: inline-block;
        }

        body.dark-mode .profile-dropdown .dropdown-item .icon-moon {
            display: none;
        }

        .stats-grid-4 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        /* [PERBAIKAN 1] TAMBAHKAN DEFINISI CSS UNTUK GRID 3 KOLOM */
        .stats-grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        /* [AKHIR PERBAIKAN 1] */

        .stat-card {
            background-color: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.3s var(--transition-timing);
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lift);
            border-color: var(--primary-blue);
        }

        .stat-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .stat-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-md);
            display: grid;
            place-items: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .stat-label {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-secondary);
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-primary);
            display: block;
        }

        .stat-footer {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .activity-chart-container {
            width: 100%;
            display: flex;
            gap: 1.5%;
            height: 150px;
            align-items: flex-end;
            padding-top: 20px;
        }

        .activity-chart-item {
            flex: 1;
            text-align: center;
        }

        .chart-bar {
            background-color: var(--bg-active);
            border-radius: 6px;
            transition: all 0.3s var(--transition-timing);
        }

        .chart-bar:hover {
            background-color: var(--primary-blue-light);
            transform: translateY(-5px);
        }

        .chart-bar.active {
            background-color: var(--primary-blue);
            box-shadow: 0 4px 10px rgba(74, 111, 255, 0.4);
        }

        .chart-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-top: 8px;
        }

        .arsip-list-container {
            padding-bottom: 8px;
        }

        .arsip-list-item {
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            padding: 14px 10px;
            margin: 0 -10px;
            border-radius: var(--radius-md);
            border-bottom: 1px solid var(--border-color);
            transition: all 0.3s var(--transition-timing);
        }

        .arsip-list-item:first-of-type {
            padding-top: 10px;
        }

        .arsip-list-item:last-of-type {
            border-bottom: none;
            padding-bottom: 10px;
        }

        .arsip-list-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lift);
            background-color: var(--bg-white);
            border-color: var(--primary-blue);
        }

        .arsip-list-item .icon-box {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: grid;
            place-items: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .arsip-list-item .text-content {
            flex-grow: 1;
        }

        .arsip-list-item .text-content strong {
            display: block;
            color: var(--text-primary);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .arsip-list-item .text-content span {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .arsip-list-item .action-icon {
            color: var(--text-muted);
            font-size: 0.8rem;
        }

        .arsip-list-item:hover .text-content strong {
            color: var(--primary-blue);
        }

        .akses-cepat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .akses-cepat-item {
            background-color: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            transition: all 0.3s var(--transition-timing);
        }

        .akses-cepat-item:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lift);
            border-color: var(--primary-blue);
        }

        .akses-cepat-item .icon-box {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            display: grid;
            place-items: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .akses-cepat-item:nth-child(1) .icon-box {
            background-color: #fff0d6;
            color: #ffab2d;
        }

        .akses-cepat-item:nth-child(2) .icon-box {
            background-color: #e6e9ff;
            color: #4a6fff;
        }

        .akses-cepat-item:nth-child(3) .icon-box {
            background-color: #dfffee;
            color: #36c38e;
        }

        .akses-cepat-item .text-content strong {
            display: block;
            color: var(--text-primary);
            font-size: 0.95rem;
            font-weight: 500;
        }

        .activity-log-list {
            padding-top: 8px;
        }

        .activity-log-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 4px;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-log-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-log-item:first-child {
            padding-top: 0;
        }

        .activity-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--bg-active);
            color: var(--text-secondary);
            display: grid;
            place-items: center;
            font-size: 1rem;
            font-weight: 500;
            flex-shrink: 0;
        }

        .activity-text {
            flex-grow: 1;
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .activity-text strong {
            color: var(--text-primary);
            font-weight: 500;
        }

        .activity-time {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-left: auto;
            flex-shrink: 0;
            padding-top: 2px;
        }

        .main-footer {
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.875rem;
            padding-top: 24px;
            margin-top: auto;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated-card {
            opacity: 0;
            animation: fadeInUp 0.5s ease-out forwards;
        }

        /* [PERUBAHAN 4] Tambahkan CSS untuk label arsip */
        .arsip-list-item .arsip-type-badge {
            margin-left: auto;
            padding: 4px 10px;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: var(--radius-sm);
            background-color: var(--bg-active);
            color: var(--text-secondary);
            white-space: nowrap;
        }

        body.dark-mode .arsip-list-item .arsip-type-badge {
            background-color: #374151;
            color: #9CA3AF;
        }

        /* [AKHIR PERUBAHAN 4] */


        /* Sidebar collapse styles */
        body.sidebar-collapsed .sidebar-left {
            width: 80px;
        }

        body.sidebar-collapsed .sidebar-logo {
            padding-bottom: 16px;
        }

        body.sidebar-collapsed .sidebar-logo .logo-icon {
            margin-right: 0;
        }

        body.sidebar-collapsed .sidebar-logo .logo-text {
            opacity: 0;
            transform: translateX(-10px);
        }

        /* --- FORCE CENTER SIDEBAR ICON --- */
        body.sidebar-collapsed .sidebar-nav a {
            justify-content: center !important; /* Paksa ke tengah */
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        
        body.sidebar-collapsed .sidebar-nav a i:first-child {
            margin-right: 0 !important; /* Buang margin ikon utama */
            font-size: 1.3rem; /* Sedikit perbesar agar proporsional di box */
        }
        
        /* Hilangkan paksa span dan panah submenu agar tidak mengganggu centering */
        body.sidebar-collapsed .sidebar-nav a span, 
        body.sidebar-collapsed .submenu-toggle {
            display: none !important;
        }
        
        /* Rapikan padding sidebar-left saat collapse agar tidak jomplang */
        body.sidebar-collapsed .sidebar-left {
            padding: 20px 10px !important; /* Kecilkan padding samping */
        }



        /* --- FIX TOTAL IKON LOGO (PERISAI) --- */
        body.sidebar-collapsed .sidebar-logo {
            justify-content: center !important; /* Paksa konten logo ke tengah */
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-left: 0 !important;
        }

        body.sidebar-collapsed .sidebar-logo .logo-icon {
            margin-right: 0 !important; /* Buang sisa margin kanan */
        }

        /* --- FIX TOTAL HEADER BAR (NAIK KE ATAS) --- */
        .main-content {
            padding-top: 5px !important; /* Tarik konten utama ke atas layar */
        }

        .content-header {
            min-height: 0 !important; /* BUANG PAKSAAN 85px yang bikin turun */
            padding-top: 10px !important; /* Tipiskan jarak atas */
            padding-bottom: 10px !important; /* Tipiskan jarak bawah */
            margin-bottom: 5px !important;
            align-items: center !important;
        }

        /* Pastikan judul "Dashboard" tidak punya margin atas tambahan */
        .welcome-title-group h1 {
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1 !important;
        }


        
        
        body.sidebar-collapsed .sidebar-nav a {
            justify-content: center !important;
            padding-top: 12px;
            padding-bottom: 12px;
            padding-left: 0 !important;
            padding-right: 0 !important;
            align-items: center;
            height: auto;
            width: 100%;
        }

        body.sidebar-collapsed .sidebar-nav a i {
            margin-right: 0 !important;
            margin-left: 0 !important;
            display: block;
            width: auto;
        }

        body.sidebar-collapsed .sidebar-nav a span {
            opacity: 0;
            transform: translateX(-10px);
            width: 0;
            overflow: hidden;
        }

        .nav-heading {
            opacity: 0;
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }

        /* ⭐️ KODE UNTUK MENAMPILKAN HEADER NAVIGASI ⭐️ */
        body:not(.sidebar-collapsed) .nav-heading {
            opacity: 1;
            height: auto;
            padding: 16px 14px 8px;
            /* Nilai padding asli */
            margin-top: 8px;
        }

        /* ⭐️ AKHIR KODE UNTUK MENAMPILKAN HEADER NAVIGASI ⭐️ */


        body.sidebar-collapsed .submenu-toggle {
            opacity: 0;
            width: 0;
            padding: 0;
        }

        body.sidebar-collapsed .submenu {
            max-height: 0 !important;
            margin: 0;
            overflow: hidden;
        }

        @media (max-width: 992px) {
            .main-content-grid {
                grid-template-columns: 1fr;
            }

            .sticky-column {
                position: static;
            }

            .welcome-title-group h1 {
                font-size: 1.6rem; /* Sedikit diperbesar agar lebih tegas */
                font-weight: 700;
                color: var(--text-primary);
                margin: 0;
                letter-spacing: -0.5px;
            }

            .content-header {
                min-height: auto;
            }

            .sidebar-left {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                width: 280px;
                border-right: 1px solid var(--border-color);
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                transform: translateX(-100%);
                transition: transform 0.3s var(--transition-timing);
            }

            .sidebar-toggle-btn {
                display: block;
            }

            .main-content {
                padding: 32px 24px;
            }

            body.sidebar-mobile-open .sidebar-left {
                transform: translateX(0);
            }

            body.sidebar-mobile-open .sidebar-overlay {
                opacity: 1;
                pointer-events: auto;
            }
        }

        @media (max-width: 600px) {
            .main-content {
                padding: 24px 16px;
            }

            .content-header {
                flex-wrap: wrap;
                gap: 12px;
            }

            .header-right {
                width: 100%;
                gap: 12px;
            }

            .profile-dropdown,
            .notification-dropdown {
                width: 280px;
            }

            .stats-grid-4,
            .stats-grid-3,
            /* [PERBAIKAN 2] Tambahkan grid 3 di media query */
            .akses-cepat-grid {
                grid-template-columns: 1fr;
            }
        }

        /* --- KOREKSI GAYA TABEL (GLOBAL) UNTUK GARIS VERTIKAL/HORIZONTAL --- */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        /* ⭐️ GARIS VERTIKAL (PEMBATAS KOLOM) ⭐️ */
        .data-table th,
        .data-table td {
            border-right: 1px solid var(--border-color);
            padding: 12px;
            vertical-align: middle;
        }

        /* Hilangkan garis vertikal pada kolom terakhir */
        .data-table th:last-child,
        .data-table td:last-child {
            border-right: none !important;
        }

        /* ⭐️ GARIS HORIZONTAL (PEMBATAS BARIS DATA) ⭐️ */
        .data-table thead tr th {
            border-bottom: 1px solid var(--border-color);
        }

        .data-table tbody tr:not(.date-header-row) td {
            border-bottom: 1px solid var(--border-color);
        }

        .data-table tbody tr:not(.date-header-row):last-child td {
            border-bottom: none;
        }

        /* Penyesuaian padding dan warna untuk header tanggal */
        .date-header-row td {
            background-color: var(--bg-active-light);
            color: var(--text-primary);
            font-weight: 700;
            padding-top: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color) !important;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        /* Dark Mode adjustments for table borders */
        body.dark-mode .data-table th,
        body.dark-mode .data-table td,
        body.dark-mode .data-table thead tr th,
        body.dark-mode .data-table tbody tr:not(.date-header-row) td,
        body.dark-mode .date-header-row td {
            border-color: #4b5563 !important;
        }

        body.dark-mode .date-header-row td {
            background-color: #2c333f;
        }


        .btn {
            padding: 10px 16px;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: #3a5fe6;
            box-shadow: var(--shadow-lift);
        }

        .btn-secondary {
            background-color: var(--bg-active);
            color: var(--text-primary);
        }

        .btn-secondary:hover {
            background-color: var(--border-color);
        }

        .btn-danger {
            background-color: #ff5c5c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #e04a4a;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            background-color: var(--bg-white);
            color: var(--text-primary);
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px var(--primary-blue-light);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .alert {
            padding: 12px 16px;
            border-radius: var(--radius-md);
            margin-bottom: 16px;
        }

        .alert-success {
            background-color: #dfffee;
            color: #36c38e;
            border: 1px solid #36c38e;
        }

        .alert-error {
            background-color: #ffe6e6;
            color: #ff5c5c;
            border: 1px solid #ff5c5c;
        }

        .content-header {
            align-items: center !important;
            padding-top: 20px !important;
            padding-bottom: 20px !important;
            min-height: 85px;
        }

        .welcome-title-group {
            flex-grow: 1;
        }

        .welcome-title-group h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            line-height: 1.2;
        }

        .welcome-title-group .breadcrumb-item {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-secondary);
            margin-top: 4px;
        }

        .main-content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
            margin-top: 24px;
            align-items: flex-start;
        }

        .sticky-column {
            position: sticky;
            top: 24px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .stat-card.border-blue {
            border-left: 4px solid var(--primary-blue);
        }

        .stat-card.border-green {
            border-left: 4px solid #36c38e;
        }

        .stat-card.border-yellow {
            border-left: 4px solid #ff9f00;
        }

        .stat-card.border-red {
            border-left: 4px solid #f94b4b;
        }

        @media (max-width: 992px) {
            .main-content-grid {
                grid-template-columns: 1fr;
            }

            .sticky-column {
                position: static;
            }

            .welcome-title-group h1 {
                font-size: 1.25rem;
            }

            .content-header {
                min-height: auto;
            }
        }

        .status-badge.status-warning {
            background-color: #fff0d6;
            /* Oranye muda */
            color: #ffab2d;
            /* Oranye */
        }

        .status-badge.status-warning::before {
            background-color: #ffab2d;
        }

        body.dark-mode .status-badge.status-warning {
            background-color: #4d3200;
            color: #ffc459;
        }

        body.dark-mode .status-badge.status-warning::before {
            background-color: #ffc459;
        }

        .status-badge.status-danger {
            background-color: #ffe6e6;
            /* Merah muda */
            color: #ff5c5c;
            /* Merah */
        }

        .status-badge.status-danger::before {
            background-color: #ff5c5c;
        }

        body.dark-mode .status-badge.status-danger {
            background-color: #4d0000;
            color: #ff8080;
        }

        body.dark-mode .status-badge.status-danger::before {
            background-color: #ff8080;
        }

        /* [BARU] CSS untuk loading progress bar */
        #page-progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background-color: var(--primary-blue);
            width: 0%;
            z-index: 9999;
            transition: width 0.2s ease-out;
            opacity: 0;
        }
    </style>

    @livewireStyles

    @stack('styles')
</head>

<body class="">

    <div class="zoom-wrapper">

        <div id="page-progress-bar"></div>

        @auth
        @php
        // [PERBAIKAN] Gunakan str_replace untuk mengubah 'umum_kepegawaian' menjadi 'umum-kepegawaian' (kebab case)
        $userRole = Auth::user()->role;
        $dashboardRouteName = 'dashboard.' . str_replace('_', '-', $userRole);

        $isSidebarVisible = (
        $userRole === 'super_admin' ||
        $userRole === 'sekretariat' ||
        in_array($userRole, ['umum_kepegawaian', 'keuangan', 'penyusunan_program', 'pemerintahan', 'pembangunan_ekonomi', 'kemasyarakatan', 'sarana_prasarana'])
        );
        @endphp
        @else
        @php
        $isSidebarVisible = false;
        $dashboardRouteName = 'login'; // Fallback
        @endphp
        @endauth


        @if($isSidebarVisible)
        <aside class="sidebar-left">
            <div class="sidebar-logo">
                <div class="logo-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="logo-text">
                    <strong>SIPANDU</strong>
                </div>
            </div>

            <nav class="sidebar-nav">
                @php
                // [UPDATE] Cek apakah arsip berstatus 'Permanen' ATAU 'Musnah'
                // Variabel $arsip didapat dari View (Detail Arsip)
                $isArsipPenyusutan = (isset($arsip) && in_array($arsip->status_akhir, ['Permanen', 'Musnah']));

                // Prioritaskan request('filterBidang') agar Sidebar langsung berubah sesuai URL
                $activeBidang = request('filterBidang') ?? Session::get('current_bidang') ?? Auth::user()->role;

                // Helper Variables
                $isLogActive = request()->is('*log-aktivitas*');

                // [UPDATE] Logic Arsip Aktif:
                // Hanya bernilai TRUE jika route-nya 'arsip.*' DAN BUKAN bagian dari penyusutan (Musnah/Permanen).
                // Ini mencegah menu Bidang (Pemerintahan dll) menyala saat buka arsip Musnah/Permanen.
                $isArsipSpecificActive = request()->routeIs('arsip.*') && !$isArsipPenyusutan;

                // Daftar Dashboard selain home
                $bidangRoutes = [
                'dashboard.umum-kepegawaian', 'dashboard.keuangan', 'dashboard.penyusunan-program',
                'dashboard.pemerintahan', 'dashboard.pembangunan-ekonomi', 'dashboard.kemasyarakatan',
                'dashboard.sarana-prasarana'
                ];

                // Daftar bidang yang memiliki menu log sendiri
                $bidangWithMenu = [
                'umum_kepegawaian', 'keuangan', 'penyusunan_program',
                'pemerintahan', 'pembangunan_ekonomi', 'kemasyarakatan', 'sarana_prasarana'
                ];

                $isBidangLogActive = ($isLogActive && in_array($activeBidang, $bidangWithMenu));

                // Logika Home Active
                $isHomeActive = (
                request()->routeIs($dashboardRouteName) ||
                ($isLogActive && !$isBidangLogActive)
                ) &&
                !$isArsipSpecificActive &&
                !$isArsipPenyusutan && // [UPDATE] Home tidak aktif jika sedang buka Penyusutan
                !in_array(request()->route()->getName(), $bidangRoutes);
                @endphp

                {{-- MENU HOME --}}
                <ul>
                    <li>
                        <a href="{{ route($dashboardRouteName) }}" class="{{ $isHomeActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-house"></i> <span>Home</span>
                        </a>
                    </li>
                </ul>

                {{-- HEADER ARSIP --}}
                <h6 class="nav-heading">ARSIP</h6>

                {{-- LOGIKA UTAMA SIDEBAR --}}
                @if(Auth::user()->role === 'super_admin' || Auth::user()->role === 'sekretariat')
                <ul>
                    {{-- 🟢 KONDISI 1: SUPER ADMIN (TAMPIL DROPDOWN) 🟢 --}}
                    @if(Auth::user()->role === 'super_admin')
                    <li class="has-submenu">
                        @php
                        $sekretariatGroup = ['umum_kepegawaian', 'keuangan', 'penyusunan_program', 'sekretariat'];

                        // Induk aktif
                        $isSekretariatActive = (
                        (request()->routeIs('dashboard.umum-kepegawaian') || request()->routeIs('dashboard.keuangan') || request()->routeIs('dashboard.penyusunan-program')) ||
                        (($isArsipSpecificActive || $isLogActive) && in_array($activeBidang, $sekretariatGroup))
                        );

                        // Anak aktif
                        $isUmumLinkActive = (request()->routeIs('dashboard.umum-kepegawaian') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'umum_kepegawaian'));
                        $isKeuanganLinkActive = (request()->routeIs('dashboard.keuangan') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'keuangan'));
                        $isProgramLinkActive = (request()->routeIs('dashboard.penyusunan-program') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'penyusunan_program'));
                        @endphp

                        <a href="#" class="{{ $isSekretariatActive ? 'active' : '' }}">
                            <i class="bi bi-building"></i>
                            <span>Sekretariat</span>
                            <i class="bi bi-chevron-down submenu-toggle"></i>
                        </a>

                        <ul class="submenu {{ $isSekretariatActive ? 'open' : '' }}">
                            <li><a href="{{ route('dashboard.umum-kepegawaian') }}" class="{{ $isUmumLinkActive ? 'active' : '' }}" wire:navigate>Sub. Umum & Kepeg.</a></li>
                            <li><a href="{{ route('dashboard.keuangan') }}" class="{{ $isKeuanganLinkActive ? 'active' : '' }}" wire:navigate>Sub. Keuangan</a></li>
                            <li><a href="{{ route('dashboard.penyusunan-program') }}" class="{{ $isProgramLinkActive ? 'active' : '' }}" wire:navigate>Sub. Program</a></li>
                        </ul>
                    </li>

                    {{-- 🟢 KONDISI 2: AKUN SEKRETARIAT (TAMPIL FLAT) 🟢 --}}
                    @elseif(Auth::user()->role === 'sekretariat')
                    @php
                    $isUmumActive = request()->routeIs('dashboard.umum-kepegawaian') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'umum_kepegawaian');
                    $isKeuanganActive = request()->routeIs('dashboard.keuangan') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'keuangan');
                    $isProgramActive = request()->routeIs('dashboard.penyusunan-program') || (($isLogActive || $isArsipSpecificActive) && $activeBidang === 'penyusunan_program');
                    @endphp

                    <li>
                        <a href="{{ route('dashboard.umum-kepegawaian') }}" class="{{ $isUmumActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-people"></i> <span>Sub. Umum & Kepeg.</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.keuangan') }}" class="{{ $isKeuanganActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-cash-coin"></i> <span>Sub. Keuangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.penyusunan-program') }}" class="{{ $isProgramActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-list-check"></i> <span>Sub. Program</span>
                        </a>
                    </li>
                    @endif

                    {{-- 🟢 MENU LAINNYA (HANYA UNTUK SUPER ADMIN) 🟢 --}}
                    @if(Auth::user()->role === 'super_admin')
                    <li>
                        @php $isPemerintahanActive = (request()->routeIs('dashboard.pemerintahan') || (($isArsipSpecificActive || $isLogActive) && $activeBidang == 'pemerintahan')); @endphp
                        <a href="{{ route('dashboard.pemerintahan') }}" class="{{ $isPemerintahanActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-bank"></i><span>Pemerintahan</span>
                        </a>
                    </li>
                    <li>
                        @php $isPembangunanActive = (request()->routeIs('dashboard.pembangunan-ekonomi') || (($isArsipSpecificActive || $isLogActive) && $activeBidang == 'pembangunan_ekonomi')); @endphp
                        <a href="{{ route('dashboard.pembangunan-ekonomi') }}" class="{{ $isPembangunanActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-graph-up-arrow"></i><span>Pembangunan</span>
                        </a>
                    </li>
                    <li>
                        @php $isKemasyarakatanActive = (request()->routeIs('dashboard.kemasyarakatan') || (($isArsipSpecificActive || $isLogActive) && $activeBidang == 'kemasyarakatan')); @endphp
                        <a href="{{ route('dashboard.kemasyarakatan') }}" class="{{ $isKemasyarakatanActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-people"></i><span>Kemasyarakatan</span>
                        </a>
                    </li>
                    <li>
                        @php $isSaranaActive = (request()->routeIs('dashboard.sarana-prasarana') || (($isArsipSpecificActive || $isLogActive) && $activeBidang == 'sarana_prasarana')); @endphp
                        <a href="{{ route('dashboard.sarana-prasarana') }}" class="{{ $isSaranaActive ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-signpost-split"></i><span>Sarana & Prasarana</span>
                        </a>
                    </li>
                    @endif
                </ul>

                {{-- 🟢 KONDISI 3: ROLE LAINNYA (Dashboard Unit Kerja) 🟢 --}}
                @elseif(in_array(Auth::user()->role, ['umum_kepegawaian', 'keuangan', 'penyusunan_program', 'pemerintahan', 'pembangunan_ekonomi', 'kemasyarakatan', 'sarana_prasarana']))
                <ul>
                    <li><a href="{{ route('arsip.aktif.index') }}" class="{{ request()->routeIs('arsip.aktif.*') ? 'active' : '' }}" wire:navigate><i class="bi bi-file-earmark-check"></i> <span>Arsip Aktif</span></a></li>
                    <li><a href="{{ route('arsip.inaktif.index') }}" class="{{ request()->routeIs('arsip.inaktif.*') ? 'active' : '' }}" wire:navigate><i class="bi bi-file-earmark-zip"></i> <span>Arsip Inaktif</span></a></li>
                    <li><a href="{{ route('arsip.vital.index') }}" class="{{ request()->routeIs('arsip.vital.*') ? 'active' : '' }}" wire:navigate><i class="bi bi-file-earmark-lock"></i> <span>Arsip Vital</span></a></li>
                </ul>
                @endif

                {{-- HEADER MANAJEMEN --}}
                <h6 class="nav-heading">MANAJEMEN</h6>
                <ul>
                    <li>
                        {{-- [UPDATE] Ganti $isArsipPermanen menjadi $isArsipPenyusutan --}}
                        <a href="{{ route('penyusutan.index') }}"
                            class="{{ request()->routeIs('penyusutan.*') || $isArsipPenyusutan ? 'active' : '' }}"
                            wire:navigate>
                            <i class="bi bi-box-arrow-in-down-right"></i> <span>Penyusutan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('recycle-bin.index') }}" class="{{ request()->routeIs('recycle-bin.*') ? 'active' : '' }}" wire:navigate>
                            <i class="bi bi-trash"></i> <span>Recycle Bin</span>
                        </a>
                    </li>
                </ul>
            </nav>
            {{-- [AKHIR BLOK NAVIGASI] --}}

        </aside>
        @endif


        @if($isSidebarVisible)
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        @endif

        <main class="main-content">
            <header class="content-header">

                @if($isSidebarVisible)
                <button class="sidebar-toggle-btn" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                @endif

                <nav class="breadcrumbs">
                    @if (isset($header))
                    {{-- Bagian ini akan dipakai oleh halaman Livewire --}}
                    {{ $header }}
                    @else
                    {{-- Bagian ini adalah kode LAMA Anda, untuk halaman non-Livewire --}}
                    <div class="welcome-title-group">
                        <h1>{{ $title ?? 'Dashboard' }}</h1>
                        @hasSection('breadcrumbs')
                        @yield('breadcrumbs')
                        @else
                        <span class="breadcrumb-item active">Selamat datang di dashboard SIPANDU</span>
                        @endif
                    </div>
                    @endif
                </nav>

                <div class="header-right">
                    <div class="notification-btn-container">
                        <button class="notification-btn" id="notificationToggle">
                            <i class="bi bi-bell"></i>
                            @if(isset($unreadNotifications) && $unreadNotifications > 0)
                            <span class="notification-badge"></span>
                            @endif
                        </button>

                        <div class="notification-dropdown" id="notificationDropdown">
                            <div class="notification-header">
                                <strong>Notifikasi</strong>
                                <a href="#" class="see-all-link">Tandai terbaca</a>
                            </div>
                            <ul class="notification-list">
                                @if(isset($notifications) && count($notifications) > 0)
                                @foreach($notifications as $notif)
                                <li>
                                    <a href="#" class="notification-item">
                                        <div class="icon-box" style="background-color: {{ $notif['color'] }}; color: {{ $notif['icon_color'] }};"><i class="bi bi-{{ $notif['icon'] }}"></i></div>
                                        <div class="text-content">
                                            <strong>{{ $notif['title'] }}</strong>
                                            <span>{{ $notif['description'] }}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                <li style="padding: 20px; text-align: center; color: var(--text-muted);">
                                    Tidak ada notifikasi baru
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="profile-menu-container">
                        <button class="login-btn" id="profileToggle">
                            <i class="bi bi-person"></i>
                        </button>

                        <div class="profile-dropdown" id="profileDropdown">
                            <div class="user-info">
                                <strong>{{ Auth::user()->name }}</strong>
                                <span>{{ Auth::user()->email }}</span>
                            </div>
                            <button class="dropdown-item" id="darkModeToggle">
                                <i class="bi bi-moon-fill icon-moon"></i>
                                <i class="bi bi-sun-fill icon-sun"></i>
                                <span>Mode Tampilan</span>
                            </button>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Log out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{ $slot }}
        </main>

        <script>
            // // Script ini diletakkan di luar karena event-nya independen
            const progressBar = document.getElementById('page-progress-bar');

            document.addEventListener('livewire:navigate:start', () => {
                progressBar.style.opacity = '1';
                progressBar.style.width = '70%'; // Mulai dengan 70%
            });

            document.addEventListener('livewire:navigate:end', () => {
                progressBar.style.width = '100%'; // Selesaikan
                setTimeout(() => {
                    progressBar.style.opacity = '0'; // Sembunyikan
                    progressBar.style.width = '0%'; // Reset
                }, 300); // Tunda sedikit agar transisi terlihat
            });


            // // Ini memastikan semua skrip Anda di-inisialisasi ulang setiap kali pindah halaman
            document.addEventListener("livewire:navigated", function() {
                function closeAllSubmenus(exceptThisOne = null) {
                    document.querySelectorAll(".submenu.open").forEach(function(submenu) {
                        if (submenu !== exceptThisOne) {
                            submenu.classList.remove("open");
                            let icon = submenu.previousElementSibling.querySelector(".submenu-toggle");
                            if (icon) {
                                icon.classList.remove("bi-chevron-up");
                                icon.classList.add("bi-chevron-down");
                            }
                        }
                    });
                }

                document.querySelectorAll(".has-submenu > a").forEach(function(link) {
                    link.addEventListener("click", function(e) {
                        e.preventDefault();
                        if (document.body.classList.contains("sidebar-collapsed")) return;

                        let currentSubmenu = this.nextElementSibling;
                        closeAllSubmenus(currentSubmenu);
                        const submenu = this.nextElementSibling;
                        submenu.classList.toggle("open");
                        const icon = this.querySelector(".submenu-toggle");
                        if (icon) {
                            if (submenu.classList.contains("open")) {
                                icon.classList.remove("bi-chevron-down");
                                icon.classList.add("bi-chevron-up");
                            } else {
                                icon.classList.remove("bi-chevron-up");
                                icon.classList.add("bi-chevron-down");
                            }
                        }
                    });
                });

                const sidebarToggle = document.getElementById("sidebarToggle");
                const sidebarOverlay = document.getElementById("sidebarOverlay");

                if (sidebarToggle) {
                    sidebarToggle.addEventListener("click", function() {
                        if (window.innerWidth <= 992) {
                            document.body.classList.add("sidebar-mobile-open");
                        } else {
                            document.body.classList.toggle("sidebar-collapsed");
                            if (document.body.classList.contains("sidebar-collapsed")) {
                                closeAllSubmenus();
                            }
                        }
                    });
                }

                if (sidebarOverlay) {
                    sidebarOverlay.addEventListener("click", function() {
                        document.body.classList.remove("sidebar-mobile-open");
                    });
                }

                if (window.innerWidth <= 992) {
                    document.body.classList.remove("sidebar-mobile-open");
                }

                const profileToggle = document.getElementById("profileToggle");
                const profileDropdown = document.getElementById("profileDropdown");
                const notificationToggle = document.getElementById("notificationToggle");
                const notificationDropdown = document.getElementById("notificationDropdown");

                if (profileToggle) {
                    profileToggle.addEventListener("click", function(e) {
                        e.stopPropagation();
                        profileDropdown.classList.toggle("open");
                        if (notificationDropdown) notificationDropdown.classList.remove("open");
                    });
                }

                if (notificationToggle) {
                    notificationToggle.addEventListener("click", function(e) {
                        e.stopPropagation();
                        notificationDropdown.classList.toggle("open");
                        if (profileDropdown) profileDropdown.classList.remove("open");
                    });
                }

                window.addEventListener("click", function(e) {
                    if (profileDropdown && profileDropdown.classList.contains("open") && !profileToggle.contains(e.target) && !profileDropdown.contains(e.target)) {
                        profileDropdown.classList.remove("open");
                    }
                    if (notificationDropdown && notificationDropdown.classList.contains("open") && !notificationToggle.contains(e.target) && !notificationDropdown.contains(e.target)) {
                        notificationDropdown.classList.remove("open");
                    }
                });

                const darkModeToggle = document.getElementById("darkModeToggle");
                if (darkModeToggle) {
                    darkModeToggle.addEventListener("click", function() {
                        document.body.classList.toggle("dark-mode");
                        localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
                    });
                }

                // Cek tema HANYA saat skrip dimuat, tidak perlu di-set ulang
                if (localStorage.getItem("theme") === "dark") {
                    document.body.classList.add("dark-mode");
                } else {
                    document.body.classList.remove("dark-mode");
                }
            });
        </script>

        @stack('scripts')
        @livewireScripts

    </div>
</body>

</html>