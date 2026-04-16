<?php $this->extend('layouts/blog') ?>
<?php $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h1><?= $movie->title ?></h1>
        <a class="btn btn-warning"
           href="<?= route_to('blog.movie.index_for_category', $movie->category_id) ?>"><?= $movie->category ?></a>
        <hr>
        <p><?= $movie->description ?></p>
        <h3>Images</h3>
        <div class="d-flex flex-wrap">
            <?php foreach ($images as $i) : ?>
                <div class="card m-2" style="width: 18rem;">
                    <img src="/uploads/movies/<?= $i->image ?>" class="card-img-top" alt="">
                </div>
            <?php endforeach ?>
        </div>
        <h3>Tags</h3>
        <?php foreach ($tags as $t) : ?>
            <a class="btn btn-secondary"
               href="<?= route_to('blog.movie.index_for_tags', $t->id) ?>"><?= $t->title ?></a>
        <?php endforeach ?>

    </div>
</div>
<?php $this->endSection() ?>
