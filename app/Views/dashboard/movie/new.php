<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Movie</title>
</head>
<body>

<form method="POST" action="/dashboard/movie/create">
    <?= view('dashboard/movie/_form', ['op' => 'Create']) ?>
</form>
</body>
</html>