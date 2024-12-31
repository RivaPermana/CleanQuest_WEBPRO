<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Quest</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>-->
</head>
<body>
    <div class="header">
        <div class="logo-container">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="40" height="40">
            <h1>Clean Quest</h1>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Mission</a>
            <a href="#">Poin Rewards</a>
            <a href="#"><img src="{{ asset('assets/profile.png') }}" alt="Profile" width="40" height="40"></a>
        </nav>
    </div>
    <div class="content">
        <h2>Daily Quest</h2>
        <div class="mission-list" id="mission-list">
            @foreach ($missions as $mission)
                <div class="mission-card">
                    <img src="{{ asset($mission->image) }}" alt="{{ $mission->name }}">
                    <h3>{{ $mission->name }}</h3>
                    <p>{{ $mission->points }} Points</p>
                    <button type="button">Complete</button>
                </div>
            @endforeach
        </div>
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
