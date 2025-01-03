<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Quest - Poin Rewards</title>
    <link rel="stylesheet" href="{{ asset('css/Poin_Rewards.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/poin_Rewards.js" defer></script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <div class="logo-text">Clean Quest</div>
        </div>
        <nav>
            <!--<a href="#">About</a>-->
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/misi') }}">Mission</a>
            <a href="#" class="active">Poin Rewards</a>
            <a href="{{ url('/profile') }}"><img src="assets/Me.jpg" alt="Profile" width="40" height="40"></a>
        </nav>
    </header>

    <main class="main-content">
        <div class="points-banner">
            <p>Hi {{ $user->name }}, Poin Anda</p>
            <p class="points"> {{ $user->points }} Poin <span class="star">⭐</span></p>
        </div>

        <!-- Tab Menu -->
        <div class="tab-menu">
            <button class="tab active" onclick="showSection('ewallet')">E-Wallet</button>
            <button class="tab" onclick="showSection('voucher')">Voucher</button>
        </div>

        <!-- E-Wallet Section -->
        <section id="ewallet" class="tab-content active">
            <h2>E-Wallet</h2>
            <div class="wallet-options">
                <button class="wallet-btn" onclick="selectWallet(this)">
                    <div class="wallet-logo-text">
                        <img src="assets/gopay.png" alt="GoPay Logo" />
                        <span>Tukar dengan GoPay</span>
                    </div>
                </button>
                <button class="wallet-btn" onclick="selectWallet(this)">
                    <div class="wallet-logo-text">
                        <img src="assets/ovo.png" alt="OVO Logo" />
                        <span>Tukar dengan OVO</span>
                    </div>
                </button>
                <button class="wallet-btn" onclick="selectWallet(this)">
                    <div class="wallet-logo-text">
                        <img src="assets/dana.png" alt="Dana Logo" />
                        <span>Tukar dengan Dana</span>
                    </div>
                </button>
                <button class="wallet-btn" onclick="selectWallet(this)">
                    <div class="wallet-logo-text">
                        <img src="assets/shopeepay.png" alt="ShopeePay Logo" />
                        <span>Tukar dengan ShopeePay</span>
                    </div>
                </button>
            </div>

            <div class="points-options">
                <button data-amount="5000" onclick="selectAmount(this)">Rp 5.000 <br> 500 Poin</button>
                <button data-amount="10000" onclick="selectAmount(this)">Rp 10.000 <br> 1000 Poin</button>
                <button data-amount="20000" onclick="selectAmount(this)">Rp 20.000 <br> 2000 Poin</button>
                <button data-amount="30000" onclick="selectAmount(this)">Rp 30.000 <br> 3000 Poin</button>
                <button data-amount="50000" onclick="selectAmount(this)">Rp 50.000 <br> 5000 Poin</button>
            </div>

            <!-- Custom Points Section -->
            <div class="custom-points">
                <div class="input">
                    <span class="currency">Rp</span>
                    <input type="number" id="custom-amount" min="5000">
                </div>
                <p>Minimal tukar Rp 5.000</p>
                <button onclick="confirmExchange()">Tukar</button>
            </div>

            <!-- Modal untuk meminta nomor telepon -->
            <div id="phoneModal" class="modal">
                <div class="modal-content">
                    <h3>Masukkan Nomor Telepon Anda</h3>
                    <input type="text" id="phoneNumber" placeholder="Contoh: 08123456789">
                    <button onclick="submitExchange()">Kirim</button>
                    <button onclick="closeModal()">Batal</button>
                </div>
            </div>

        </section>

        <!-- Voucher Section -->
        <section id="voucher" class="tab-content">
            <h2>Voucher</h2>
            <div class="voucher-grid" id="voucher-grid">
                <!-- Voucher Cards -->
                @foreach ($vouchers as $voucher)
                    <a href="{{ route('voucher_detail', ['id' => $voucher->id]) }}" class="voucher-link">
                        <div class="voucher-card">
                            <img src="{{ asset($voucher->image) }}" alt="{{ $voucher->name }}">
                            <h3>{{ $voucher->name }}</h3>
                            <p>{{ $voucher->points }} Points</p>      
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <hr>
            <img src="assets/logo2.png" alt="Clean Quest Logo" width="60">
            <span>CLEAN QUEST</span>
            <hr>
        </div>
    </footer>

</body>

</html>