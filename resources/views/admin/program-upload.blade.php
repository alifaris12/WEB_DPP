<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Excel</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
      position: relative;
      overflow: hidden;
    }

    /* Background Shapes (responsive) */
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
      padding: 30px 20px;
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
      margin-bottom: 25px;
    }
    .title {
      color: #1e3a8a;
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 8px;
      text-shadow: 2px 2px 4px rgba(255,255,255,0.6);
    }
    .subtitle {
      color: rgba(30, 58, 138, 0.8);
      font-size: 13px;
      padding: 0 10px;
    }

    /* Download Button */
    .download-wrapper {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .download-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      color: white;
      padding: 12px 20px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);
      width: 100%;
      max-width: 280px;
    }
    .download-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(37, 99, 235, 0.6);
    }

    /* Upload Area */
    .upload-area {
      border: 2px dashed rgba(255,255,255,0.3);
      border-radius: 15px;
      padding: 30px 15px;
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
      font-size: 40px;
      color: #2563eb;
      margin-bottom: 12px;
    }
    .upload-text { 
      color: #1e3a8a; 
      font-size: 15px; 
      margin-bottom: 8px;
      font-weight: 600;
    }
    .upload-subtext { 
      color: rgba(30,58,138,0.7); 
      font-size: 13px;
      padding: 0 10px;
    }
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
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 20px;
      width: 100%;
      box-shadow: 0 4px 15px rgba(59,130,246,0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .submit-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(29,78,216,0.4);
    }
    .submit-btn:active {
      transform: translateY(0);
    }

    /* Back Button */
    .back-btn {
      display: inline-block;
      text-align: center;
      margin-top: 12px;
      width: 100%;
      background: linear-gradient(135deg, #6b7280 0%, #374151 100%);
      color: white;
      padding: 12px 24px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      box-shadow: 0 4px 15px rgba(107,114,128,0.3);
      transition: all 0.3s ease;
    }
    .back-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(55,65,81,0.5);
    }
    .back-btn:active {
      transform: translateY(0);
    }

    /* Tablet Responsiveness */
    @media (min-width: 481px) and (max-width: 768px) {
      .glass-card {
        padding: 35px 25px;
      }
      .title {
        font-size: 26px;
      }
      .subtitle {
        font-size: 14px;
      }
      .upload-icon {
        font-size: 44px;
      }
      .upload-area {
        padding: 35px 20px;
      }
    }

    /* Desktop Responsiveness */
    @media (min-width: 769px) {
      body {
        padding: 20px;
      }
      .glass-card {
        padding: 40px;
      }
      .title {
        font-size: 28px;
      }
      .subtitle {
        font-size: 14px;
      }
      .header {
        margin-bottom: 30px;
      }
      .download-wrapper {
        margin-bottom: 25px;
      }
      .download-btn {
        font-size: 15px;
        padding: 12px 24px;
        max-width: 300px;
      }
      .upload-area {
        padding: 40px 20px;
      }
      .upload-icon {
        font-size: 48px;
      }
      .upload-text {
        font-size: 16px;
      }
      .upload-subtext {
        font-size: 14px;
      }
      .submit-btn {
        font-size: 16px;
        margin-top: 25px;
        gap: 10px;
      }
      .back-btn {
        margin-top: 15px;
        font-size: 15px;
      }
    }

    /* Mobile Small Devices */
    @media (max-width: 360px) {
      .glass-card {
        padding: 25px 15px;
      }
      .title {
        font-size: 22px;
      }
      .subtitle {
        font-size: 12px;
      }
      .download-btn {
        font-size: 13px;
        padding: 10px 16px;
      }
      .upload-area {
        padding: 25px 12px;
      }
      .upload-icon {
        font-size: 36px;
      }
      .upload-text {
        font-size: 14px;
      }
      .upload-subtext {
        font-size: 12px;
      }
      .submit-btn {
        font-size: 14px;
        padding: 12px 24px;
      }
      .back-btn {
        font-size: 13px;
        padding: 10px 20px;
      }
    }

    /* Background Shapes Mobile Adjustment */
    @media (max-width: 480px) {
      .shape1 {
        width: 200px;
        height: 200px;
        top: -80px;
        left: -80px;
      }
      .shape2 {
        width: 180px;
        height: 180px;
        bottom: -90px;
        right: -90px;
      }
      .shape3 {
        width: 150px;
        height: 150px;
      }
    }

    /* Landscape Mobile Orientation */
    @media (max-height: 500px) and (orientation: landscape) {
      body {
        padding: 10px;
        align-items: flex-start;
      }
      .glass-card {
        padding: 20px 15px;
      }
      .header {
        margin-bottom: 15px;
      }
      .download-wrapper {
        margin-bottom: 15px;
      }
      .upload-area {
        padding: 20px 15px;
      }
      .upload-icon {
        font-size: 32px;
        margin-bottom: 8px;
      }
      .submit-btn {
        margin-top: 15px;
        padding: 10px 24px;
      }
      .back-btn {
        margin-top: 10px;
        padding: 10px 20px;
      }
    }
  </style>
</head>
<body>
  <!-- Background Shapes -->
  <div class="bg-shape shape1"></div>
  <div class="bg-shape shape2"></div>
  <div class="bg-shape shape3"></div>

  <!-- Main Container -->
  <div class="container">
    <div class="glass-card">
      <div class="header">
        <h1 class="title">Upload Excel</h1>
        <p class="subtitle">Upload file Excel untuk menambahkan data program</p>
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

      <!-- Download Template Button (centered) -->
      <div class="download-wrapper">
        <a href="{{ route('programs.template') }}" class="download-btn">
          📥 Download Template Excel
        </a>
      </div>

      <!-- Upload Form -->
      <form action="{{ route('programs.upload') }}" method="POST" enctype="multipart/form-data">
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

      <!-- Tombol Kembali -->
      <a href="{{ url('/program-penelitian') }}" class="back-btn">
        ⬅️ Kembali ke Program Penelitian
      </a>
    </div>
  </div>

  <script>
    // Optional: Show file name when selected
    const fileInput = document.getElementById('fileInput');
    const uploadArea = document.getElementById('uploadArea');

    fileInput.addEventListener('change', function(e) {
      if (e.target.files.length > 0) {
        const fileName = e.target.files[0].name;
        const uploadText = uploadArea.querySelector('.upload-text');
        uploadText.textContent = `File dipilih: ${fileName}`;
        uploadText.style.color = '#1d4ed8';
        uploadText.style.fontWeight = '700';
      }
    });

    // Drag and drop feedback
    uploadArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      uploadArea.style.borderColor = '#1d4ed8';
      uploadArea.style.background = 'rgba(59,130,246,0.25)';
    });

    uploadArea.addEventListener('dragleave', function(e) {
      uploadArea.style.borderColor = 'rgba(255,255,255,0.3)';
      uploadArea.style.background = 'rgba(255,255,255,0.2)';
    });

    uploadArea.addEventListener('drop', function(e) {
      uploadArea.style.borderColor = 'rgba(255,255,255,0.3)';
      uploadArea.style.background = 'rgba(255,255,255,0.2)';
    });
  </script>
</body>
</html>