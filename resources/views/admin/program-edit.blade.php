<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Penelitian</title>
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
        .current-file {
            margin-top: 8px;
            padding: 10px;
            background: rgba(34,197,94,.1);
            border-radius: 6px;
            font-size: 14px;
            color: #059669;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .current-file a {
            color: #0891b2;
            text-decoration: none;
            font-weight: 600;
        }
        .current-file a:hover {
            text-decoration: underline;
        }
        .file-name {
            margin-top: 8px;
            font-size: 14px;
            color: #666;
            font-style: italic;
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
        }
        .submit-btn:hover { 
            background:linear-gradient(135deg,#ff8c00,#ff9a56); 
        }
        @media (max-width: 768px) {
            body { padding: 15px; }
            .container { padding: 50px 30px 30px 30px; }
            .header h1 { font-size: 1.6rem; }
        }
        @media (max-width: 480px) {
            .container { padding: 55px 20px 25px 20px; }
            .header h1 { font-size: 1.4rem; }
            .back-button span:last-child { display: none; }
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="goBack()">
            <span>←</span>
            <span>Kembali</span>
        </button>

        <div class="header">
            <h1>Edit Program Penelitian</h1>
            <p>Perbarui informasi program penelitian atau pengabdian</p>
        </div>

        <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" value="{{ $program->tahun }}" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ $program->kategori }}" required>
            </div>

            <div class="form-group">
                <label for="skema">Skema</label>
                <input type="text" id="skema" name="skema" value="{{ $program->skema }}" required>
            </div>

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ $program->judul }}" required>
            </div>

            <div class="form-group">
                <label for="ketua">Ketua Program</label>
                <input type="text" id="ketua" name="ketua" value="{{ $program->ketua }}" required>
            </div>

            <div class="form-group">
                <label for="anggota">Anggota Tim</label>
                <input type="text" id="anggota" name="anggota" value="{{ $program->anggota }}">
            </div>

            <div class="form-group">
                <label for="dana">Dana Program (Rp)</label>
                <input type="text" id="dana" name="dana" value="{{ number_format($program->dana, 0, ',', '.') }}" required>
            </div>

            <div class="form-group">
                <label for="file">Upload Dokumen Baru (Opsional)</label>
                
                @if($program->file_path)
                <div class="current-file">
                    <span>📄</span>
                    <span>File saat ini: </span>
                    <a href="{{ Storage::url($program->file_path) }}" target="_blank">
                        {{ basename($program->file_path) }}
                    </a>
                </div>
                @endif

                <div class="file-input-wrapper" style="margin-top: 10px;">
                    <input type="file" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" onchange="updateFileName(this)">
                    <label for="file" class="file-label">
                        <span>📎</span>
                        <span>{{ $program->file_path ? 'Ganti File' : 'Pilih File' }} (PDF, DOC, XLS - Max 10MB)</span>
                    </label>
                </div>
                <div class="file-name" id="fileName"></div>
            </div>

            <button type="submit" class="submit-btn">Update Program</button>
        </form>
    </div>

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
            document.getElementById('fileName').textContent = fileName ? `File baru dipilih: ${fileName}` : '';
        }
    </script>
</body>
</html>