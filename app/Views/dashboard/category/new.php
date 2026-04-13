<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
New Category
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error') ?>
<form method="POST" action="/dashboard/category/create">
    <?= view('dashboard/category/_form', ['op' => 'Create']) ?>
</form>
<?php $this->endSection() ?>
