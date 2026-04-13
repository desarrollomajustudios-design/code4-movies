<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Category</title>
</head>
<body>
<?php //= view('partials/_session'); ?>
<form method="POST" action="/dashboard/category/create">
    <?= view('dashboard/category/_form', ['op' => 'Create']) ?>
</form>
</body>
</html>