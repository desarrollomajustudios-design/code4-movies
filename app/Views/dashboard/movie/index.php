<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies</title>
</head>
<body>
<h1>Movies List</h1>
<?= view('partials/_session'); ?>
<a href="/dashboard/movie/new">New Movie</a>
<table>
    <tr>
        <th>ID</th>
        <th>Movie</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($movies as $key => $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['title'] ?></td>
            <td><?= $p['description'] ?></td>
            <td><a href="/dashboard/movie/show/<?= $p['id'] ?>">DETAILS</a>
                <a href="/dashboard/movie/edit/<?= $p['id'] ?>">EDIT</a>
                <form action="/dashboard/movie/delete/<?= $p['id'] ?>" method="post">
                    <button type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
