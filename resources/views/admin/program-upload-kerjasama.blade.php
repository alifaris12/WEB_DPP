<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Excel Kerjasama</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      overflow: hidden;
    }

    .bg-shape {
      position: absolute;
      border-radius: 50%;
      filter: blur(40px);
    }
    .shape1 {
      width: 300px; height: 300px;
      top: -100px; left: -100px;
      background: linear-gradient(135deg, rgba(34,193,195,0.4), rgba(253,187,45,0.4));
    }
    .shape2 {
      width: 250px; height: 250px;
      bottom: -120px; right: -120px;
      background: linear-gradient(135deg, rgba(131,58,180,0.4), rgba(253,29,29,0.4));
    }
    .shape3 {
      width: 200px; height: 200px;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(135deg, rgba(69,104,220,0.4), rgba(176,106,179,0.4));
    }

    /* Main Container */
    .container {
      width: 100%;
      max-width: 600px;
      position: relative;
      z-index: 10;
    }

    /* Glass Card */
    .glass-card {
      background: rgba(59, 130, 246, 0.2);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-radius: 20px;
      border: 1px solid rgba(59, 130, 246, 0.4);
      padding: 40px;
      box-shadow: 0 8px 32px rgba(59, 130, 246, 0.37);
      animation: fadeIn 0.6s ease-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Header */
    .header {
      text-align: center;
      margin-bottom: 30px;
    }
    .title {
      color: #1e3a8a;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 8px;
      text-shadow: 2px 2px 4px rgba(255,255,255,0.6);
    }
    .subtitle {
      color: rgba(30, 58, 138, 0.8);
      font-size: 14px;
    }

    /* Download Button */
    .download-wrapper {
      display: flex;
      justify-content: center;
      margin-bottom: 25px;
    }
    .download-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      color: white;
      padding: 12px 24px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
    }
    .download-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6);
    }

    /* Upload Area */
    .upload-area {
      border: 2px dashed rgba(255,255,255,0.3);
      border-radius: 15px;
      padding: 40px 20px;
      text-align: center;
      transition: all 0.3s ease;
      cursor: pointer;
      position: relative;
      background: rgba(255,255,255,0.2);
    }
    .upload-area:hover {
      border-color: #1d4ed8;
      background: rgba(59,130,246,0.15);
    }
    .upload-icon {
      font-size: 48px;
      color: #2563eb;
      margin-bottom: 15px;
    }
    .upload-text { color: #1e3a8a; font-size: 16px; margin-bottom: 8px; }
    .upload-subtext { color: rgba(30,58,138,0.7); font-size: 14px; }
    .file-input {
      position: absolute;
      width: 100%; height: 100%;
      top: 0; left: 0;
      opacity: 0;
      cursor: pointer;
    }

    /* Submit Button */
    .submit-btn {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white;
      padding: 14px 32px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 25px;
      width: 100%;
      box-shadow: 0 4px 15px rgba(59,130,246,0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }
    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(29,78,216,0.4);
    }

    /* Back Button */
    .back-btn {
      display: inline-block;
      text-align: center;
      margin-top: 15px;
      width: 100%;
      background: linear-gradient(135deg, #6b7280 0%, #374151 100%);
      color: white;
      padding: 12px 24px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(107,114,128,0.3);
      transition: all 0.3s ease;
    }
    .back-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(55,65,81,0.5);
    }
  </style>
</head>
<body>
  <div class="bg-shape shape1"></div>
  <div class="bg-shape shape2"></div>
  <div class="bg-shape shape3"></div>

  <div class="container">
    <div class="glass-card">
      <div class="header">
        <h1 class="title">Upload Excel Kerjasama</h1>
        <p class="subtitle">Upload file Excel untuk menambahkan data program kerjasama</p>
      </div>

      @if(session('success'))
        <div style="background: rgba(34,197,94,0.1); color: #16a34a; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
          ✔ {{ session('success') }}
        </div>
      @endif
      @if(session('error'))
        <div style="background: rgba(239,68,68,0.1); color: #dc2626; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
          ❌ {{ session('error') }}
        </div>
      @endif
      @if(session('warning'))
        <div style="background: rgba(251,146,60,0.1); color: #ea580c; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
          ⚠️ {{ session('warning') }}
        </div>
      @endif
      @if($errors->any())
        <div style="background: rgba(239,68,68,0.1); color: #dc2626; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-weight: 500;">
          <strong>❌ Terjadi kesalahan:</strong>
          <ul style="margin: 10px 0 0 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="download-wrapper">
        <a href="{{ route('template.kerjasama') }}" class="download-btn">
          📥 Download Template Excel
        </a>
      </div>

      <form action="{{ route('upload.kerjasama') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="upload-area" id="uploadArea">
          <div class="upload-icon">📁</div>
          <div class="upload-text">Drag & Drop file Excel di sini</div>
          <div class="upload-text" style="color: red;">*(laporan akhir kegiatan dan dokumen kontrak)</div>
          <div class="upload-subtext">atau klik untuk memilih file (.xls, .xlsx)</div>
          <input type="file" name="file" class="file-input" id="fileInput" accept=".xls,.xlsx" required>
        </div>
        <button type="submit" class="submit-btn">
          ☁️ Upload File
        </button>
      </form>

      <a href="{{ route('program.kerjasama') }}" class="back-btn">
        ⬅️ Kembali ke Program Kerjasama
      </a>
    </div>
  </div>
</body>
</html>


