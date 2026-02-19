<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Program Penelitian</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; 
            padding:20px; 
            line-height:1.6;
        }
        .container { 
            max-width:800px; 
            margin:0 auto; 
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px); 
            border-radius:20px; 
            padding:60px 40px 40px 40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2), 0 10px 20px rgba(0,0,0,.1), inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2); 
            animation:fadeIn 1s ease-in-out; 
            position:relative;
        }
        @keyframes fadeIn { 
            0%{opacity:0; transform:scale(.95)} 
            100%{opacity:1; transform:scale(1)} 
        }

        /* Back Button */
        .back-button {
            position:absolute; 
            top:20px; 
            left:20px;
            background:linear-gradient(135deg,#111,#333);
            color:#fff; 
            border:none; 
            border-radius:8px;
            padding:10px 16px; 
            font-size:14px; 
            font-weight:600; 
            cursor:pointer;
            display:flex; 
            align-items:center; 
            gap:6px; 
            transition:all .3s ease;
            box-shadow:0 4px 8px rgba(0,0,0,.3);
            z-index: 10;
        }
        .back-button:hover {
            background:linear-gradient(135deg,#000,#444);
            transform:translateY(-2px);
        }
        .back-button:active {
            transform:translateY(0);
            box-shadow:0 4px 8px rgba(0,0,0,.1);
        }

        .header { 
            text-align:center; 
            margin-bottom:30px; 
        }
        .header h1 {
            font-size:2rem; 
            font-weight:700; 
            margin-bottom:10px;
            background:linear-gradient(135deg,#ff9a56,#ff8c00); 
            -webkit-background-clip:text; 
            -webkit-text-fill-color:transparent;
            background-clip:text;
            text-shadow:1px 1px 3px rgba(0,0,0,.1);
        }
        .header p { 
            font-size:1rem; 
            color:#555; 
        }
        .form-group { 
            margin-bottom:20px; 
            display:flex; 
            flex-direction:column; 
        }
        .form-group label { 
            font-size:1rem; 
            font-weight:600; 
            color:#333; 
            margin-bottom:8px; 
        }
        .form-group input,
        .form-group select {
            padding:12px; 
            font-size:1rem; 
            border-radius:8px; 
            border:1px solid #ddd; 
            background:rgba(255,255,255,.8);
            box-shadow:0 4px 8px rgba(0,0,0,.1); 
            transition:all .3s ease;
            width: 100%;
        }
        .form-group input:focus,
        .form-group select:focus {
            border-color:#ff9a56; 
            background:#fff; 
            box-shadow:0 0 6px rgba(255,154,86,.4); 
            outline:none;
        }
        .submit-btn {
            padding:14px 20px; 
            background:linear-gradient(135deg,#ff9a56,#ff8c00); 
            color:#fff; 
            border:none; 
            border-radius:8px;
            font-size:1.1rem; 
            font-weight:600; 
            cursor:pointer; 
            width:100%; 
            transition:background .3s ease;
            text-align:center; 
            display:inline-block; 
            text-decoration:none;
        }
        .submit-btn:hover { 
            background:linear-gradient(135deg,#ff8c00,#ff9a56); 
        }
        .submit-btn:active { 
            transform:translateY(2px); 
            box-shadow:0 4px 8px rgba(0,0,0,.1); 
        }
        
        /* Toast Notification */
        .toast {
            position: fixed;
            top: 20px; 
            right: 20px;
            color: #fff;
            padding: 16px 24px;
            border-radius: 8px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.5s ease;
            z-index: 9999;
            max-width: 350px;
        }
        .toast-success {
            background: #22c55e;
        }
        .toast-error {
            background: #ef4444;
        }
        .toast.show { 
            opacity: 1; 
            transform: translateY(0); 
        }
        
        .upload-excel-wrapper { 
            text-align:center; 
            margin-bottom:20px; 
        }
        .excel-btn {
            padding:14px 20px;
            background:linear-gradient(135deg,#2563eb,#1e40af);
            color:#fff; 
            border:none; 
            border-radius:8px;
            font-size:1.1rem; 
            font-weight:600; 
            cursor:pointer; 
            width:100%;
            max-width: 300px;
            text-align:center; 
            display:inline-block; 
            text-decoration:none;
            box-shadow:0 4px 8px rgba(37,99,235,.3);
            transition: all .3s ease;
        }
        .excel-btn:hover { 
            background:linear-gradient(135deg,#1e40af,#2563eb);
            transform: translateY(-2px);
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }
        .file-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            background: rgba(8,145,178,.1);
            border: 2px dashed #0891b2;
            border-radius: 8px;
            cursor: pointer;
            transition: all .3s ease;
            color: #0891b2;
            font-weight: 600;
        }
        .file-label:hover {
            background: rgba(8,145,178,.2);
            border-color: #0e7490;
        }
        .file-name {
            margin-top: 8px;
            font-size: 14px;
            color: #666;
            font-style: italic;
        }

        /* Tablet Responsiveness */
        @media (max-width: 992px) {
            .container {
                padding: 55px 35px 35px 35px;
            }
            .header h1 {
                font-size: 1.8rem;
            }
            .header p {
                font-size: 0.95rem;
            }
        }

        /* Mobile Landscape & Small Tablets */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            .container {
                padding: 50px 30px 30px 30px;
                border-radius: 16px;
            }
            .back-button {
                top: 15px;
                left: 15px;
                padding: 8px 14px;
                font-size: 13px;
            }
            .header {
                margin-bottom: 25px;
            }
            .header h1 {
                font-size: 1.6rem;
                margin-bottom: 8px;
            }
            .header p {
                font-size: 0.9rem;
            }
            .upload-excel-wrapper {
                margin-bottom: 18px;
            }
            .excel-btn {
                font-size: 1rem;
                padding: 12px 18px;
            }
            .form-group {
                margin-bottom: 18px;
            }
            .form-group label {
                font-size: 0.95rem;
                margin-bottom: 6px;
            }
            .form-group input,
            .form-group select {
                padding: 11px;
                font-size: 0.95rem;
            }
            .submit-btn {
                font-size: 1rem;
                padding: 13px 18px;
            }
        }

        /* Mobile Portrait */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 55px 20px 25px 20px;
                border-radius: 14px;
            }
            .back-button {
                top: 12px;
                left: 12px;
                padding: 7px 12px;
                font-size: 12px;
                gap: 4px;
            }
            .back-button span:last-child {
                display: none;
            }
            .header {
                margin-bottom: 20px;
            }
            .header h1 {
                font-size: 1.4rem;
                line-height: 1.3;
                margin-bottom: 6px;
            }
            .header p {
                font-size: 0.85rem;
                line-height: 1.4;
            }
            .upload-excel-wrapper {
                margin-bottom: 16px;
            }
            .excel-btn {
                font-size: 0.95rem;
                padding: 11px 16px;
                max-width: 100%;
            }
            .form-group {
                margin-bottom: 16px;
            }
            .form-group label {
                font-size: 0.9rem;
                margin-bottom: 6px;
            }
            .form-group input,
            .form-group select {
                padding: 10px;
                font-size: 0.9rem;
                border-radius: 6px;
            }
            .submit-btn {
                font-size: 0.95rem;
                padding: 12px 16px;
            }
            .toast {
                top: 10px;
                right: 10px;
                left: 10px;
                max-width: none;
                padding: 14px 18px;
                font-size: 0.9rem;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .container {
                padding: 50px 15px 20px 15px;
            }
            .header h1 {
                font-size: 1.3rem;
            }
            .header p {
                font-size: 0.8rem;
            }
            .excel-btn {
                font-size: 0.9rem;
                padding: 10px 14px;
            }
            .form-group label {
                font-size: 0.85rem;
            }
            .form-group input,
            .form-group select {
                padding: 9px;
                font-size: 0.85rem;
            }
            .submit-btn {
                font-size: 0.9rem;
                padding: 11px 14px;
            }
        }

        /* Landscape Mobile Optimization */
        @media (max-height: 500px) and (orientation: landscape) {
            body {
                padding: 10px;
            }
            .container {
                padding: 45px 25px 20px 25px;
                margin: 10px auto;
            }
            .back-button {
                top: 10px;
                left: 10px;
                padding: 6px 10px;
                font-size: 11px;
            }
            .header {
                margin-bottom: 15px;
            }
            .header h1 {
                font-size: 1.3rem;
                margin-bottom: 4px;
            }
            .header p {
                font-size: 0.8rem;
            }
            .upload-excel-wrapper {
                margin-bottom: 12px;
            }
            .excel-btn {
                font-size: 0.85rem;
                padding: 8px 14px;
            }
            .form-group {
                margin-bottom: 12px;
            }
            .form-group label {
                font-size: 0.85rem;
                margin-bottom: 4px;
            }
            .form-group input,
            .form-group select {
                padding: 8px;
                font-size: 0.85rem;
            }
            .submit-btn {
                font-size: 0.9rem;
                padding: 10px 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="goBack()">
            <span>←</span>
            <span>Kembali</span>
        </button>

        <div class="upload-excel-wrapper">
            <a href="{{ route('upload.excel') }}" class="excel-btn">
                📁 Upload Program via Excel
            </a>
        </div>

        <div class="header">
            <h1>Input Program Penelitian dan Pengabdian</h1>
            <p>Lengkapi formulir di bawah ini untuk menambahkan program penelitian atau pengabdian</p>
        </div>

        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="Masukkan Kategori" required>
            </div>

            <div class="form-group">
                <label for="skema">Skema</label>
                <input type="text" id="skema" name="skema" placeholder="Masukkan Skema" required>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul" required>
            </div>

            <div class="form-group">
                <label for="ketua">Ketua Program</label>
                <input type="text" id="ketua" name="ketua" placeholder="Nama ketua program" required>
            </div>

            <div class="form-group">
                <label for="anggota">Anggota Tim</label>
                <input type="text" id="anggota" name="anggota" placeholder="Nama anggota tim (opsional)">
            </div>

            <div class="form-group">
                <label for="dana">Dana Program (Rp)</label>
                <input type="text" id="dana" name="dana" placeholder="Masukkan dana yang diperlukan" inputmode="numeric" required>
            </div>

            <div class="form-group">
                <label for="file">
                    Upload Dokumen <span style="color: red;">*(laporan akhir kegiatan dan dokumen kontrak)</span>
                </label>
                <div class="file-input-wrapper">
                    <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" onchange="updateFileName(this)">
                    <label for="file" class="file-label">
                        <span>📎</span>
                        <span>Pilih File (PDF, DOC, XLS - Max 5MB)</span>
                    </label>
                </div>
                <div class="file-name" id="fileName"></div>
            </div>

            <button type="submit" class="submit-btn">Tambah Program</button>
        </form>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
    <div id="toast" class="toast toast-success">
        ✔ Program berhasil ditambahkan! <br>
        {{ session('success') }}
    </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))F
    <div id="toast-error" class="toast toast-error">
        ❌ Gagal menambahkan program! <br>
        {{ session('error') }}
    </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
    <div id="toast-validation" class="toast toast-error">
        <strong>❌ Terjadi kesalahan:</strong>
        <ul style="margin: 10px 0 0 0; padding-left: 20px; text-align: left;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script>
        function goBack() {
            window.history.length > 1 ? window.history.back() : window.location.href = '/';
        }

        document.getElementById('dana')?.addEventListener('input', function(e) {
            const value = e.target.value.replace(/\D/g, '');
            e.target.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });

        function updateFileName(input) {
            const fileName = input.files[0]?.name || '';
            document.getElementById('fileName').textContent = fileName ? `File dipilih: ${fileName}` : '';
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Success Toast
            const toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => toast.classList.add('show'), 200);
                setTimeout(() => toast.classList.remove('show'), 4000);
            }

            // Error Toast
            const toastError = document.getElementById('toast-error');
            if (toastError) {
                setTimeout(() => toastError.classList.add('show'), 200);
                setTimeout(() => toastError.classList.remove('show'), 5000);
            }

            // Validation Error Toast
            const toastValidation = document.getElementById('toast-validation');
            if (toastValidation) {
                setTimeout(() => toastValidation.classList.add('show'), 200);
                setTimeout(() => toastValidation.classList.remove('show'), 6000);
            }
        });
    </script>
</body>
</html>