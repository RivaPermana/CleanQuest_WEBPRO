$(document).ready(function() {
    // Memperbarui tampilan poin dan memuat voucher saat halaman siap
    updatePointsDisplay();
    loadVoucher();
});

// Menampilkan section yang dipilih
function showSection(sectionId) {
    // Menghapus kelas 'active' dari semua tab dan konten
    $('.tab, .tab-content').removeClass('active');

    // Menambahkan kelas 'active' ke tab dan konten yang dipilih
    $(`button[onclick="showSection('${sectionId}')"]`).addClass('active');
    $(`#${sectionId}`).addClass('active');
}

// Memuat data voucher dari file JSON
function loadVoucher() { 
    $.getJSON("js/voucher.json", function(data) { 
        if (data.voucher && data.voucher.length > 0) { 
            displayVoucher(data.voucher); 
        } else { 
            alert("Tidak ada voucher yang ditemukan!"); 
        } 
    }).fail(function() { 
        alert("Gagal memuat data voucher."); 
    }); 
}

// Menampilkan voucher pada halaman
function displayVoucher(vouchers) {
    const voucherList = $("#voucher-grid");
    voucherList.empty();

    vouchers.forEach(function(voucher) {
        const voucherCard = `
        <a href="Detail.html" class="voucher-link">
            <div class="voucher-card">
                <img src="${voucher.img}" alt="${voucher.nama}">
                <h3>${voucher.nama}</h3>
                <p>${voucher.poin} Poin</p>
            </div>
        </a>`;
        voucherList.append(voucherCard);
    });
}

// Fungsi untuk menukarkan voucher
function redeemVoucher(poin) {
    if (currentPoints >= poin) {
        currentPoints -= poin;
        updatePointsDisplay();
        alert("Voucher berhasil ditukar!");
    } else {
        alert("Poin tidak mencukupi untuk menukarkan voucher ini.");
    }
}

// Memilih atau membatalkan pilihan wallet
function selectWallet(button) {
    const walletButtons = document.getElementsByClassName('wallet-btn');

    // Cek apakah tombol wallet yang diklik sudah dalam keadaan dipilih
    if (button.classList.contains("selected")) {
        button.classList.remove("selected");
    } else {
        // Hapus kelas 'selected' dari semua tombol wallet dan tambahkan ke tombol yang diklik
        Array.from(walletButtons).forEach(btn => btn.classList.remove("selected"));
        button.classList.add("selected");
    }
}

// Memilih atau membatalkan pilihan nominal poin
function selectAmount(button) {
    const customAmountInput = document.getElementById("custom-amount");
    const amountButtons = document.getElementsByClassName("points-option-btn");

    // Cek apakah tombol poin nominal sudah dipilih, jika ya, hapus
    if (button.classList.contains("selected")) {
        button.classList.remove("selected");
        customAmountInput.value = "";
    } else {
        // Hapus kelas 'selected' dari semua tombol poin dan tambahkan ke tombol yang diklik
        Array.from(amountButtons).forEach(btn => btn.classList.remove("selected"));
        button.classList.add("selected");

        // Ambil jumlah nominal dari data atribut dan isi ke input kustom
        const amount = button.getAttribute("data-amount");
        customAmountInput.value = amount;
    }
}

// Menetapkan poin awal
let currentPoints = 10000; // Poin awal yang ditampilkan

// Menampilkan poin saat ini di bagian atas
function updatePointsDisplay() {
    const pointsElement = document.getElementsByClassName('points')[0];
    if (pointsElement) {
        pointsElement.textContent = `${currentPoints.toLocaleString()} Poin ⭐`;
    }
}

// Mengonfirmasi penukaran poin
function confirmExchange() {
    const selectedWallet = document.getElementsByClassName("wallet-btn selected")[0];
    if (!selectedWallet) {
        alert("Tolong pilih jenis e-Wallet terlebih dahulu.");
        return;
    }

    const selectedAmountButton = document.getElementsByClassName("points-option-btn selected")[0];
    let selectedAmount = 0;

    if (selectedAmountButton) {
        selectedAmount = parseInt(selectedAmountButton.getAttribute("data-amount"), 10);
    } else {
        const customAmount = document.getElementById("custom-amount").value.replace(/[^\d]/g, "");
        selectedAmount = parseInt(customAmount, 10) || 0;
    }

    if (selectedAmount < 5000) {
        alert("Nominal penukaran harus minimal Rp 5.000.");
        return;
    }

    const requiredPoints = selectedAmount / 10;
    if (currentPoints < requiredPoints) {
        alert("Poin tidak mencukupi untuk penukaran.");
        return;
    }

    // Tampilkan modal untuk memasukkan nomor telepon
    document.getElementById('phoneModal').style.display = 'flex';

    // Simpan data sementara untuk dikirim setelah mendapatkan nomor telepon
    window.selectedAmount = selectedAmount;
    window.requiredPoints = requiredPoints;
}

function closeModal() {
    document.getElementById('phoneModal').style.display = 'none';
}

function submitExchange() {
    const phoneNumber = document.getElementById('phoneNumber').value.trim();
    if (!phoneNumber || phoneNumber.length < 10) {
        alert("Masukkan nomor telepon yang valid.");
        return;
    }

    // Kirim data ke server
    $.ajax({
        url: "/exchange",  // Endpoint untuk menukarkan poin
        method: "POST",
        data: {
            phone: phoneNumber,
            email: "test@example.com", // Anda bisa ganti dengan email pengguna jika ada
            amount: window.selectedAmount,
            _token: $('meta[name="csrf-token"]').attr('content')  // CSRF token untuk keamanan
        },
        success: function (response) {
            closeModal();  // Tutup modal setelah penukaran berhasil
            currentPoints -= window.requiredPoints;
            updatePointsDisplay();  // Perbarui tampilan poin
            
            // Tampilkan dialog exchange pending
            showExchangePendingDialog();
        },
        error: function (error) {
            alert("Terjadi kesalahan: " + error.responseJSON.message || "Gagal menukar poin.");
        }
    });
}

// Fungsi untuk menampilkan dialog exchange pending
function showExchangePendingDialog() {
    const dialog = document.createElement('div');
    dialog.className = 'pending-dialog';
    dialog.innerHTML = `
        <div class="pending-dialog-content">
            <h3>Penukaran dalam proses</h3>
            <p>Saldo akan dikirim dalam beberapa saat. Bukti pengiriman akan dikirimkan ke email Anda.</p>
            <button onclick="closePendingDialog()">OK</button>
        </div>
    `;
    document.body.appendChild(dialog);
}

// Fungsi untuk menutup dialog exchange pending
function closePendingDialog() {
    const dialog = document.querySelector('.pending-dialog');
    if (dialog) {
        dialog.remove();
    }
}
