@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
    <h1>Daftar Peminjaman</h1>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('loans.create') }}" class="btn">
            + Tambah Peminjaman
        </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>

                    <td>
                        {{ $loan->member->nama ?? '-' }}
                    </td>

                    <td>
                        {{ $loan->user->name ?? '-' }}
                    </td>

                    <td>
                        @forelse ($loan->loanItems as $item)
                            {{ $item->book->judul ?? 'Buku tidak ditemukan' }}@if (!$loop->last), @endif
                        @empty
                            -
                        @endforelse
                    </td>

                    <td>{{ $loan->tanggal_pinjam }}</td>

                    <td>{{ $loan->tanggal_kembali }}</td>

                    <td>
                        @if ($loan->status === 'dikembalikan')
                            <span class="badge-success">
                                Dikembalikan
                            </span>
                        @elseif ($loan->status === 'dipinjam')
                            <span class="badge-warning">
                                Dipinjam
                            </span>
                        @elseif ($loan->status === 'terlambat')
                            <span class="badge-danger">
                                Terlambat
                            </span>
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('loans.show', $loan->id) }}">
                                Detail
                            </a>

                            <a href="{{ route('loans.edit', $loan->id) }}">
                                Edit
                            </a>

                            @if ($loan->status === 'dipinjam')
                                <form
                                    action="{{ route('loans.kembalikan', $loan->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin mengembalikan buku ini?')"
                                >
                                    @csrf
                                    @method('PUT')

                                    <button type="submit">
                                        Kembalikan
                                    </button>
                                </form>
                            @endif

                            <form
                                action="{{ route('loans.destroy', $loan->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus transaksi peminjaman ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        Belum ada data peminjaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $loans->links() }}
@endsection
