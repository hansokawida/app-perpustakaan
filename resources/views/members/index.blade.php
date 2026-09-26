@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')

    <h1>Daftar Anggota</h1>

    <p>
        <a href="{{ route('members.create') }}">
            + Tambah Anggota
        </a>
    </p>

    <form action="{{ route('members.index') }}" method="GET">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama anggota..."
        >

        <button type="submit">
            Cari
        </button>

        @if(request('search'))
            <a href="{{ route('members.index') }}">
                Reset
            </a>
        @endif
    </form>

    <br>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>

                    <td>{{ $member->nama }}</td>

                    <td>{{ $member->nim }}</td>

                    <td>{{ $member->email }}</td>

                    <td>{{ $member->nomor_telepon }}</td>

                    <td>
                        {{ ucfirst($member->status) }}
                    </td>

                    <td>
                        <a href="{{ route('members.show', $member->id) }}">
                            Detail
                        </a>

                        |

                        <a href="{{ route('members.edit', $member->id) }}">
                            Edit
                        </a>

                        |

                        <form
                            action="{{ route('members.destroy', $member->id) }}"
                            method="POST"
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Yakin ingin menghapus anggota ini?')"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        @if(request('search'))
                            Data anggota dengan nama "{{ request('search') }}" tidak ditemukan.
                        @else
                            Belum ada data anggota.
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    {{ $members->appends(request()->query())->links() }}

@endsection