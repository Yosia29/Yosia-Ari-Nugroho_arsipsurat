<!DOCTYPE html>
<html>
<head>
    <title>Arsip Surat Desa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: #f8f9fa;
            height: 100vh;
            padding: 20px;
            border-right: 1px solid #ddd;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 8px 0;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h5>Menu</h5>
        <hr>
        <a href="{{ route('surat.index') }}">⭐ Arsip</a>
        <a href="{{ route('kategori.index') }}">⭐ Kategori Surat</a>
        <a href="{{ route('about') }}">⭐ About</a>
    </div>

    <div class="content">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
