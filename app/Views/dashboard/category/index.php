<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories</title>
</head>
<body>
<h1>Categories</h1>
<?= view('partials/_session'); ?>
<a href="/dashboard/category/new">New Category</a>
<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $key => $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['title'] ?></td>
            <td><a href="/dashboard/category/show/<?= $p['id'] ?>">DETAILS</a>
                <a href="/dashboard/category/edit/<?= $p['id'] ?>">EDIT</a>
                <form action="/dashboard/category/delete/<?= $p['id'] ?>" method="post">
                    <button type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
