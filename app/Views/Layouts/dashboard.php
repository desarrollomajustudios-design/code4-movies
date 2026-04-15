<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url('bootstrap/dist/css/bootstrap.min.css') ?>">
    <title>Dashboard Module</title>
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
                    <a class="nav-link" href="/dashboard/movie">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/category">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/tag">Tags</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?= view('partials/_session'); ?>
    <div class="card">
        <div class="card-header">
            <h1><?= $this->renderSection('header') ?></h1>
        </div>
        <div class="card-body">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
</div>
<script src="<?= base_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
</body>
</html>