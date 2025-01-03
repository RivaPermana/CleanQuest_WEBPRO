<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/cekprofilestyle.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Cek Profile</title>
</head>
<body>
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
        <a href="#"><img src="{{ asset('assets/Me.jpg') }}" alt="Profile" width="40" height="40"></a>
    </nav>
    </div>
    </header>    
        <div class="form-container">
            <div class="profile-header">
                <img src="{{ asset('assets/Me.jpg') }}" alt="Foto Profil">
                <h3>{{ $user->name }}</h3>
            </div>
            <form>
            <div class="form-group">
                <label for="nama">Nama Lengkap: </label>
                <input type="text" id="nama" name="nama" placeholder="{{ $user->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="nomor">Points: </label>
                <input type="tel"  id="nomor" name="nomor" placeholder="{{ $user->points }}" readonly> 
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" placeholder="{{ $user->email }}" readonly>
            </div>
            <!--<div class="form-group">
                <label for="tanggal">Tanggal Lahir:</label>
                <input type="text" id="tanggal" name="tanggal" placeholder="08 AGUSTUS 2000" readonly>
            </div>-->
            <a href="{{ url('/logout') }}" class="logout-btn">Log Out</a>
            </form>
        </div>
        <footer>
        <div class="footer-content">
            <hr>
            <img src="{{ asset('assets/logo2.png') }}" alt="Clean Quest Logo" width="60">
            <span>CLEAN QUEST</span>
            <hr>
        </div>
    </footer>
</body>
</html>