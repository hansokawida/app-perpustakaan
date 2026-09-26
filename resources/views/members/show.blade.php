<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
</head>

<body>

    <h1>Detail Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">
            &larr; Kembali ke daftar anggota
        </a>
    </p>

    <table>
        <tr>
            <th align="left">ID</th>
            <td>{{ $member->id }}</td>
        </tr>

        <tr>
            <th align="left">Nama</th>
            <td>{{ $member->nama }}</td>
        </tr>

        <tr>
            <th align="left">NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>

        <tr>
            <th align="left">Email</th>
            <td>{{ $member->email }}</td>
        </tr>

        <tr>
            <th align="left">Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>

        <tr>
            <th align="left">Alamat</th>
            <td>{{ $member->alamat }}</td>
        </tr>

        <tr>
            <th align="left">Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
    </table>

    <p>
        <a href="{{ route('members.edit', $member->id) }}">
            Edit Anggota
        </a>
    </p>

</body>
</html>