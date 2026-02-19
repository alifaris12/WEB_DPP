// resources/js/popup.js

document.addEventListener('DOMContentLoaded', function () {
    // Menampilkan modal dengan informasi detail saat tombol "Lihat" diklik
    const lihatButtons = document.querySelectorAll('.btn-view');
    
    lihatButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const programId = this.dataset.programId;

            // Kirim permintaan AJAX untuk mendapatkan detail program berdasarkan ID
            fetch(`/programs/${programId}`)
                .then(response => response.json())
                .then(data => {
                    // Mengisi modal dengan detail program
                    document.getElementById('programTitle').textContent = data.judul;
                    document.getElementById('programKetua').textContent = data.ketua;
                    document.getElementById('programTahun').textContent = data.tahun;
                    document.getElementById('programJangkaWaktu').textContent = data.jangka_waktu;
                    document.getElementById('programTanggalMulai').textContent = data.tanggal_mulai;
                    document.getElementById('programTanggalSelesai').textContent = data.tanggal_selesai;
                    document.getElementById('programTingkat').textContent = data.tingkat;

                    // Menampilkan modal
                    document.getElementById('programModal').style.display = 'block';
                })
                .catch(error => console.error('Error fetching program details:', error));
        });
    });

    // Menutup modal saat mengklik di luar konten modal
    document.getElementById('programModal').addEventListener('click', function (e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });
});
