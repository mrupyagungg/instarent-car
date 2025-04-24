<!DOCTYPE html>
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
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
    <h2>Jurnal Umum - <?= $date . ' ' . $year; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jurnal as $row) : ?>
            <tr>
                <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                <td><?= esc($row['deskripsi']); ?></td>
                <td><?= number_format($row['debit'], 2, ',', '.'); ?></td>
                <td><?= number_format($row['kredit'], 2, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>