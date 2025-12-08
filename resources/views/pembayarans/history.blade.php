<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Payment History</title>

    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar">
    
    <!-- LOGO -->
    <div class="logo">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Villa Bali Dream House" class="nav-logo">
        </a>
    </div>

    <!-- NAV LINKS -->
    <ul class="nav-links">
        <li><a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/villa') }}" class="{{ request()->is('villa*') ? 'active' : '' }}">Villa</a></li>
        <li><a href="{{ url('/availability') }}" class="{{ request()->is('availability*') ? 'active' : '' }}">Check Availability</a></li>
    </ul>

    <!-- ICONS (bell + profile) -->
    <div class="nav-icons">

        <!-- BELL ICON -->
        <button class="bell-btn" aria-label="Notifications">🔔</button>

        <!-- PROFILE DROPDOWN -->
        <div class="profile-container">
            <button id="profileToggle" class="profile-btn">
                <img src="{{ auth()->check() && auth()->user()->profile_photo 
                    ? asset('profile_photos/' . auth()->user()->profile_photo) 
                    : asset('images/default_avatar.jpg') }}"
                    alt="Profile">
            </button>

            <!-- ===== DROPDOWN PANEL ===== -->
            <div class="profile-dropdown" id="profileDropdown">

                <div class="pd-header">
                    <div class="pd-name">
                        Hi, {{ auth()->check() ? auth()->user()->name : 'Guest' }}
                    </div>
                    <div class="pd-email">
                        {{ auth()->check() ? auth()->user()->email : '' }}
                    </div>
                </div>

                <!-- View Profile -->
                <a href="{{ route('profile') }}" class="pd-item">
                    View Profile
                </a>

                <!-- Payment History -->
                <a href="{{ url('/history') }}" class="pd-button">
                    Payment History
                </a>

                <!-- Logout (POST) -->
               <a href="{{ route('logout') }}" class="pd-logout">Logout</a>

            </div>
        </div>
    </div>

</nav>
<!-- =============== END NAVBAR ================= -->


<!-- ==================== CONTENT ==================== -->
<main class="container">

    <h2>Riwayat Pembayaran</h2>

    <div class="table-wrap">
        <table class="payment-table" role="table" aria-label="Riwayat Pembayaran">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Villa</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Metode</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <!-- contoh data -->
                <tr>
                    <td>1</td>
                    <td>Villa Ocean View</td>
                    <td>2025-12-04</td>
                    <td>Virtual Account</td>
                    <td>Rp 2.500.000</td>
                    <td><span class="paid">Paid</span></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Villa Sunset</td>
                    <td>2025-12-02</td>
                    <td>QRIS</td>
                    <td>Rp 3.200.000</td>
                    <td><span class="waiting">Waiting</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<!-- SCRIPT DROPDOWN -->
<script>
    const toggleBtn = document.getElementById("profileToggle");
    const dropdown  = document.getElementById("profileDropdown");

    toggleBtn.addEventListener("click", () => {
        dropdown.classList.toggle("show");
    });

    // close dropdown if click outside
    document.addEventListener("click", function(e) {
        if (!toggleBtn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove("show");
        }
    });
</script>

</body>
</html>
