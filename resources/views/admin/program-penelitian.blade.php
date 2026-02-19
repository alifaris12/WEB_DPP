<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Penelitian dan Pengabdian - Fakultas Ekonomi dan Bisnis</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { 
            height: 100%; 
            overflow-x: hidden;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            position: relative;
            min-height: 100vh;
        }

        /* Header Section */
        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
        }
        .university-logo {
            display: flex;
            align-items: center;
            color: #22529a;
            font-weight: bold;
        }
        .logo-image {
            height: 60px;
            width: auto;
            max-width: 220px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }
        .logo-image:hover { transform: scale(1.05); }

        /* Back Button */
        .back-container {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }
        .back-btn {
            padding: 10px 20px;
            background-color: #22529a;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
        }
        .back-btn:hover { background-color: #1a3d73; }
        .back-btn i { font-size: 16px; }

        /* Main Content Container */
        .main-container {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 120px 20px 140px;
        }

        /* Title Section */
        .title-section {
            background: #22529a;
            padding: 20px 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 90%;
        }
        .title-section h2 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .title-section h2 i { font-size: 24px; }
        .title-section p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 400;
        }

        /* Cards Container */
        .cards-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            align-items: stretch;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
        }

        /* Program Card */
        .program-card {
            background: #ffffff;
            padding: 30px 25px;
            border-radius: 15px;
            width: 280px;
            min-height: 300px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }
        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
        .program-card i {
            font-size: 40px;
            color: #22529a;
            margin-bottom: 15px;
        }
        .program-card h3 {
            font-size: 20px;
            color: #22529a;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .program-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
            flex-grow: 1;
        }
        .program-card button {
            background-color: #f7c842;
            color: #22529a;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        .program-card button:hover { background-color: #e8941a; }

        /* Animasi */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .program-card:nth-child(1) { animation-delay: 0.1s; }
        .program-card:nth-child(2) { animation-delay: 0.3s; }
        .program-card:nth-child(3) { animation-delay: 0.5s; }

        /* Mascot */
        .mascot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 140px;
            height: auto;
            z-index: 10;
            opacity: 0.9;
            transition: transform 0.3s ease-in-out;
            pointer-events: none;
        }
        .mascot:hover { transform: scale(1.1); }

        /* Tablet Responsive */
        @media (max-width: 992px) {
            .main-container { 
                padding: 110px 20px 120px; 
            }
            .title-section { 
                padding: 18px 30px; 
                max-width: 95%;
            }
            .title-section h2 { font-size: 24px; }
            .title-section p { font-size: 13px; }
            .cards-container { gap: 20px; }
            .program-card { 
                width: 260px; 
                min-height: 280px; 
                padding: 25px 20px; 
            }
            .program-card h3 { font-size: 18px; }
            .program-card p { font-size: 13px; }
            .program-card i { font-size: 36px; }
            .mascot { width: 120px; }
        }

        /* Mobile Landscape & Small Tablets */
        @media (max-width: 768px) {
            .header {
                top: 15px;
                left: 15px;
            }
            .back-container {
                top: 15px;
                right: 15px;
            }
            .back-btn {
                padding: 8px 16px;
                font-size: 14px;
            }
            .back-btn span {
                display: none;
            }
            .logo-image { height: 50px; }
            .main-container { 
                padding: 100px 15px 110px; 
            }
            .title-section { 
                padding: 15px 20px; 
                margin-bottom: 30px;
                max-width: 100%;
            }
            .title-section h2 { 
                font-size: 20px; 
                gap: 8px;
            }
            .title-section h2 i { font-size: 20px; }
            .title-section p { font-size: 12px; }
            .cards-container { 
                gap: 20px;
                padding: 0 10px;
            }
            .program-card { 
                width: 100%;
                max-width: 320px;
                min-height: 260px; 
                padding: 25px 20px; 
            }
            .program-card h3 { font-size: 18px; }
            .program-card p { font-size: 13px; }
            .program-card i { font-size: 35px; }
            .mascot { 
                width: 100px; 
                bottom: 15px;
                right: 15px;
            }
        }

        /* Mobile Portrait */
        @media (max-width: 480px) {
            .header {
                top: 10px;
                left: 10px;
            }
            .back-container {
                top: 10px;
                right: 10px;
            }
            .back-btn {
                padding: 8px 12px;
                font-size: 13px;
                border-radius: 10px;
            }
            .back-btn i {
                font-size: 14px;
            }
            .logo-image { height: 45px; }
            .main-container { 
                padding: 90px 10px 100px; 
                justify-content: flex-start;
            }
            .title-section { 
                padding: 12px 15px; 
                margin-bottom: 25px;
                border-radius: 12px;
            }
            .title-section h2 { 
                font-size: 17px;
                gap: 6px;
                line-height: 1.3;
            }
            .title-section h2 i { 
                font-size: 18px; 
            }
            .title-section p { 
                font-size: 11px; 
                line-height: 1.4;
            }
            .cards-container { 
                gap: 15px;
                padding: 0 5px;
            }
            .program-card { 
                width: 100%;
                max-width: 100%;
                min-height: 240px; 
                padding: 20px 15px; 
            }
            .program-card h3 { 
                font-size: 17px; 
                margin-bottom: 10px;
            }
            .program-card p { 
                font-size: 12px; 
                margin-bottom: 15px;
            }
            .program-card i { 
                font-size: 32px; 
                margin-bottom: 12px;
            }
            .program-card button {
                padding: 8px 16px;
                font-size: 13px;
            }
            .mascot { 
                width: 80px; 
                bottom: 10px;
                right: 10px;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .logo-image { height: 40px; }
            .back-btn {
                padding: 6px 10px;
                font-size: 12px;
            }
            .title-section h2 { 
                font-size: 16px; 
            }
            .title-section h2 i { 
                font-size: 16px; 
            }
            .title-section p { 
                font-size: 10px; 
            }
            .program-card { 
                min-height: 220px; 
                padding: 18px 12px; 
            }
            .program-card h3 { font-size: 16px; }
            .program-card p { font-size: 11px; }
            .program-card i { font-size: 30px; }
            .mascot { width: 70px; }
        }

        /* Landscape Mobile Optimization */
        @media (max-height: 500px) and (orientation: landscape) {
            html, body {
                overflow-y: auto;
            }
            .main-container {
                padding: 80px 15px 80px;
                min-height: auto;
            }
            .title-section {
                margin-bottom: 20px;
                padding: 10px 20px;
            }
            .title-section h2 {
                font-size: 18px;
            }
            .title-section p {
                font-size: 11px;
            }
            .cards-container {
                flex-direction: row;
                gap: 15px;
            }
            .program-card {
                width: 220px;
                min-height: 220px;
                padding: 15px;
            }
            .program-card i {
                font-size: 28px;
                margin-bottom: 8px;
            }
            .program-card h3 {
                font-size: 15px;
                margin-bottom: 8px;
            }
            .program-card p {
                font-size: 11px;
                margin-bottom: 10px;
            }
            .program-card button {
                padding: 6px 12px;
                font-size: 12px;
            }
            .mascot {
                width: 70px;
            }
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
            <i class="fas fa-arrow-left"></i>
            <span>Kembali ke Dashboard</span>
        </a>
    </div>

    <!-- Main Content Container -->
    <div class="main-container">
        <!-- Title Section -->
        <div class="title-section">
            <h2>
                <i class="fas fa-book-open"></i>
                <span>Daftar Program Penelitian dan Pengabdian</span>
                <i class="fas fa-handshake"></i>
            </h2>
            <p>Sistem Manajemen Data Penelitian dan Pengabdian Masyarakat</p>
        </div>

        <!-- Cards Container -->
        <div class="cards-container">
            <a href="{{ route('input.program') }}" class="program-card">
                <i class="fas fa-file-signature"></i>
                <h3>Input Program</h3>
                <p>Tambah data penelitian atau pengabdian</p>
                <button type="button">Mulai Input →</button>
            </a>

            <a href="{{ route('daftar.program') }}" class="program-card">
                <i class="fas fa-clipboard-list"></i>
                <h3>Daftar Program</h3>
                <p>Tampilkan semua data yang telah diinputkan</p>
                <button type="button">Lihat Daftar →</button>
            </a>

            <a href="{{ route('upload.excel') }}" class="program-card">
                <i class="fas fa-file-upload"></i>
                <h3>Upload Excel</h3>
                <p>Unggah file Excel untuk ditinjau sebelum disimpan ke database</p>
                <button type="button">Upload File →</button>
            </a>
        </div>
    </div>

    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">
</body>
</html>