const express = require('express');
const mysql = require('mysql2');
const path = require('path');

const app = express();
const port = 3000;

// Membuat koneksi ke database MySQL
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'password',  // Sesuaikan dengan password MySQL Anda
  database: 'clean_quest' // Nama database Anda
});

// Menyajikan gambar dari folder 'assets'
app.use('/assets', express.static(path.join(__dirname, 'assets')));

// Endpoint API untuk mengambil data voucher
app.get('/api/vouchers', (req, res) => {
  const query = 'SELECT * FROM vouchers';

  connection.execute(query, (err, results) => {
    if (err) {
      res.status(500).json({ error: 'Gagal mengambil data voucher' });
    } else {
      res.json(results);
    }
  });
});

// Menjalankan server API
app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
