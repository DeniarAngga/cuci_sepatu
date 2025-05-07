<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h3 align="center">Laporan Penjualan</h3>
    <table>
        <thead>
            <tr>
                <th>No Pesanan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Layanan</th>
                <th>Tanggal Pesan</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->no_pesanan }}</td>
                    <td>{{ $order->nama_lengkap }}</td>
                    <td>{{ $order->alamat }}</td>
                    <td>{{ $order->jenis_layanan }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_pesan)->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                    <td>Selesai</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
