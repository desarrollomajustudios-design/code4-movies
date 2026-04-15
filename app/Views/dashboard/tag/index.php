<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
Tags
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<a class="btn btn-success mb-4" href="/dashboard/tag/new">New Tag</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($tags as $key => $tag): ?>
        <tr>
            <td><?= $tag->id ?></td>
            <td><?= $tag->title ?></td>
            <td><?= $tag->category ?? 'No Category' ?></td>
            <td><a class="btn btn-outline-primary btn-sm mb-1" href="/dashboard/tag/edit/<?= $tag->id ?>">EDIT</a>
                <form action="/dashboard/tag/delete/<?= $tag->id ?>" method="post" style="display:inline;">
                    <button class="btn btn-outline-danger btn-sm mb-1" type="submit">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $pager->links() ?>
<?php $this->endSection(); ?>
