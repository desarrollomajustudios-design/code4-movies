<?php $this->extend('layouts/dashboard'); ?>
<?php $this->section('header'); ?>
Categories
<?php $this->endSection(); ?>
<?php $this->section('content'); ?>
<a class="btn btn-success mb-4" href="/dashboard/category/new">New Category</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $key => $p): ?>
        <tr>
            <td><?= $p->id ?></td>
            <td><?= $p->title ?></td>
            <td><a class="btn btn-outline-primary btn-sm mb-1" href="/dashboard/category/show/<?= $p->id ?>">DETAILS</a>
                <a class="btn btn-outline-secondary btn-sm mb-1" href="/dashboard/category/edit/<?= $p->id ?>">EDIT</a>
                <form action="/dashboard/category/delete/<?= $p->id ?>" method="post">
                    <button class="btn btn-outline-danger btn-sm mb-1" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $pager->links() ?>
<?php $this->endSection(); ?>


