<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kerjasama</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:20px; line-height:1.6;
        }
        .container { max-width:800px; margin:0 auto; background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px); border-radius:20px; padding:60px 40px 40px 40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2), 0 10px 20px rgba(0,0,0,.1), inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2); animation:fadeIn 1s ease-in-out; position:relative;
        }
        @keyframes fadeIn { 0%{opacity:0; transform:scale(.95)} 100%{opacity:1; transform:scale(1)} }

        .back-button {
            position:absolute; top:20px; left:20px;
            background:linear-gradient(135deg,#111,#333);
            color:#fff; border:none; border-radius:8px;
            padding:10px 16px; font-size:14px; font-weight:600; cursor:pointer;
            display:flex; align-items:center; gap:6px; transition:all .3s ease;
            box-shadow:0 4px 8px rgba(0,0,0,.3);
        }
        .back-button:hover { background:linear-gradient(135deg,#000,#444); transform:translateY(-2px); }

        .header { text-align:center; margin-bottom:30px; }
        .header h1 {
            font-size:2rem; font-weight:700; margin-bottom:10px;
            background:linear-gradient(135deg,#ff9a56,#ff8c00); -webkit-background-clip:text; color:transparent;
        }

        .form-group { margin-bottom:20px; display:flex; flex-direction:column; }
        .form-group label { font-size:1rem; font-weight:600; color:#333; margin-bottom:8px; }
        .form-group input,.form-group select {
            padding:12px; font-size:1rem; border-radius:8px; border:1px solid #ddd;
        }
        .submit-btn {
            padding:14px 20px; background:linear-gradient(135deg,#ff9a56,#ff8c00); color:#fff; border:none; border-radius:8px;
            font-size:1.1rem; font-weight:600; cursor:pointer; width:100%; transition:background .3s ease;
            text-align:center; display:inline-block; text-decoration:none;
        }
        .submit-btn:hover { background:linear-gradient(135deg,#ff8c00,#ff9a56); }
        .submit-btn:active { transform:translateY(2px); box-shadow:0 4px 8px rgba(0,0,0,.1); }
        .toast {
            position: fixed;
            top: 20px; right: 20px;
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
        .toast-success { background: #22c55e; }
        .toast-error { background: #ef4444; }
        .toast.show { opacity: 1; transform: translateY(0); }
        .upload-excel-wrapper { text-align:center; margin-bottom:20px; }
        .excel-btn {
            padding:14px 20px;
            background:linear-gradient(135deg,#2563eb,#1e40af);
            color:#fff; border:none; border-radius:8px;
            font-size:1.1rem; font-weight:600; cursor:pointer; width:100%;
            text-align:center; display:inline-block; text-decoration:none;
            box-shadow:0 4px 8px rgba(37,99,235,.3);
        }
        .excel-btn:hover { background:linear-gradient(135deg,#1e40af,#2563eb); }
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
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="history.back()">← Kembali</button>

        <div class="upload-excel-wrapper">
            <a href="{{ route('upload.excel.kerjasama') }}" class="excel-btn" style="max-width:300px;">
                📁 Upload Program via Excel
            </a>
        </div>

        <div class="header">
            <h1>Input Kerjasama</h1>
            <p>Lengkapi formulir berikut untuk menambahkan data kerjasama</p>
        </div>

        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <input type="hidden" name="kategori" value="kerjasama">

            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <select id="tingkat" name="tingkat" required>
                    <option value="nasional">Nasional</option>
                    <option value="internasional">Internasional</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mitra_kerjasama">Mitra Kerjasama</label>
                <input type="text" id="mitra_kerjasama" name="mitra_kerjasama" placeholder="Masukkan Nama Mitra Kerjasama" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
            </div>

            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu Kerjasama</label>
                <input type="text" id="jangka_waktu" name="jangka_waktu" placeholder="Masukkan Jangka Waktu" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
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

            <button type="submit" class="submit-btn">Tambah Kerjasama</button>
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
    @if(session('error'))
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
        function updateFileName(input) {
            const fileName = input.files[0]?.name || '';
            document.getElementById('fileName').textContent = fileName ? `File dipilih: ${fileName}` : '';
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Success Toast
            const toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => { toast.classList.add('show'); }, 200);
                setTimeout(() => { toast.classList.remove('show'); }, 4000);
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
