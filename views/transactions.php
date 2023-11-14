<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
        <?php if (! empty($transactions)): ?>
            <?php foreach ($transactions as $t): ?>
                <?php $amountColor = $t['amount'] === 0 ? 'black' : ($t['amount'] > 0 ? 'green' : 'red'); ?>
                <tr>
                    <td><?= formatDate($t['date']) ?></td>
                    <td><?= $t['checkNumber'] ?></td>
                    <td><?= $t['description'] ?></td>
                    <td style="color: <?= $amountColor ?>">
                        <?= formatDollarAmount($t['amount']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td><?= formatDollarAmount($totals['income'] ?? 0) ?></td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td><?= formatDollarAmount($totals['expense'] ?? 0) ?></td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td><?= formatDollarAmount($totals['netTotal'] ?? 0) ?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>
