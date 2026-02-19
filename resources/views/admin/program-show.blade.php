<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Program</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<!-- Modal Overlay -->
<div id="programModal" 
     class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl p-6 relative animate-fadeIn">
        <h2 class="text-xl font-bold mb-4 text-orange-600">📋 Detail Program</h2>

        <div id="programDetail" class="text-sm">
            <!-- Konten detail akan dimuat via AJAX -->
            <p class="text-gray-500">Memuat data...</p>
        </div>

        <!-- Tombol -->
        <div class="mt-6 flex justify-end gap-3">
            <button onclick="closeModal()" 
                class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">
                ✖ Tutup
            </button>
        </div>
    </div>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.3s ease-in-out;
}
</style>


            <!-- Tombol -->
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('daftar.program') }}" 
                   class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400 transition">
                   ✖ Tutup
                </a>
                <a href="{{ route('programs.edit', $program->id) }}" 
                   class="px-4 py-2 rounded-lg bg-orange-500 text-white hover:bg-orange-600 transition">
                   ✏️ Edit
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-in-out;
        }
    </style>

</body>
</html>
