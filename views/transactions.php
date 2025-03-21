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
  <?php global $transactions, $totals; ?>
  <?php if (!empty($transactions) && !empty($totals)): ?>
      <?php foreach ($transactions as $transaction): ?>
          <?php $amount = $transaction['amount']; ?>
      <tr>
        <td><?= formatDate($transaction['date']) ?></td>
        <td><?= $transaction['checkNumber'] ?></td>
        <td><?= $transaction['description'] ?></td>
        <td style="color: <?= amountColor($amount) ?>">
            <?= formatDollarAmount($amount) ?>
        </td>
      </tr>
      <?php endforeach; ?>
  <?php endif; ?>
  </tbody>
  <tfoot>
  <tr>
    <th colspan="3">Total Income:</th>
    <td><?= formatDollarAmount($totals['totalIncome']) ?></td>
  </tr>
  <tr>
    <th colspan="3">Total Expense:</th>
    <td><?= formatDollarAmount($totals['totalExpense']) ?></td>
  </tr>
  <tr>
    <th colspan="3">Net Total:</th>
    <td><?= formatDollarAmount($totals['netTotal']) ?></td>
  </tr>
  </tfoot>
</table>
</body>
</html>
