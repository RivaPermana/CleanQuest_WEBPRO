<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Quest</title>
    <!-- Menghubungkan file CSS eksternal -->
    <link rel="stylesheet" href="{{ asset('css/voucher_detail.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/detail.js"></script>
</head>

<body>
    <div class="container">
        <!-- Bagian Header untuk menampilkan logo, navigasi, dan gambar profil -->
        <header class="header">
            <div class="logo">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="logo-img">
                <div class="logo-text">Clean Quest</div>
            </div>
            <nav>
                <!--<a href="#">About</a>-->
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/misi') }}">Mission</a>
                <a href="{{ url('/poin-rewards') }}">Poin Rewards</a>
                <a href="{{ url('/profile') }}"><img src="{{ asset('assets/Me.jpg') }}" alt="Profile" width="40" height="40"></a>
            </nav>
            </div>
        </header> 
        <!-- Banner Reward yang berisi informasi detail tentang reward -->
        <section class="reward-banner">
            <!-- Gambar utama dari reward -->
            <img class="reward-img" src="{{ asset($voucher->image) }}" alt="Reward Image">
            <!-- Konten untuk detail reward -->
            <div class="reward-content">
                <!-- Judul Reward -->
                <h1>{{ $voucher->name }}</h1>
                <!-- Poin yang diperlukan untuk menukar voucher -->
                <h2>{{ $voucher->points }} Points</h2>
                <!-- Masa berlaku voucher 
                <p id="perVoc"></p>-->
                <!-- Jumlah voucher yang tersisa 
                <p>Sisa point</p>--> <!--Masih proses karena mambutuhkan php untuk update nilai-->
                <!-- Deskripsi singkat -->
                <p>{{ $voucher->description }}</p>
                <!-- Tombol untuk menukar poin 
                <button id="exchange-button">Tukar</button>-->
            </div>
        </section>
    </div>
</body>

</html>