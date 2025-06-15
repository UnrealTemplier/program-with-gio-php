<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
</head>
<body>

<form method="post" action="/upload" enctype="multipart/form-data">
  Receipt: <input type="file" name="receipt"><br/>
  <button type="submit">Upload</button>
</form>

<hr/>

<?php if (!empty($invoice)): ?>
Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES) ?> <br/>
Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br/>
Invoice User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br/>
<?php endif; ?>

</body>
</html>
