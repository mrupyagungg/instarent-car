<!DOCTYPE html>
<<<<<<< HEAD
<html>

<head>
    <style>
    body {
        font-family: sans-serif;
        font-size: 12px;
=======
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    }

    table {
        width: 100%;
        border-collapse: collapse;
<<<<<<< HEAD
        margin-top: 10px;
=======
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    }

    th,
    td {
<<<<<<< HEAD
        border: 1px solid #000;
        padding: 5px;
        text-align: center;
    }

    .text-end {
        text-align: right;
=======
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    }
    </style>
</head>

<body>
<<<<<<< HEAD
    <h2 style="text-align:center;">INSTA RENT</h2>
    <h4 style="text-align:center;">LAPORAN LABA RUGI</h4>
    <h3 style="text-align:center;">JURNAL UMUM</h3>
    <p><b>Periode:</b> <?= format_bulan($month) ?> <?= $year ?></p>

=======
    <h2>Jurnal Umum - <?= $date . ' ' . $year; ?></h2>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
<<<<<<< HEAD
                <th>Keterangan</th>
                <th>Ref</th>
=======
                <th>Deskripsi</th>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
            <?php
            $totalDebit = 0;
            $totalKredit = 0;
            ?>

            <?php foreach ($jurnal as $item): ?>
            <?php
                if ($item['posisi'] === 'd') {
                    $totalDebit += $item['nominal'];
                } else {
                    $totalKredit += $item['nominal'];
                }
            ?>
            <tr>
                <td><?= format_date($item['tanggal']) ?></td>
                <td style="<?= $item['posisi'] === 'k' ? 'padding-left: 30px;' : '' ?>">
                    <?= $item['transaksi'] ?>
                </td>
                <td><?= $item['id_akun'] ?></td>
                <td class="text-end"><?= $item['posisi'] === 'd' ? nominal($item['nominal']) : '-' ?></td>
                <td class="text-end"><?= $item['posisi'] === 'k' ? nominal($item['nominal']) : '-' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

        <?php if (!empty($jurnal)): ?>
        <tfoot>
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td class="text-end"><b><?= nominal($totalDebit) ?></b></td>
                <td class="text-end"><b><?= nominal($totalKredit) ?></b></td>
            </tr>
        </tfoot>
        <?php endif; ?>
=======
            <?php foreach ($jurnal as $row) : ?>
            <tr>
                <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                <td><?= esc($row['deskripsi']); ?></td>
                <td><?= number_format($row['debit'], 2, ',', '.'); ?></td>
                <td><?= number_format($row['kredit'], 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
>>>>>>> 71f6e5046be693041a2cc7f6a1792325ba72f1c1
    </table>
</body>

</html>