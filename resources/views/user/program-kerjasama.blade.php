<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerjasama Nasional dan Internasional</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:15px; line-height:1.6;
        }
        .container{
            max-width:1200px;
            margin:0 auto;
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px);
            border-radius:20px;
            padding:20px;
            box-shadow:0 20px 40px rgba(255,140,0,.2),0 10px 20px rgba(0,0,0,.1),inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2);
            animation:fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn{0%{opacity:0;transform:scale(.95)}100%{opacity:1;transform:scale(1)}}
        
        .header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            flex-wrap:wrap;
            gap:15px;
        }
        .header h1{
            font-size:1.8rem;
            font-weight:700;
            background:linear-gradient(135deg,#ff9a56,#ff8c00);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
            background-clip:text;
        }
        .back-btn{
            padding:10px 20px;
            background:linear-gradient(135deg,#6b7280,#4b5563);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:0.95rem;
            font-weight:600;
            cursor:pointer;
            transition:all .3s ease;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:8px;
            animation:fadeSlideIn 0.8s ease;
            white-space:nowrap;
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
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 8px 24px rgba(0,0,0,.1);
            border: 1px solid rgba(255,255,255,.3);
            animation: fadeIn 1.2s ease-in-out;
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        .chart-header h2 {
            font-size: 1.3rem;
            font-weight: 700;
            background: linear-gradient(135deg,#0891b2,#0e7490);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .chart-controls {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        .chart-toggle {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .toggle-btn {
            padding: 8px 14px;
            background: rgba(8,145,178,.1);
            color: #0891b2;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            white-space: nowrap;
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
            gap: 8px;
            flex-wrap: wrap;
        }
        .year-filter-group label {
            font-weight: 600;
            font-size: 13px;
            color: #0891b2;
            white-space: nowrap;
        }
        .year-filter-select {
            padding: 8px 14px;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 13px;
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
            height: 350px;
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: inset 0 2px 8px rgba(0,0,0,.05);
        }
        .chart-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            margin-top: 20px;
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(8,145,178,.1), rgba(14,116,144,.1));
            border-radius: 12px;
            padding: 16px;
            border: 1px solid rgba(8,145,178,.2);
            transition: .3s;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(8,145,178,.2);
        }
        .stat-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 6px;
        }
        .stat-value {
            font-size: 20px;
            font-weight: 700;
            color: #0891b2;
            word-break: break-word;
        }
        .stat-subtitle {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .filter-section{
            background:rgba(255,255,255,.6);
            backdrop-filter:blur(5px);
            border-radius:12px;
            padding:15px;
            margin-bottom:20px;
            border:1px solid rgba(255,255,255,.3);
        }
        .filter-grid{
            display:grid;
            grid-template-columns:100px 1fr 1fr 2fr auto;
            gap:12px;
            align-items:end;
        }
        .filter-group{
            display:flex;
            flex-direction:column;
        }
        .filter-group label{
            font-weight:600;
            margin-bottom:6px;
            font-size:13px;
        }
        .filter-select,.filter-input{
            padding:9px 12px;
            border:2px solid #e1e5e9;
            border-radius:8px;
            font-size:13px;
            background:rgba(255,255,255,.9);
            transition:.3s;
        }
        .filter-select:focus,.filter-input:focus{
            outline:none;
            border-color:#0891b2;
            background:#fff;
            box-shadow:0 0 0 3px rgba(8,145,178,.1);
        }
        .search-btn{
            padding:9px 18px;
            background:linear-gradient(135deg,#0891b2,#0e7490);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:13px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
            white-space:nowrap;
        }
        .search-btn:hover{
            background:linear-gradient(135deg,#0e7490,#0891b2);
            transform:translateY(-1px);
        }
        
        .table-container{
            background:rgba(255,255,255,.8);
            border-radius:12px;
            overflow-x:auto;
            box-shadow:0 4px 15px rgba(0,0,0,.1);
            backdrop-filter:blur(5px);
        }
        .data-table{
            width:100%;
            border-collapse:collapse;
            font-size:13px;
            min-width:800px;
        }
        .data-table thead{
            background:linear-gradient(135deg,#0891b2,#0e7490);
        }
        .data-table th{
            color:#fff;
            padding:14px 10px;
            text-align:left;
            font-weight:600;
            font-size:12px;
            text-transform:uppercase;
            white-space:nowrap;
        }
        .data-table td{
            padding:12px 10px;
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
        .empty-state{
            text-align:center;
            padding:50px 20px;
            color:#666;
        }
        .alert{
            padding:12px 16px;
            border-radius:8px;
            margin-bottom:18px;
            font-weight:500;
            font-size:14px;
        }
        .alert-success{
            background:rgba(34,197,94,.1);
            color:#16a34a;
        }
        .alert-error{
            background:rgba(239,68,68,.1);
            color:#dc2626;
        }
        .modal{
            display:none;
            position:fixed;
            inset:0;
            background:rgba(0,0,0,.5);
            backdrop-filter:blur(6px);
            justify-content:center;
            align-items:center;
            z-index:1000;
            padding:15px;
        }
        .modal-content{
            background:#fff;
            padding:20px;
            border-radius:12px;
            max-width:600px;
            width:100%;
            max-height:90vh;
            overflow-y:auto;
            box-shadow:0 10px 30px rgba(0,0,0,.3);
            animation:fadeIn .3s ease;
        }
        .modal-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:15px;
        }
        .modal-header h2{
            font-size:1.2rem;
        }
        .close-btn{
            background:none;
            border:none;
            font-size:1.5rem;
            cursor:pointer;
            color:#666;
            transition:.3s;
        }
        .close-btn:hover{
            color:#dc2626;
        }
        #modalBody p{
            margin-bottom:10px;
            font-size:14px;
            line-height:1.6;
        }
        
        .pagination-wrapper {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }
        .pagination-info {
            color: #6b7280;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .container { padding: 25px; }
            .header h1 { font-size: 1.6rem; }
            .chart-container { height: 320px; }
            .filter-grid { 
                grid-template-columns: 90px 1fr 1fr 1.5fr auto;
                gap: 10px;
            }
        }

        @media (max-width: 768px) {
            body { padding: 10px; }
            .container { 
                padding: 18px; 
                border-radius: 15px;
            }
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .header h1 { 
                font-size: 1.4rem;
                width: 100%;
            }
            .back-btn {
                width: 100%;
                justify-content: center;
                padding: 10px 16px;
                font-size: 0.9rem;
            }
            
            .chart-section { padding: 15px; }
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .chart-header h2 { 
                font-size: 1.1rem;
                width: 100%;
            }
            .chart-controls {
                width: 100%;
                flex-direction: column;
                gap: 10px;
            }
            .year-filter-group,
            .chart-toggle {
                width: 100%;
            }
            .year-filter-select {
                flex: 1;
            }
            .chart-container { 
                height: 280px;
                padding: 10px;
            }
            .chart-stats { 
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .stat-value { font-size: 18px; }
            
            .filter-section { padding: 12px; }
            .filter-grid { 
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .search-btn {
                width: 100%;
                padding: 11px;
            }
            
            .table-container {
                border-radius: 10px;
            }
            .data-table {
                font-size: 12px;
            }
            .data-table th {
                padding: 12px 8px;
                font-size: 11px;
            }
            .data-table td {
                padding: 10px 8px;
            }
            
            .modal-content {
                padding: 18px;
                max-height: 85vh;
            }
            .modal-header h2 { font-size: 1.1rem; }
        }

        @media (max-width: 640px) {
            .container { 
                padding: 15px;
                border-radius: 12px;
            }
            .header h1 { font-size: 1.25rem; }
            .back-btn {
                font-size: 0.85rem;
                padding: 9px 14px;
            }
            
            .chart-section { padding: 12px; }
            .chart-header h2 { font-size: 1rem; }
            .toggle-btn {
                padding: 7px 12px;
                font-size: 12px;
            }
            .year-filter-group label { font-size: 12px; }
            .year-filter-select {
                font-size: 12px;
                padding: 7px 12px;
            }
            .chart-container { height: 250px; }
            .chart-stats { 
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .stat-card { padding: 14px; }
            .stat-value { font-size: 16px; }
            
            .filter-section { padding: 10px; }
            .filter-group label { font-size: 12px; }
            .filter-select, .filter-input {
                padding: 8px 10px;
                font-size: 12px;
            }
            .search-btn {
                padding: 10px;
                font-size: 12px;
            }
            
            .data-table {
                font-size: 11px;
            }
            .data-table th {
                padding: 10px 6px;
                font-size: 10px;
            }
            .data-table td {
                padding: 9px 6px;
            }
            .action-btn {
                padding: 5px 10px;
                font-size: 10px;
            }
            
            .alert {
                padding: 10px 12px;
                font-size: 12px;
            }
            
            .pagination-info { font-size: 12px; }
        }

        @media (max-width: 480px) {
            body { padding: 8px; }
            .container { 
                padding: 12px;
                border-radius: 10px;
            }
            .header h1 { 
                font-size: 1.1rem;
                line-height: 1.3;
            }
            .back-btn {
                font-size: 0.8rem;
                padding: 8px 12px;
                gap: 6px;
            }
            
            .chart-section { padding: 10px; }
            .chart-header h2 { font-size: 0.95rem; }
            .chart-controls { gap: 8px; }
            .toggle-btn {
                padding: 6px 10px;
                font-size: 11px;
            }
            .year-filter-group {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
            }
            .year-filter-select {
                width: 100%;
            }
            .chart-container { 
                height: 220px;
                padding: 8px;
            }
            .stat-card { padding: 12px; }
            .stat-label { font-size: 11px; }
            .stat-value { font-size: 15px; }
            .stat-subtitle { font-size: 10px; }
            
            .filter-section { padding: 8px; }
            .filter-group label { 
                font-size: 11px;
                margin-bottom: 4px;
            }
            .filter-select, .filter-input {
                padding: 7px 9px;
                font-size: 11px;
            }
            .search-btn {
                padding: 9px;
                font-size: 11px;
            }
            
            .data-table {
                font-size: 10px;
                min-width: 700px;
            }
            .data-table th {
                padding: 9px 5px;
                font-size: 9px;
            }
            .data-table td {
                padding: 8px 5px;
            }
            .action-btn {
                padding: 4px 8px;
                font-size: 9px;
            }
            
            .empty-state {
                padding: 35px 15px;
            }
            .empty-state h3 { font-size: 1rem; }
            .empty-state p { font-size: 0.85rem; }
            
            .modal { padding: 10px; }
            .modal-content {
                padding: 15px;
                border-radius: 10px;
            }
            .modal-header h2 { font-size: 1rem; }
            #modalBody p {
                font-size: 12px;
                margin-bottom: 8px;
            }
        }

        @media (max-width: 360px) {
            .container { padding: 10px; }
            .header h1 { font-size: 1rem; }
            .back-btn { font-size: 0.75rem; }
            .chart-header h2 { font-size: 0.9rem; }
            .toggle-btn { 
                padding: 5px 8px;
                font-size: 10px;
            }
            .chart-container { height: 200px; }
            .stat-value { font-size: 14px; }
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
        <div class="header">
            <h1>Daftar Kerjasama Nasional dan Internasional</h1>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="{{ route('user.dashboard') }}" class="back-btn">⬅ Kembali ke Dashboard</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">✔ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        <!-- Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2>📊 Grafik Jumlah Program per Tingkat</h2>
                <div class="chart-controls">
                    <div class="year-filter-group">
                        <label for="chartYearFilter">Sampai Tahun:</label>
                        <select id="chartYearFilter" class="year-filter-select" onchange="updateChartByYear()">
                            <option value="">Semua Tahun</option>
                            @isset($tahuns)
                                @foreach($tahuns as $year)
                                    <option value="{{ $year }}" {{ isset($chartYearFilter) && $chartYearFilter == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            @endisset
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
                <canvas id="kerjasamaChart"></canvas>
            </div>
            <div class="chart-stats">
                <div class="stat-card">
                    <div class="stat-label">Total Program</div>
                    <div class="stat-value" id="totalPrograms">0</div>
                    <div class="stat-subtitle">Semua tingkat</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Program Nasional</div>
                    <div class="stat-value" id="nasionalCount">0</div>
                    <div class="stat-subtitle">Program kerjasama</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Program Internasional</div>
                    <div class="stat-value" id="internasionalCount">0</div>
                    <div class="stat-subtitle">Program kerjasama</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Tingkat Dominan</div>
                    <div class="stat-value" id="dominantLevel">-</div>
                    <div class="stat-subtitle" id="dominantCount">0 program</div>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <form method="GET" action="{{ route('user.daftar.kerjasama') }}">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="per_page">Per Halaman</label>
                        <select name="per_page" id="per_page" class="filter-select">
                            <option value="10" {{ request('per_page') == '10' || !request('per_page') ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                            <option value="200" {{ request('per_page') == '200' ? 'selected' : '' }}>200</option>
                            <option value="500" {{ request('per_page') == '500' ? 'selected' : '' }}>500</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="filter-select">
                            <option value="">Semua Tingkat</option>
                            <option value="nasional" {{ request('tingkat') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="internasional" {{ request('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="filter-select">
                            <option value="">Semua Tahun</option>
                            @isset($tahuns)
                                @foreach($tahuns as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="search">Pencarian</label>
                        <input type="text" name="search" id="search" class="filter-input"
                               placeholder="Cari mitra kerjasama..." value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="search-btn">🔍 Filter</button>
                </div>
            </form>
        </div>

        <div class="table-container">
            @isset($programKerjasama)
                @forelse($programKerjasama as $program)
                    @if($loop->first)
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mitra Kerjasama</th>
                                    <th>Tahun</th>
                                    <th>Jangka Waktu</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Tingkat</th>
                                    <th></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                    <tr>
                        <td>{{ ($programKerjasama->currentPage() - 1) * $programKerjasama->perPage() + $loop->iteration }}</td>
                        <td>{{ $program->mitra_kerjasama }}</td>
                        <td>{{ $program->tahun }}</td>
                        <td>{{ $program->jangka_waktu }}</td>
                        <td>{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($program->tanggal_selesai)->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($program->tingkat) }}</td>
                        <td style="text-align:center;">
                            @if($program->file_path)
                               
                                
                            @else
                                <span style="color:#94a3b8;">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="javascript:void(0)" data-program='@json($program)'
                               onclick="openModal(this)" class="action-btn btn-view">👁</a>
                        </td>
                    </tr>
                    @if($loop->last)
                            </tbody>
                        </table>
                    @endif
                @empty
                    <div class="empty-state">
                        <h3>📋 Belum Ada Program Kerjasama</h3>
                        <p>Belum ada program kerjasama nasional maupun internasional yang terdaftar.</p>
                    </div>
                @endforelse
            @endisset
        </div>

        @if(isset($programKerjasama) && $programKerjasama->hasPages())
            <div class="pagination-wrapper">
                <span class="pagination-info">
                    Menampilkan {{ $programKerjasama->firstItem() }} sampai {{ $programKerjasama->lastItem() }} dari {{ $programKerjasama->total() }} hasil
                </span>
                {{ $programKerjasama->links('vendor.pagination.custom') }}
            </div>
        @endif
    </div>

    <div id="programModal" class="modal" onclick="if(event.target === this) closeModal()">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Program Kerjasama</h2>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>
            <div id="modalBody"></div>
        </div>
    </div>

    <script>
        // Chart data from Laravel
        const chartData = @json(isset($chartData) ? $chartData : []);
        let myChart = null;
        let currentChartType = 'bar';

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            if (chartData.length > 0) {
                renderChart();
                updateStats();
            }
        });

        // Render Chart
        function renderChart() {
            const labels = chartData.map(item => item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1));
            const counts = chartData.map(item => parseInt(item.jumlah_program));

            const ctx = document.getElementById('kerjasamaChart').getContext('2d');
            
            if (myChart) {
                myChart.destroy();
            }

            const colors = [
                'rgba(8, 145, 178, 0.7)',
                'rgba(255, 140, 0, 0.7)',
                'rgba(14, 116, 144, 0.7)',
                'rgba(6, 182, 212, 0.7)'
            ];

            const chartConfig = {
                type: currentChartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Program',
                        data: counts,
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
                                    return 'Jumlah: ' + value + ' program';
                                }
                            }
                        }
                    },
                    scales: currentChartType !== 'pie' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    return value + ' program';
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
            const totalPrograms = chartData.reduce((sum, item) => sum + parseInt(item.jumlah_program), 0);
            
            let nasionalCount = 0;
            let internasionalCount = 0;
            
            chartData.forEach(item => {
                if (item.tingkat === 'nasional') {
                    nasionalCount = parseInt(item.jumlah_program);
                } else if (item.tingkat === 'internasional') {
                    internasionalCount = parseInt(item.jumlah_program);
                }
            });

            let dominantLevel = '-';
            let dominantCount = 0;
            
            if (chartData.length > 0) {
                const dominant = chartData.reduce((max, item) => 
                    parseInt(item.jumlah_program) > parseInt(max.jumlah_program) ? item : max
                , chartData[0]);
                
                dominantLevel = dominant.tingkat.charAt(0).toUpperCase() + dominant.tingkat.slice(1);
                dominantCount = parseInt(dominant.jumlah_program);
            }

            document.getElementById('totalPrograms').textContent = totalPrograms;
            document.getElementById('nasionalCount').textContent = nasionalCount;
            document.getElementById('internasionalCount').textContent = internasionalCount;
            document.getElementById('dominantLevel').textContent = dominantLevel;
            document.getElementById('dominantCount').textContent = dominantCount + ' program';
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

        function openModal(element){
            const program = JSON.parse(element.getAttribute('data-program'));
            const tanggalMulai = new Date(program.tanggal_mulai).toLocaleDateString('id-ID', {day: '2-digit', month: '2-digit', year: 'numeric'});
            const tanggalSelesai = new Date(program.tanggal_selesai).toLocaleDateString('id-ID', {day: '2-digit', month: '2-digit', year: 'numeric'});
            
            let fileDisplay = '';
            if (program.file_path) {
                const fileName = program.file_path.split('/').pop();
                fileDisplay = `<p><b>File:</b> <a href="/storage/${program.file_path}" target="_blank" style="color:#0891b2;text-decoration:underline;">📄 ${fileName}</a></p>`;
            } else {
                fileDisplay = '<p><b>File:</b> <span style="color:#94a3b8;">Tidak ada file</span></p>';
            }
            
            let body = `
                <p><b>Mitra Kerjasama:</b> ${program.mitra_kerjasama}</p>
                <p><b>Tahun:</b> ${program.tahun}</p>
                <p><b>Jangka Waktu:</b> ${program.jangka_waktu}</p>
                <p><b>Tanggal Mulai:</b> ${tanggalMulai}</p>
                <p><b>Tanggal Selesai:</b> ${tanggalSelesai}</p>
                <p><b>Tingkat:</b> ${program.tingkat.charAt(0).toUpperCase() + program.tingkat.slice(1)}</p>
                ${fileDisplay}`;
            document.getElementById('modalBody').innerHTML = body;
            document.getElementById('programModal').style.display = 'flex';
        }

        function closeModal(){ document.getElementById('programModal').style.display='none'; }

        function openEditModal(element){
            const program = JSON.parse(element.getAttribute('data-program'));
            document.getElementById('editForm').action = `/program-kerjasama/${program.id}`;
            document.getElementById('editMitra').value = program.mitra_kerjasama;
            document.getElementById('editTahun').value = program.tahun;
            document.getElementById('editJangkaWaktu').value = program.jangka_waktu;
            document.getElementById('editTanggalMulai').value = program.tanggal_mulai.split(' ')[0];
            document.getElementById('editTanggalSelesai').value = program.tanggal_selesai.split(' ')[0];
            document.getElementById('editTingkat').value = program.tingkat;
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal(){ document.getElementById('editModal').style.display='none'; }
    </script>
</body>
</html>


