<?php $this->extend('layouts/dashboard') ?>
<?php $this->section('header') ?>
<?= $movie->title ?>
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<p><?= $movie->description ?></p>
<h3>Images</h3>
<ul>
    <?php foreach ($images as $i) : ?>
        <li>
            <img src="/uploads/movies/<?= $i->image ?>" alt="" width="200px">
            <form method="post" action="<?= route_to('movie.image.delete', $i->id) ?>">
                <button type="submit">Delete</button>
            </form>
            <form method="get" action="<?= route_to('movie.image.download', $i->id) ?>">
                <button type="submit">Download</button>
            </form>
        </li>
    <?php endforeach ?>
</ul>

<h3>Tags</h3>
<?php foreach ($tags as $t) : ?>
    <button data-url='<?= route_to('movie.tag.delete', $movie->id, $t->id) ?>'
            class="delete_tag"><?= $t->title ?></button>
<?php endforeach ?>

<script>
    document.querySelectorAll('.delete_tag').forEach((tag) => {
        tag.onclick = () => {
            fetch(tag.dataset.url, {
                method: 'POST',
            })
                .then(response => response.json())
                .then(response => {
                    window.location.reload();
                })
        }
    })
</script>
<?php $this->endSection() ?>
