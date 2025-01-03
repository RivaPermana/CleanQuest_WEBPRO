<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <title>Home Page</title>
    </head>
    <body>
        <header class="header">
            <div class="logo">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="logo-img">
                <div class="logo-text">Clean Quest</div>
            </div>
            <nav>
                <!--<a href="#">About</a>-->
                <a href="#" class="active">Home</a>
                <a href="{{ url('/misi') }}">Mission</a>
                <a href="{{ url('/poin-rewards') }}">Poin Rewards</a>
                <a href="{{ url('/profile') }}"><img src="{{ asset('assets/Me.jpg') }}" alt="Profile" width="40" height="40"></a>
            </nav>
            </div>
        </header>
        <main>
            <section class="intro">
                <h1>Selamat Datang di CleanQuest! {{ $user->name }}!</h1>
                <p>
                    CleanQuest adalah aplikasi inovatif yang bertujuan untuk membentuk kebiasaan baik dalam menjaga lingkungan. 
                    Melalui misi-misi harian yang menyenangkan dan bermanfaat, pengguna dapat berkontribusi dalam upaya pelestarian lingkungan.
                </p>
                <p>
                    Dengan menyelesaikan misi seperti mendaur ulang, mengurangi penggunaan plastik, dan menjaga kebersihan di sekitar Anda, 
                    Anda tidak hanya membantu bumi tetap bersih tetapi juga mendapatkan poin yang dapat ditukarkan dengan berbagai hadiah menarik.
                </p>
                <p>
                    Mari bergabung bersama kami untuk menciptakan masa depan yang lebih hijau, satu langkah kecil setiap hari!
                </p>
            </section>
        </main>
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