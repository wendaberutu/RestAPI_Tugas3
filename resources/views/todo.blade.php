<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>
        /* Kelas CSS untuk tugas yang sudah selesai */
        .completed {
            text-decoration: line-through; /* Garis coret pada teks */
            color: gray; /* Warna teks menjadi abu-abu */
        }

        /* Style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan jarak antar border */
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd; /* Menambahkan border bawah pada setiap sel */
        }

        th {
            background-color: #f2f2f2; /* Warna latar belakang untuk header tabel */
        }

        tr:hover {background-color: #f5f5f5;} /* Efek hover pada baris tabel */

        h1 {
            text-align: center; /* Memusatkan teks secara horizontal */
        }
    </style>
</head>
<body>
    <!-- Judul utama halaman -->
    <h1>To Do List</h1>

    <!-- Form untuk menambahkan tugas baru -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="masukkan teks disini" required>
        <button type="submit">Tambah</button>
    </form>

    <!-- Tabel untuk daftar tugas -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tugas </th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping untuk menampilkan setiap tugas -->
            @foreach($tasks as $index => $task)
            <tr class="{{ $task->completed ? 'completed' : '' }}">
                <td>{{ $index + 1 }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->completed ? 'Selesai' : 'Belum Selesai' }}</td>
                <td>
                    <!-- Jika tugas belum selesai, tampilkan tombol untuk menandai sebagai selesai -->
                    @if (!$task->completed)
                        <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Selesai</button>
                        </form>
                    @endif
                    <!-- Form untuk menghapus tugas -->
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
