<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
New Tag
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error') ?>
<form method="POST" action="/dashboard/tag/create">
    <?= view('dashboard/tag/_form', ['op' => 'Create']) ?>
</form>
<?php $this->endSection() ?>
