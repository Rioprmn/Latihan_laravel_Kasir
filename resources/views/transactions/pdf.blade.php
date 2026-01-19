<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
        .subtitle {
            text-align: center;
            margin-bottom: 20px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background: #f3f4f6;
        }
        .right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            background: #f9fafb;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 10px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>LAPORAN TRANSAKSI PENJUALAN</h2>
<div class="subtitle">
    Dicetak pada {{ now()->format('d M Y H:i') }} WIB
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Nota</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th class="right">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $i => $trx)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>#TRX-{{ $trx->id }}</td>
            <td>{{ $trx->created_at->format('d M Y H:i') }}</td>
            <td>{{ $trx->user->name ?? 'Admin' }}</td>
            <td class="right">Rp {{ number_format($trx->total) }}</td>
        </tr>
        @endforeach
        <tr class="total">
            <td colspan="4">TOTAL OMZET</td>
            <td class="right">Rp {{ number_format($totalOmzet) }}</td>
        </tr>
    </tbody>
</table>

<footer>
    Laporan Transaksi • Sistem Kasir Laravel
</footer>

</body>
</html>
