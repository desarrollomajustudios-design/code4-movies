<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Movies
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<a class="btn btn-success mb-4" href="/dashboard/movie/new">New Movie</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Movie</th>
        <th>Description</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($movies as $key => $m): ?>
        <tr>
            <td><?= $m->id ?></td>
            <td><?= $m->title ?></td>
            <td><?= $m->description ?></td>
            <td><?= $m->category ?></td>
            <td><a class="btn btn-outline-primary btn-sm mb-1" href="/dashboard/movie/show/<?= $m->id ?>">DETAILS</a>
                <a class="btn btn-outline-secondary btn-sm mb-1" href="/dashboard/movie/edit/<?= $m->id ?>">EDIT</a>
                <a class="btn btn-outline-info btn-sm mb-1" href="<?= route_to('movie.tags', $m->id) ?>">TAGS</a>
                <form action="/dashboard/movie/delete/<?= $m->id ?>" method="post">
                    <button class="btn btn-outline-danger btn-sm mb-1" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
<?= $pager->links() ?>
<?php $this->endSection(); ?>
