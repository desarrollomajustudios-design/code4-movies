<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Edit Tag
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error') ?>
<form method="POST" action="/dashboard/tag/update/<?= $tag->id ?>">
    <?= view('dashboard/tag/_form', ['op' => 'Update']) ?>
</form>
<?php $this->endSection() ?>
