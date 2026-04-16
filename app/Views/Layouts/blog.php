<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('bootstrap/dist/css/bootstrap.min.css') ?>">
    <title>Web Module</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CodeIgniter4</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="">Movies</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h1><?= $this->renderSection('header') ?></h1>
<?= view('partials/_session'); ?>
<div class="container">
    <?= $this->renderSection('content'); ?>
</div>
</body>
</html>