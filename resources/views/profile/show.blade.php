@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="profile-page">

    <div class="profile-heading">
        <h1>Profil Pengguna</h1>
        <p>Lihat informasi akun dan kelola password kamu di sini.</p>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pesan kesalahan validasi --}}
    @if ($errors->any())
        <div class="alert-error">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Informasi profil --}}
    <div class="profile-card">
        <h2>Informasi Akun</h2>

        <div class="profile-detail">
            <span class="profile-label">Nama</span>
            <span class="profile-value">{{ $user->name }}</span>
        </div>

        <div class="profile-detail">
            <span class="profile-label">Email</span>
            <span class="profile-value">{{ $user->email }}</span>
        </div>

        <div class="profile-detail">
            <span class="profile-label">Role</span>
            <span>
                <span class="profile-role">
                    {{ ucfirst($user->role) }}
                </span>
            </span>
        </div>
    </div>

    {{-- Form ganti password --}}
    <div class="profile-card">
        <h2>Ganti Password</h2>

        <p style="color: #6b7280; font-size: 14px;">
            Masukkan password lama, lalu tentukan password baru
            dengan minimal 8 karakter.
        </p>

        <form
            action="{{ route('profile.password.update') }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <label for="current_password">Password Lama</label>
            <input
                type="password"
                id="current_password"
                name="current_password"
                required
                autocomplete="current-password"
            >

            <label for="password">Password Baru</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                minlength="8"
                autocomplete="new-password"
            >

            <label for="password_confirmation">
                Konfirmasi Password Baru
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required
                minlength="8"
                autocomplete="new-password"
            >

            <button type="submit" class="profile-submit">
                Simpan Password Baru
            </button>
        </form>
    </div>

</div>
@endsection