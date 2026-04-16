<?php $this->extend('layouts/blog') ?>
<?php $this->section('content') ?>
<h1>Movies with tag: <?= $tags->title ?></h1>
<hr>
<?= view('partials/_movies') ?>
<?php $this->endSection() ?>

