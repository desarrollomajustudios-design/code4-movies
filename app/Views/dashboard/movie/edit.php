<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Edit Movie
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<form method="POST" action="/dashboard/movie/update/<?= $movie['id'] ?>">
    <?= view('dashboard/movie/_form', ['op' => 'Update']) ?>
</form>
<?php $this->endSection() ?>
