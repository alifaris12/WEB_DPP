<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Program - Faculty of Economics and Business</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f7c842 0%, #f4a742 50%, #e8941a 100%);
            color: #333;
            overflow-x: hidden;
        }

        .header {
            padding: 15px 20px;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .university-logo {
            display: flex;
            align-items: center;
        }

        .logo-image {
            height: 60px;
            width: auto;
            max-width: 200px;
            object-fit: contain;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-image:hover { transform: scale(1.05); }

        .mascot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 120px;
            height: auto;
            z-index: 10;
            opacity: 0.9;
            transition: transform 0.3s ease-in-out;
            display: block;
        }

        .mascot:hover { transform: scale(1.1); }

        .logout-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c82333 0%, #dc3545 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
        }

        .logout-btn i { font-size: 16px; }

        .program-container {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px 20px 40px;
            text-align: center;
        }

        .program-title {
            font-size: clamp(28px, 5vw, 48px);
            font-weight: 700;
            margin-bottom: 20px;
            color: #fff;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #22529a, #2a5ba8);
            padding: 15px 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            animation: fadeInDown 0.8s ease;
            max-width: 90%;
        }

        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .program-subtitle {
            font-size: clamp(16px, 3vw, 22px);
            margin-bottom: 40px;
            color: #333;
            font-weight: 700;
            font-style: italic;
            max-width: 90%;
        }

        .program-buttons {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            width: 100%;
        }

        .program-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 280px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .program-card i {
            font-size: 50px;
            color: #22529a;
            margin-bottom: 20px;
        }

        .program-card h3 { 
            font-size: 18px; 
            margin-bottom: 20px; 
            color: #22529a;
            line-height: 1.4;
        }

        .program-card button {
            background-color: #f7c842;
            color: #22529a;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .program-card button:hover { 
            background-color: #e8941a;
            transform: scale(1.05);
        }

        /* Tablet */
        @media (max-width: 768px) {
            .header {
                padding: 12px 15px;
            }

            .logo-image {
                height: 50px;
                max-width: 150px;
            }

            .logout-btn {
                padding: 8px 16px;
                font-size: 13px;
                gap: 6px;
            }

            .logout-btn i { font-size: 14px; }

            .program-container {
                padding: 100px 15px 30px;
            }

            .program-title {
                padding: 12px 30px;
                letter-spacing: 1px;
            }

            .program-buttons {
                gap: 20px;
            }

            .program-card {
                max-width: 250px;
                padding: 25px;
            }

            .program-card i {
                font-size: 45px;
            }

            .mascot {
                width: 100px;
                bottom: 15px;
                right: 15px;
            }
        }

        /* Mobile */
        @media (max-width: 480px) {
            .header {
                padding: 10px;
                flex-direction: row;
            }

            .logo-image {
                height: 40px;
                max-width: 120px;
            }

            .logout-btn {
                padding: 8px 12px;
                font-size: 12px;
            }

            .logout-btn span {
                display: none;
            }

            .logout-btn i {
                margin: 0;
            }

            .program-container {
                padding: 90px 10px 20px;
            }

            .program-title {
                padding: 10px 20px;
                font-size: 1rem;
                letter-spacing: 0.5px;
            }

            .program-subtitle {
                margin-bottom: 30px;
            }

            .program-buttons {
                gap: 15px;
                flex-direction: column;
                align-items: center;
            }

            .program-card {
                max-width: 100%;
                width: calc(100% - 20px);
                padding: 20px;
            }

            .program-card i {
                font-size: 40px;
            }

            .program-card h3 {
                font-size: 16px;
            }

            .program-card button {
                padding: 10px 20px;
                font-size: 13px;
            }

            .mascot {
                width: 80px;
                bottom: 10px;
                right: 10px;
            }
        }

        /* Extra small devices */
        @media (max-width: 360px) {
            .program-card {
                padding: 15px;
            }

            .program-card i {
                font-size: 35px;
                margin-bottom: 15px;
            }

            .program-card h3 {
                font-size: 15px;
                margin-bottom: 15px;
            }

            .mascot {
                width: 70px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="university-logo">
            <img src="{{ asset('images/FEB-UB-Black-Teks-min 1.png') }}" class="logo-image" alt="University Logo">
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

    <img src="{{ asset('images/maskot.png') }}" alt="Maskot" class="mascot">

    <div class="program-container">
        <h2 class="program-title">Pilih Program</h2>
        <p class="program-subtitle">Silahkan pilih kategori program yang ingin Anda akses</p>
        <div class="program-buttons">
            <a href="{{ route('user.daftar.program') }}" class="program-card">
                <i class="fas fa-book"></i>
                <h3>Daftar Program Penelitian & Pengabdian</h3>
                <button>Lihat Daftar</button>
            </a>
            <a href="{{ route('user.daftar.kerjasama') }}" class="program-card">
                <i class="fas fa-globe"></i>
                <h3>Daftar Kerjasama Nasional & Internasional</h3>
                <button>Lihat Daftar</button>
            </a>
        </div>
    </div>
</body>
</html>