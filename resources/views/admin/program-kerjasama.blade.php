<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Kerjasama Nasional & Internasional - Fakultas Ekonomi dan Bisnis</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; overflow: hidden; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        /* Header Section */
        .header { position: absolute; top: 20px; left: 20px; z-index: 100; }
        .university-logo { display: flex; align-items: center; color: #22529a; font-weight: bold; }
        .logo-image {
            height: 60px; width: auto; max-width: 220px; object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); transition: transform .3s ease;
        }
        .logo-image:hover { transform: scale(1.05); }

        /* Back Button */
        .back-container { position: absolute; top: 20px; right: 20px; z-index: 100; }
        .back-btn {
            padding: 10px 20px; background-color: #22529a; color: #fff; border: none; border-radius: 12px;
            font-size: 16px; font-weight: bold; cursor: pointer; transition: background-color .3s ease;
            display: inline-flex; align-items: center; gap: 8px; font-family: 'Poppins', sans-serif; text-decoration: none;
        }
        .back-btn:hover { background-color: #1a3d73; }
        .back-btn i { font-size: 16px; }

        /* Main Content */
        .main-container { height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 100px 20px 20px; }

        /* Title */
        .title-section {
            background: #22529a; padding: 15px 40px; border-radius: 15px; margin-bottom: 30px; text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .title-section h2 {
            color: #fff; font-size: 28px; font-weight: 700; margin-bottom: 5px;
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .title-section h2 i { font-size: 24px; }
        .title-section p { color: rgba(255,255,255,.9); font-size: 14px; font-weight: 400; }

        /* Cards */
        .cards-container { display: flex; gap: 25px; justify-content: center; align-items: center; flex-wrap: wrap; will-change: transform, opacity; }
        .program-card {
            background: #fff; padding: 25px; border-radius: 15px; width: 240px; min-height: 280px; text-decoration: none; color: inherit;
            box-shadow: 0 10px 20px rgba(0,0,0,.1); text-align: center; transition: transform .3s ease, box-shadow .3s ease;
            display: flex; flex-direction: column; align-items: center; justify-content: space-between; opacity: 0; animation: fadeInUp .6s ease forwards;
        }
        .program-card:hover { transform: translateY(-10px); box-shadow: 0 15px 25px rgba(0,0,0,.2); }
        .program-card i { font-size: 35px; color: #22529a; margin-bottom: 12px; }
        .program-card h3 { font-size: 18px; color: #22529a; margin-bottom: 10px; font-weight: 600; }
        .program-card p { font-size: 13px; color: #666; margin-bottom: 15px; line-height: 1.4; flex-grow: 1; }
        .program-card button {
            background-color: #f7c842; color: #22529a; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer;
            font-weight: bold; font-size: 14px; transition: background-color .3s ease; font-family: 'Poppins', sans-serif;
        }
        .program-card button:hover { background-color: #e8941a; }

        /* Animations */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px) scale(.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
        .program-card:nth-child(1) { animation-delay: .1s; }
        .program-card:nth-child(2) { animation-delay: .25s; }
        .program-card:nth-child(3) { animation-delay: .4s; }
        .program-card:nth-child(4) { animation-delay: .55s; }

        /* Mascot */
        .mascot { position: fixed; bottom: 20px; right: 20px; width: 140px; height: auto; z-index: 10; opacity: .9; transition: transform .3s ease-in-out; }
        .mascot:hover { transform: scale(1.1); }

        /* Responsive */
        @media (max-width: 1024px) { .cards-container { gap: 18px; } }
        @media (max-width: 768px) {
            .main-container { padding: 90px 10px 10px; }
            .title-section { padding: 12px 25px; }
            .title-section h2 { font-size: 20px; }
            .title-section p { font-size: 12px; }
            .cards-container { gap: 15px; flex-wrap: wrap; }
            .program-card { width: 200px; min-height: 250px; padding: 20px 15px; }
            .program-card h3 { font-size: 15px; }
            .program-card p { font-size: 11px; }
            .program-card i { font-size: 28px; }
            .mascot { width: 100px; }
            .logo-image { height: 50px; }
        }
        @media (max-width: 480px) {
            .cards-container { flex-direction: column; gap: 10px; }
            .program-card { width: 220px; min-height: 230px; padding: 15px; }
            .title-section h2 { font-size: 18px; }
            .mascot { width: 80px; bottom: 10px; right: 10px; }
        }
    </style>
</head>
<body>
    <!-- University Header -->
    <div class="header">
        <div class="university-logo">
            <img src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" class="logo-image" alt="University Logo">
        </div>
    </div>

    <!-- Back Button -->
    <div class="back-container">
        <a href="{{ route('admin.dashboard') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <!-- Main Content Container -->
    <div class="main-container">
        <!-- Title Section -->
        <div class="title-section">
            <h2>
                <i class="fas fa-handshake-angle"></i>
                Daftar Kerjasama Nasional & Internasional
                <i class="fas fa-globe"></i>
            </h2>
        </div>

        <!-- Cards Container -->
        <div class="cards-container">
            <!-- Input Kerjasama (left) -->
            <a href="{{ route('input.kerjasama') }}" class="program-card">
                <i class="fas fa-file-signature"></i>
                <h3>Input Kerjasama</h3>
                <p>Tambah data kerjasama baru (MoU/MoA/IA) beserta mitra dan masa berlaku.</p>
                <button type="button">Mulai Input →</button>
            </a>

            <!-- Daftar Kerjasama (center) -->
            <a href="{{ route('daftar.kerjasama.nasional') }}" class="program-card">
                <i class="fas fa-flag"></i>
                <h3>Daftar Kerjasama</h3>
                <p>Lihat seluruh kerjasama dengan institusi dalam negeri maupun luar negeri lengkap dengan status aktif.</p>
                <button type="button">Lihat Kerjasama →</button>
            </a>

            <!-- Upload Excel Kerjasama (right) -->
            <a href="{{ route('upload.excel.kerjasama') }}" class="program-card">
                <i class="fas fa-file-upload"></i>
                <h3>Upload Excel</h3>
                <p>Unggah file Excel untuk ditinjau sebelum disimpan ke database kerjasama.</p>
                <button type="button">Upload File →</button>
            </a>
        </div>
    </div>

    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">
</body>
</html>
