
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Perpustakaan Digital Kampus')</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: sans-serif;
            margin: 0;
            color: #1f2937;
        }

        nav {
            background: #1e3a8a;
            padding: 14px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        nav .brand {
            color: #fff;
            font-weight: bold;
            font-size: 18px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav ul li a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 6px 4px;
        }

        nav ul li a.active {
            color: #fff;
            font-weight: bold;
            border-bottom: 2px solid #fff;
        }

        /* Informasi pengguna dan tombol logout */
        nav .navbar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            font-size: 14px;
        }

        nav .btn-logout {
            background: none;
            border: 1px solid #cbd5e1;
            color: #cbd5e1;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        nav .btn-logout:hover {
            background: #1e40af;
            color: #fff;
        }

        main {
            max-width: 900px;
            margin: 0 auto;
            padding: 30px 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 16px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        /* Badge status */
        .badge-success {
            display: inline-block;
            background: #d1fae5;
            color: #065f46;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
        }

        .badge-warning {
            display: inline-block;
            background: #fef3c7;
            color: #92400e;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
        }

        .badge-danger {
            display: inline-block;
            background: #fee2e2;
            color: #991b1b;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 6px 14px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        button[type="submit"] {
            display: block;
            margin-top: 10px;
        }

        /* Form logout tetap sejajar dengan navbar */
        nav form.inline {
            display: inline;
            margin: 0;
        }

        nav form.inline button[type="submit"] {
            display: inline-block;
            margin-top: 0;
        }

        form.inline {
            display: inline;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 14px;
            border-top: 1px solid #e5e7eb;
            margin-top: 40px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 4px;
        }

        /* Tombol aksi */
        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-buttons form {
            margin: 0;
            padding: 0;
            display: inline;
        }

        .action-buttons a {
            display: inline-flex;
            align-items: center;
            height: 28px;
        }

        .action-buttons button {
            height: 28px;
            padding: 4px 8px;
            margin: 0;
            white-space: nowrap;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination nav {
            background: transparent !important;
            padding: 0 !important;
            width: 100% !important;
            display: block;
        }

        .pagination nav > div:first-child {
            display: none !important;
        }

        .pagination nav > div:last-child {
            display: flex !important;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .pagination nav a,
        .pagination nav span {
            text-decoration: none;
        }

        .pagination nav svg {
            width: 20px;
            height: 20px;
        }

        /* Navbar yang lebih rapi */
        nav:not(.pagination nav) {
            gap: 20px;
        }

        nav .brand {
            white-space: nowrap;
        }

        nav ul li a {
            display: inline-block;
            border-radius: 6px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        nav ul li a:hover {
            color: #fff;
            background: #1e40af;
        }

        nav .navbar-user {
            gap: 14px;
        }

        nav .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 3px;
        }

        nav .user-name {
            color: #fff;
            font-weight: bold;
        }

        nav .user-role {
            color: #cbd5e1;
            font-size: 12px;
        }

        nav .btn-logout {
            padding: 7px 12px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        /* Halaman profil */
        .profile-page {
            max-width: 720px;
            margin: 0 auto;
        }

        .profile-heading {
            margin-bottom: 24px;
        }

        .profile-heading h1 {
            margin-bottom: 8px;
            color: #1e3a8a;
        }

        .profile-heading p {
            color: #6b7280;
            margin-top: 0;
        }

        .profile-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .profile-card h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 19px;
            color: #1e3a8a;
        }

        .profile-detail {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 14px;
            padding: 13px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .profile-detail:last-child {
            border-bottom: none;
        }

        .profile-label {
            color: #6b7280;
        }

        .profile-value {
            color: #1f2937;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .profile-role {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 999px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: bold;
        }

        .profile-card form label {
            margin-top: 16px;
        }

        .profile-card form input {
            padding: 10px 12px;
            margin-top: 7px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
        }

        .profile-card form input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .profile-submit {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 18px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 7px;
            font-weight: 600;
            cursor: pointer;
        }

        .profile-submit:hover {
            background: #1d4ed8;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border-radius: 7px;
            padding: 12px 16px;
            margin-bottom: 16px;
        }

        @media (max-width: 1000px) {
            nav {
                justify-content: center;
                padding: 16px 20px;
            }

            nav .brand {
                width: 100%;
                text-align: center;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            nav .navbar-user {
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 600px) {
            main {
                padding: 24px 16px;
            }

            .profile-card {
                padding: 18px;
            }

            .profile-detail {
                grid-template-columns: 1fr;
                gap: 5px;
            }
        }
    </style>
</head>

<body>

    @include('partials.navbar')

    <main>
        @include('partials.alert')

        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Sistem Perpustakaan Digital Kampus
    </footer>

</body>
</html>
