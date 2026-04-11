<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Movie</title>
</head>
<body>

<form method="POST" action="/movie/update/<?= $movie['id'] ?>">
    <?= view('movie/_form', ['op' => 'Update']) ?>
</form>
</body>
</html>