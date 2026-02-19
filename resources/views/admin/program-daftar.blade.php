<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Penelitian dan Pengabdian</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:20px; line-height:1.6;
        }
        .container{
            max-width:1200px;
            margin:0 auto;
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px);
            border-radius:20px;
            padding:40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2),0 10px 20px rgba(0,0,0,.1),inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2);
            animation:fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn{0%{opacity:0;transform:scale(.95)}100%{opacity:1;transform:scale(1)}}
        
        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
            flex-wrap:wrap;
            gap:15px;
        }
        .header h1{
            font-size:2rem;
            font-weight:700;
            background:linear-gradient(135deg,#ff9a56,#ff8c00);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
            background-clip:text;
        }
        .button-group {
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }
        .tambah-btn{
            padding:12px 24px;
            background:linear-gradient(135deg,#ff9a56,#ff8c00);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:1rem;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:8px;
        }
        .tambah-btn:hover{
            background:linear-gradient(135deg,#ff8c00,#ff9a56);
            transform:translateY(-2px);
        }
        .back-btn{
            padding:12px 24px;
            background:linear-gradient(135deg,#6b7280,#4b5563);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:1rem;
            font-weight:600;
            cursor:pointer;
            transition:all .3s ease;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:8px;
            animation:fadeSlideIn 0.8s ease;
        }
        .back-btn:hover{
            background:linear-gradient(135deg,#4b5563,#6b7280);
            transform:translateX(-6px);
            box-shadow:0 4px 12px rgba(0,0,0,.2);
        }
        @keyframes fadeSlideIn {
            0% {opacity:0; transform:translateX(-20px);}
            100% {opacity:1; transform:translateX(0);}
        }

        /* Chart Section */
        .chart-section {
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 24px rgba(0,0,0,.1);
            border: 1px solid rgba(255,255,255,.3);
            animation: fadeIn 1.2s ease-in-out;
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        .chart-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg,#0891b2,#0e7490);
            -webkit-background-clip: text;
            -webkit-text-fill-color:transparent;
            background-clip:text;
        }
        .chart-controls {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        .chart-toggle {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .toggle-btn {
            padding: 8px 16px;
            background: rgba(8,145,178,.1);
            color: #0891b2;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }
        .toggle-btn:hover {
            background: #0891b2;
            color: #fff;
            transform: translateY(-2px);
        }
        .toggle-btn.active {
            background: linear-gradient(135deg,#0891b2,#0e7490);
            color: #fff;
            border-color: #0891b2;
        }
        .year-filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .year-filter-group label {
            font-weight: 600;
            font-size: 14px;
            color: #0891b2;
            white-space: nowrap;
        }
        .year-filter-select {
            padding: 8px 16px;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 14px;
            background: rgba(255,255,255,.9);
            transition: .3s;
            cursor: pointer;
            min-width: 120px;
        }
        .year-filter-select:focus {
            outline: none;
            border-color: #0891b2;
            box-shadow: 0 0 0 3px rgba(8,145,178,.1);
        }
        .chart-container {
            position: relative;
            height: 400px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: inset 0 2px 8px rgba(0,0,0,.05);
        }
        .chart-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(8,145,178,.1), rgba(14,116,144,.1));
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(8,145,178,.2);
            transition: .3s;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(8,145,178,.2);
        }
        .stat-label {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #0891b2;
            word-break: break-word;
        }
        .stat-subtitle {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        /* Filter Section */
        .filter-section{
            background:rgba(255,255,255,.6);
            backdrop-filter:blur(5px);
            border-radius:12px;
            padding:20px;
            margin-bottom:25px;
            border:1px solid rgba(255,255,255,.3);
        }
        .filter-grid{
            display:grid;
            grid-template-columns:120px 1fr 1fr 2fr auto;
            gap:15px;
            align-items:end;
        }
        .filter-group{
            display:flex;
            flex-direction:column;
        }
        .filter-group label{
            font-weight:600;
            margin-bottom:6px;
            font-size:14px;
        }
        .filter-select,.filter-input{
            padding:10px 12px;
            border:2px solid #e1e5e9;
            border-radius:8px;
            font-size:14px;
            background:rgba(255,255,255,.9);
            transition:.3s;
            width: 100%;
        }
        .filter-select:focus,.filter-input:focus{
            outline:none;
            border-color:#0891b2;
            background:#fff;
            box-shadow:0 0 0 3px rgba(8,145,178,.1);
        }
        .search-btn{
            padding:10px 20px;
            background:linear-gradient(135deg,#0891b2,#0e7490);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
            white-space: nowrap;
        }
        .search-btn:hover{
            background:linear-gradient(135deg,#0e7490,#0891b2);
            transform:translateY(-1px);
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        .table-container{
            background:rgba(255,255,255,.8);
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(0,0,0,.1);
            backdrop-filter:blur(5px);
        }
        .data-table{
            width:100%;
            border-collapse:collapse;
            font-size:14px;
            min-width: 800px;
        }
        .data-table thead{
            background:linear-gradient(135deg,#0891b2,#0e7490);
        }
        .data-table th{
            color:#fff;
            padding:16px 12px;
            text-align:left;
            font-weight:600;
            font-size:13px;
            text-transform:uppercase;
            white-space: nowrap;
        }
        .data-table td{
            padding:14px 12px;
            border-bottom:1px solid rgba(0,0,0,.06);
            transition:.3s;
            vertical-align:middle;
        }
        .data-table tbody tr:hover{
            background:rgba(8,145,178,.05);
            transform:translateX(2px);
        }
        .action-btn{
            padding:6px 12px;
            border:none;
            border-radius:6px;
            font-size:11px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
            margin-right:6px;
            text-decoration:none;
            display:inline-block;
            white-space: nowrap;
        }
        .btn-view{
            background:rgba(8,145,178,.1);
            color:#0891b2;
            border:1px solid rgba(8,145,178,.2);
        }
        .btn-view:hover{
            background:#0891b2;
            color:#fff;
        }
        .btn-edit{
            background:rgba(245,158,11,.1);
            color:#d97706;
            border:1px solid rgba(245,158,11,.2);
        }
        .btn-edit:hover{
            background:#d97706;
            color:#fff;
        }
        .btn-delete{
            background:rgba(239,68,68,.1);
            color:#dc2626;
            border:1px solid rgba(239,68,68,.2);
        }
        .btn-delete:hover{
            background:#dc2626;
            color:#fff;
        }
        .empty-state{
            text-align:center;
            padding:60px 20px;
            color:#666;
        }

        /* Modal */
        .modal{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.5);
            backdrop-filter:blur(6px);
            justify-content:center;
            align-items:center;
            z-index:1000;
            padding: 20px;
        }
        .modal-content{
            background:#fff;
            padding:25px;
            border-radius:12px;
            max-width:600px;
            width:90%;
            box-shadow:0 10px 30px rgba(0,0,0,.3);
            animation:fadeIn .3s ease;
            max-height: 90vh;
            overflow-y: auto;
        }
        .modal-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:15px;
        }
        .modal-header h2{
            font-size:1.3rem;
        }
        .close-btn{
            background:none;
            border:none;
            font-size:1.5rem;
            cursor:pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #modalBody p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .container {
                padding: 30px 25px;
            }
            .header h1 {
                font-size: 1.7rem;
            }
            .chart-header h2 {
                font-size: 1.3rem;
            }
            .chart-container {
                height: 350px;
            }
            .stat-value {
                font-size: 20px;
            }
        }

        /* Mobile Landscape & Small Tablets */
        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
            .container {
                padding: 25px 20px;
                border-radius: 16px;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .header h1 {
                font-size: 1.5rem;
            }
            .button-group {
                width: 100%;
                justify-content: flex-start;
            }
            .tambah-btn, .back-btn {
                padding: 10px 18px;
                font-size: 0.9rem;
            }
            
            /* Chart */
            .chart-section {
                padding: 20px 15px;
            }
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .chart-header h2 {
                font-size: 1.2rem;
            }
            .chart-controls {
                width: 100%;
                flex-direction: column;
                align-items: stretch;
            }
            .year-filter-group {
                width: 100%;
                justify-content: space-between;
            }
            .year-filter-select {
                flex: 1;
                max-width: 200px;
            }
            .chart-toggle {
                width: 100%;
            }
            .toggle-btn {
                flex: 1;
                padding: 8px 12px;
                font-size: 13px;
            }
            .chart-container {
                height: 300px;
                padding: 15px;
            }
            .chart-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            .stat-card {
                padding: 15px;
            }
            .stat-value {
                font-size: 18px;
            }
            
            /* Filter */
            .filter-section {
                padding: 15px;
            }
            .filter-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .search-btn {
                width: 100%;
            }
            
            /* Table */
            .table-wrapper {
                margin: 0 -20px;
                padding: 0 20px;
            }
        }

        /* Mobile Portrait */
        @media (max-width: 480px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 20px 15px;
            }
            .header h1 {
                font-size: 1.3rem;
                line-height: 1.3;
            }
            .tambah-btn, .back-btn {
                padding: 9px 16px;
                font-size: 0.85rem;
                gap: 6px;
            }
            
            /* Chart */
            .chart-section {
                padding: 15px 12px;
            }
            .chart-header h2 {
                font-size: 1.1rem;
            }
            .year-filter-group label {
                font-size: 13px;
            }
            .year-filter-select {
                font-size: 13px;
                padding: 7px 12px;
            }
            .toggle-btn {
                font-size: 12px;
                padding: 7px 10px;
            }
            .chart-container {
                height: 250px;
                padding: 12px;
            }
            .chart-stats {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .stat-card {
                padding: 12px;
            }
            .stat-label {
                font-size: 12px;
            }
            .stat-value {
                font-size: 16px;
            }
            .stat-subtitle {
                font-size: 11px;
            }
            
            /* Filter */
            .filter-section {
                padding: 12px;
            }
            .filter-group label {
                font-size: 13px;
            }
            .filter-select, .filter-input {
                padding: 9px 10px;
                font-size: 13px;
            }
            .search-btn {
                padding: 9px 16px;
                font-size: 13px;
            }
            
            /* Table */
            .table-wrapper {
                margin: 0 -15px;
                padding: 0 15px;
            }
            .data-table {
                font-size: 12px;
            }
            .data-table th {
                padding: 12px 8px;
                font-size: 11px;
            }
            .data-table td {
                padding: 12px 8px;
            }
            .action-btn {
                padding: 5px 10px;
                font-size: 10px;
                margin-right: 4px;
                margin-bottom: 4px;
            }
            
            /* Modal */
            .modal-content {
                padding: 20px 15px;
            }
            .modal-header h2 {
                font-size: 1.1rem;
            }
            #modalBody {
                font-size: 13px;
            }
            #modalBody p {
                margin-bottom: 8px;
            }
        }

        /* Extra Small Devices */
        @media (max-width: 360px) {
            .container {
                padding: 15px 12px;
            }
            .header h1 {
                font-size: 1.2rem;
            }
            .tambah-btn, .back-btn {
                padding: 8px 14px;
                font-size: 0.8rem;
            }
            .chart-section {
                padding: 12px 10px;
            }
            .chart-header h2 {
                font-size: 1rem;
            }
            .chart-container {
                height: 220px;
            }
        }

        /* Landscape Mobile */
        @media (max-height: 500px) and (orientation: landscape) {
            .chart-container {
                height: 200px;
            }
            .chart-stats {
                grid-template-columns: repeat(4, 1fr);
            }
            .stat-card {
                padding: 10px;
            }
            .stat-value {
                font-size: 16px;
            }
        }

        /* Pagination Styles */
        .pagination-wrapper {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        .pagination-info {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Daftar Program Penelitian dan Pengabdian</h1>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <button onclick="history.back()" class="back-btn">⬅ Back</button>
                <a href="{{ route('input.program') }}" class="tambah-btn">+ Tambah Program</a>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2>📊 Grafik Pendapatan Dana per Skema</h2>
                <div class="chart-controls">
                    <div class="year-filter-group">
                        <label for="chartYearFilter">Sampai Tahun:</label>
                        <select id="chartYearFilter" class="year-filter-select" onchange="updateChartByYear()">
                            <option value="">Semua Tahun</option>
                            @foreach($tahuns as $year)
                                <option value="{{ $year }}" {{ $chartYearFilter == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="chart-toggle">
                        <button class="toggle-btn active" onclick="changeChartType('bar')">Bar Chart</button>
                        <button class="toggle-btn" onclick="changeChartType('line')">Line Chart</button>
                        <button class="toggle-btn" onclick="changeChartType('pie')">Pie Chart</button>
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="danaChart"></canvas>
            </div>
            <div class="chart-stats">
                <div class="stat-card">
                    <div class="stat-label">Total Dana</div>
                    <div class="stat-value" id="totalDana">Rp 0</div>
                    <div class="stat-subtitle">Berdasarkan filter</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Rata-rata per Skema</div>
                    <div class="stat-value" id="averageDana">Rp 0</div>
                    <div class="stat-subtitle">Berdasarkan data tersedia</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Skema Tertinggi</div>
                    <div class="stat-value" id="highestSkema">-</div>
                    <div class="stat-subtitle" id="highestAmount">Rp 0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Total Program</div>
                    <div class="stat-value" id="totalPrograms">{{ $programs->total() }}</div>
                    <div class="stat-subtitle">Program terdaftar</div>
                </div>
            </div>
        </div>

        <!-- Filter -->
        <div class="filter-section">
            <form method="GET">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="per_page">Per Halaman</label>
                        <select name="per_page" id="per_page" class="filter-select">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                            <option value="500" {{ request('per_page', 500) == 500 ? 'selected' : '' }}>500</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="skema">Skema</label>
                        <select name="skema" id="skema" class="filter-select">
                            <option value="">Semua Skema</option>
                            @foreach($skemas as $s)
                                <option value="{{ $s }}" {{ request('skema') == $s ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="filter-select">
                            <option value="">Semua Tahun</option>
                            @foreach($tahuns as $t)
                                <option value="{{ $t }}" {{ request('tahun') == $t ? 'selected' : '' }}>
                                    {{ $t }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="search">Pencarian</label>
                        <input type="text" name="search" id="search" class="filter-input"
                               value="{{ request('search') }}"
                               placeholder="Cari judul, ketua, atau kata kunci...">
                    </div>
                    <button type="submit" class="search-btn">🔍 Filter</button>
                </div>
            </form>
        </div>

        <!-- Tabel -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Kategori</th>
                        <th>Skema</th>
                        <th>Judul</th>
                        <th>Ketua</th>
                        <th>Dana</th>
                        <th>Anggota</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $index => $program)
                        <tr>
                            <td>{{ $programs->firstItem() + $index }}</td>
                            <td>{{ $program->tahun }}</td>
                            <td>{{ $program->kategori }}</td>
                            <td>{{ $program->skema }}</td>
                            <td>{{ Str::limit($program->judul, 60) }}</td>
                            <td>{{ $program->ketua }}</td>
                            <td style="color:#059669;font-weight:600;">Rp {{ number_format($program->dana, 0, ',', '.') }}</td>
                            <td>{{ $program->anggota ?? '-' }}</td>
                            <td style="text-align:center;">
                                @if($program->file_path)
                                    <a href="{{ asset('storage/' . $program->file_path) }}" target="_blank" class="action-btn btn-view" title="Lihat File">
                                        📄
                                    </a>
                                @else
                                    <span style="color:#94a3b8;">-</span>
                                @endif
                            </td>
                            <td>
                                <button onclick='openModal(@json($program))' class="action-btn btn-view">👁</button>
                                <a href="{{ route('programs.edit', $program->id) }}" class="action-btn btn-edit">✏️</a>
                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus program ini? File terkait juga akan dihapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="empty-state">
                                <h3>📋 Belum Ada Program</h3>
                                <p>Belum ada program penelitian atau pengabdian yang terdaftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($programs->hasPages())
        <div class="pagination-wrapper">
            <span class="pagination-info">
                Menampilkan {{ $programs->firstItem() }} sampai {{ $programs->lastItem() }} dari {{ $programs->total() }} hasil
            </span>
            {{ $programs->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>

    <!-- Modal Detail -->
    <div id="programModal" class="modal" onclick="if(event.target === this) closeModal()">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Program</h2>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>
            <div id="modalBody"></div>
        </div>
    </div>

    <script>
        // Chart data from Laravel
        const chartData = @json($chartData);
        let myChart = null;
        let currentChartType = 'bar';

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderChart();
            updateStats();
        });

        // Render Chart
        function renderChart() {
            const labels = chartData.map(item => item.skema);
            const amounts = chartData.map(item => parseFloat(item.total_dana));

            const ctx = document.getElementById('danaChart').getContext('2d');
            
            if (myChart) {
                myChart.destroy();
            }

            const colors = [
                'rgba(8, 145, 178, 0.7)',
                'rgba(14, 116, 144, 0.7)',
                'rgba(6, 182, 212, 0.7)',
                'rgba(34, 211, 238, 0.7)',
                'rgba(103, 232, 249, 0.7)',
                'rgba(255, 140, 0, 0.7)',
                'rgba(255, 154, 86, 0.7)'
            ];

            const chartConfig = {
                type: currentChartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Dana (Rp)',
                        data: amounts,
                        backgroundColor: currentChartType === 'pie' ? colors : colors[0],
                        borderColor: '#0891b2',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: currentChartType === 'line'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: currentChartType === 'pie',
                            position: 'right'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const value = context.parsed.y || context.parsed;
                                    return 'Dana: Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: currentChartType !== 'pie' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000).toFixed(0) + 'M';
                                }
                            }
                        }
                    } : {}
                }
            };

            myChart = new Chart(ctx, chartConfig);
        }

        // Update Statistics
        function updateStats() {
            const totalDana = chartData.reduce((sum, item) => sum + parseFloat(item.total_dana), 0);
            const avgDana = chartData.length > 0 ? totalDana / chartData.length : 0;
            
            let highestSkema = '-';
            let highestAmount = 0;
            
            if (chartData.length > 0) {
                const highest = chartData.reduce((max, item) => 
                    parseFloat(item.total_dana) > parseFloat(max.total_dana) ? item : max
                , chartData[0]);
                
                highestSkema = highest.skema;
                highestAmount = parseFloat(highest.total_dana);
            }

            document.getElementById('totalDana').textContent = 'Rp ' + totalDana.toLocaleString('id-ID');
            document.getElementById('averageDana').textContent = 'Rp ' + Math.round(avgDana).toLocaleString('id-ID');
            document.getElementById('highestSkema').textContent = highestSkema;
            document.getElementById('highestAmount').textContent = 'Rp ' + highestAmount.toLocaleString('id-ID');
        }

        // Change Chart Type
        function changeChartType(type) {
            currentChartType = type;
            document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            renderChart();
        }

        // Update chart by year filter
        function updateChartByYear() {
            const year = document.getElementById('chartYearFilter').value;
            const url = new URL(window.location.href);
            
            if (year) {
                url.searchParams.set('chart_tahun', year);
            } else {
                url.searchParams.delete('chart_tahun');
            }
            
            window.location.href = url.toString();
        }

        // Modal Functions
        function openModal(program) {
            const body = `
                <p><b>Judul:</b> ${program.judul}</p>
                <p><b>Ketua:</b> ${program.ketua}</p>
                <p><b>Anggota:</b> ${program.anggota || '-'}</p>
                <p><b>Tahun:</b> ${program.tahun}</p>
                <p><b>Kategori:</b> ${program.kategori}</p>
                <p><b>Skema:</b> ${program.skema}</p>
                <p><b>Dana:</b> Rp ${parseFloat(program.dana).toLocaleString('id-ID')}</p>`;
            document.getElementById('modalBody').innerHTML = body;
            document.getElementById('programModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('programModal').style.display = 'none';
        }

        function editProgram(id) {
            alert('Edit program ID: ' + id);
            // Implement edit functionality
        }

        function deleteProgram(id) {
            if (confirm('Hapus program ini?')) {
                // Implement delete functionality
                window.location.href = `/program/${id}/delete`;
            }
        }
    </script>
</body>
</html>
