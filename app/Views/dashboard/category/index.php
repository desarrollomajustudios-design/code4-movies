<?php $this->extend('layouts/dashboard'); ?>
<?php $this->section('header'); ?>
Categories
<?php $this->endSection(); ?>
<?php $this->section('content'); ?>
<a href="/dashboard/category/new">New Category</a>
<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $key => $p): ?>
        <tr>
            <td><?= $p->id ?></td>
            <td><?= $p->title ?></td>
            <td><a href="/dashboard/category/show/<?= $p->id ?>">DETAILS</a>
                <a href="/dashboard/category/edit/<?= $p->id ?>">EDIT</a>
                <form action="/dashboard/category/delete/<?= $p->id ?>" method="post">
                    <button type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $pager->links() ?>
<?php $this->endSection(); ?>


