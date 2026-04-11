<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Category</title>
</head>
<body>

<form method="POST" action="/dashboard/category/update/<?= $category['id'] ?>">
    <?= view('dashboard/category/_form', ['op' => 'Update']) ?>
</form>
</body>
</html>