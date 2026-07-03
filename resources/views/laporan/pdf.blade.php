<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            margin: 30px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 70px;
            margin-bottom: 8px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #235347;
            margin: 0;
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        hr {
            border: 0;
            border-top: 1px solid #d1d5db;
            margin: 20px 0;
        }

        .info {
            width: 100%;
            margin-bottom: 20px;
        }

        .info td {
            padding: 4px 0;
            border: none;
        }

        .summary-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .summary {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .summary th {
            background: #235347;
            color: #fff;
}
            padding: 10px;
            text-align: left;
        }

        .summary td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .summary .amount {
            text-align: right;
            font-weight: bold;
        }

        .transaction-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .transactions {
            width: 100%;
            border-collapse: collapse;
        }

        .transactions th {
            background: #235347;
            color: #fff;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .transactions td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .transactions td:last-child {
            text-align: right;
        }

        .transactions td:nth-child(1),
        .transactions td:nth-child(4) {
            text-align: center;
        }

        .footer {
        position: fixed;
        bottom: 20px;
        left: 0;
        right: 0;
        text-align: center;
        color: #777;
        font-size: 11px;
        }
    </style>

</head>

<body>

    <div class="header">

        <img src="{{ public_path('images/fintrack-logo.png') }}" class="logo">

        <div class="title">FINTRACK</div>

        <div class="subtitle">
            Laporan Keuangan Pribadi
        </div>

    </div>

    <hr>

    <table class="info">
        <tr>
            <td><strong>Nama Pengguna</strong></td>
            <td>: {{ $user->name }}</td>
        </tr>

        <tr>
            <td><strong>Tanggal Cetak</strong></td>
            <td>: {{ now()->format('d F Y') }}</td>
        </tr>
    </table>

    <div class="summary-title">
        Ringkasan Keuangan
    </div>

    <table class="summary">

        <tr>
            <th>Keterangan</th>
            <th>Nominal</th>
        </tr>

        <tr>
            <td>Total Pemasukan</td>
            <td class="amount">
                Rp {{ number_format($totalIncome,0,',','.') }}
            </td>
        </tr>

        <tr>
            <td>Total Pengeluaran</td>
            <td class="amount">
                Rp {{ number_format($totalExpense,0,',','.') }}
            </td>
        </tr>

        <tr>
            <td><strong>Saldo</strong></td>
            <td class="amount">
                <strong>
                    Rp {{ number_format($balance,0,',','.') }}
                </strong>
            </td>
        </tr>

    </table>

    <div class="transaction-title">
        Daftar Transaksi
    </div>

    <table class="transactions">

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Jenis</th>
                <th>Nominal</th>
            </tr>

        </thead>

        <tbody>

            @forelse($transactions as $transaction)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d/m/Y') }}
                    </td>

                    <td>{{ $transaction->title }}</td>

                    <td>
                        {{ $transaction->type == 'income' ? 'Pemasukan' : 'Pengeluaran' }}
                    </td>

                    <td>
                        Rp {{ number_format($transaction->amount,0,',','.') }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" style="text-align:center">
                        Tidak ada transaksi.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">

        Dokumen ini dibuat secara otomatis oleh sistem <strong>FinTrack</strong>.

        <br><br>

        © {{ date('Y') }} FinTrack. Seluruh hak cipta dilindungi.

    </div>

</body>

</html>