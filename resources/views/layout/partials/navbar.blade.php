<style>
    .admin-indicator {
        padding: 10px;
        background: #f4f4f4;
        display: flex;
        justify-content: center;
        gap: 10px;
        align-items: center;
        font-family: poppins; 
        font-size: 1.8vh;

        opacity: 0;
        transform: translateY(-20px);
        transition: all 0.5s ease;
    }

    .admin-indicator.show {
        opacity: 1;
        transform: translateY(0);
    }

    .admin-indicator a,
    .admin-indicator button {
        transition: all 0.3s ease;
    }
</style>

@if(Auth::check() && Auth::user()->role === 'admin')

    {{-- Admin indicator area --}}
    <div id="adminIndicator" class="admin-indicator">
        <span>Logged in as Admin: <strong>{{ Auth::user()->name }}</strong></span>

        {{-- Button menuju halaman admin --}}
        <a href="{{ route('admin.artikel.index') }}" 
           style="padding: 4px 9px; background: #3498db; color: white; border-radius: 8px; text-decoration: none;">
           Go to Admin Page
        </a>

        {{-- Button logout --}}
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" 
                    style="padding: 4px 9px; background: #e74c3c; color: white; border-radius: 8px; border: none;">
                Logout
            </button>
        </form>
    </div>
    <!-- {{-- Divider strip --}}
    <div style="height: 2px; background: #3498db;"></div> -->
    <script>
      window.addEventListener('DOMContentLoaded', () => {
            const indicator = document.getElementById('adminIndicator');
            setTimeout(() => {
                indicator.classList.add('show'); // trigger animasi
            }, 200); // delay supaya terlihat
        });
    </script>
@endif

<!-- Navbar -->
<nav class="navbar" style="background-image: linear-gradient(to bottom, #a42c38ff, #9c2934ff);">
  <div class="container d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3s" style="justify-content: space-between">
    <h1 style="font-family: poppins; color: #ffffffff; cursor: pointer">
      Nafas<strong>Baru</strong>
    </h1>
    
    <div class="navbar-center" style="margin-left: auto;">
      <ul style="list-style: none; display: flex; padding: 0px; margin: 0px; font-size: 18px; gap: 2rem">
        <a href="/" style="text-decoration: none"><li class="p-2" style="font-family: poppins; cursor: pointer; color: #ffffffff" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';" >Beranda</li></a>
        <a href="/#Kalkulator" style="text-decoration: none"><li class="p-2" style="font-family: poppins; cursor: pointer; color: #ffffffff" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';" >Kalkulator</li></a>
        <a href="/#TierList" style="text-decoration: none"><li class="p-2" style="font-family: poppins; cursor: pointer; color: #ffffffff" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';" >Tier List</li></a>
        <a href="/edukasi" style="text-decoration: none"><li class="p-2" style="font-family: poppins; cursor: pointer; color: #ffffffff" onmouseover="this.style.fontWeight='bold';" onmouseout="this.style.fontWeight='normal';">Edukasi</li></a>
      </ul>
    </div>
  </div>
</nav>

