<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Movies
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<a href="/dashboard/movie/new">New Movie</a>
<table>
    <tr>
        <th>ID</th>
        <th>Movie</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($movies as $key => $m): ?>
        <tr>
            <td><?= $m->id ?></td>
            <td><?= $m->title ?></td>
            <td><?= $m->description ?></td>
            <td><a href="/dashboard/movie/show/<?= $m->id ?>">DETAILS</a>
                <a href="/dashboard/movie/edit/<?= $m->id ?>">EDIT</a>
                <form action="/dashboard/movie/delete/<?= $m->id ?>" method="post">
                    <button type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection(); ?>
