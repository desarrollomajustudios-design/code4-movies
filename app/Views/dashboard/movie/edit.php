<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Movie</title>
</head>
<body>

<form method="POST" action="/dashboard/movie/update/<?= $movie['id'] ?>">
    <?= view('dashboard/movie/_form', ['op' => 'Update']) ?>
</form>
</body>
</html>