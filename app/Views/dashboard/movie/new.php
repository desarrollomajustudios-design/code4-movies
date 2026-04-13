<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
New Movie
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<form method="POST" action="/dashboard/movie/create">
    <?= view('dashboard/movie/_form', ['op' => 'Create']) ?>
</form>
<?php $this->endSection() ?>
