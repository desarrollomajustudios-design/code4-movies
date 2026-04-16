<?php foreach ($movies as $movie) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><?= $movie->title ?></h5>
            <a class="btn btn-link"
               href="<?= route_to('blog.movie.index_for_category', $movie->category_id) ?>"><?= $movie->category ?></a>
            <p class="card-text"><?= $movie->description ?></p>
            <img class="w-25" src="/uploads/movies/<?= $movie->image ?>" alt="">
            <p class="card-text"><small class="text-muted">Category: <?= $movie->category ?></small></p>
            <p class="card-text"><small class="text-muted">Tags: <?= $movie->tags ?></small></p>
            <a class="btn btn-primary" href="<?= route_to('blog.movie.show', $movie->id) ?>">See Details</a>
        </div>
    </div>
<?php endforeach; ?>