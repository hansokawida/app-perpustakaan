<nav class="navbar">
    {{-- Brand --}}
    <div class="brand">
        <span class="brand-icon">📚</span>
        <span>Perpustakaan Digital Kampus</span>
    </div>

    @auth
        {{-- Menu Navigasi --}}
        <ul class="navbar-menu">
            <li>
                <a href="{{ route('books.index') }}"
                   class="{{ request()->routeIs('books.*') ? 'active' : '' }}">
                    Buku
                </a>
            </li>

            @if (auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('categories.index') }}"
                       class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        Kategori
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('members.index') }}"
                   class="{{ request()->routeIs('members.*') ? 'active' : '' }}">
                    Anggota
                </a>
            </li>

            <li>
                <a href="{{ route('loans.index') }}"
                   class="{{ request()->routeIs('loans.*') ? 'active' : '' }}">
                    Peminjaman
                </a>
            </li>

            <li>
                <a href="{{ route('profile.show') }}"
                   class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    Profil
                </a>
            </li>
        </ul>

        {{-- Informasi Pengguna dan Logout --}}
        <div class="navbar-user">
            <div class="user-info">
                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>

                <span class="user-role">
                    {{ ucfirst(auth()->user()->role) }}
                </span>
            </div>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>
        </div>
    @endauth

    @guest
        <a href="{{ route('login') }}"
           class="nav-login {{ request()->routeIs('login') ? 'active' : '' }}">
            Login
        </a>
    @endguest
</nav>