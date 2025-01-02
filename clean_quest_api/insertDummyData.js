const mysql = require('mysql2');
const path = require('path');

// Membuat koneksi ke database MySQL
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'password',  // Sesuaikan dengan password MySQL Anda
  database: 'clean_quest' // Nama database Anda
});

// Path gambar voucher yang akan disimpan dalam database
const imagePath = path.join(__dirname, 'assets', 'voucher.png'); // Sesuaikan path jika diperlukan

// Data dummy yang akan dimasukkan ke dalam tabel voucher
const vouchers = [
  {
    voucher_name: "Voucher 100 Points",
    points_required: 100,
    image_url: imagePath
  },
  {
    voucher_name: "Voucher 200 Points",
    points_required: 200,
    image_url: imagePath
  },
  {
    voucher_name: "Voucher 500 Points",
    points_required: 500,
    image_url: imagePath
  }
];

// Fungsi untuk menyisipkan data dummy ke dalam database
const insertDummyData = () => {
  vouchers.forEach(voucher => {
    const query = `
      INSERT INTO vouchers (voucher_name, points_required, image_url)
      VALUES (?, ?, ?)
    `;
    
    connection.execute(query, [voucher.voucher_name, voucher.points_required, voucher.image_url], (err, results) => {
      if (err) {
        console.error("Gagal memasukkan data:", err);
      } else {
        console.log(`Data voucher ${voucher.voucher_name} berhasil dimasukkan.`);
      }
    });
  });
};

// Menyisipkan data dummy
insertDummyData();

// Menutup koneksi setelah selesai
connection.end();
