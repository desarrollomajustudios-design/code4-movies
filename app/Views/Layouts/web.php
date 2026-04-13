<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Module</title>
</head>
<body>
<h1><?= $this->renderSection('header') ?></h1>
<?= view('partials/_session'); ?>
<?= $this->renderSection('content'); ?>
</body>
</html>