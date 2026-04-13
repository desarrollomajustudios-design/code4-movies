<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Edit Category
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error') ?>
<form method="POST" action="/dashboard/category/update/<?= $category->id ?>">
    <?= view('dashboard/category/_form', ['op' => 'Update']) ?>
</form>
<?php $this->endSection() ?>
