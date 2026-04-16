<?php $this->extend('layouts/blog') ?>
<?php $this->section('content') ?>
<h1>Movies</h1>
<hr>

<form class="mb-3 d-flex gap-2 align-items-end bg-dark p-3 rounded" method="get">
    <div class="flex-fill">
        <select class="form-control category_id" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option <?= $category->id !== $category_id ?: 'selected' ?>
                        value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="flex-fill">
        <select class="form-control" name="tag_id">
            <option value="">Tag</option>
            <?php foreach ($tags as $tag) : ?>
                <option <?= $tag->id !== $tag_id ?: 'selected' ?>
                        value="<?= $tag->id ?>"><?= $tag->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="flex-fill">
        <input value="<?= $find ?>" class="form-control" type="text" name="find" placeholder="Search here..">
    </div>
    <div>
        <input class="btn btn-success" type="submit" value="Search">
        <a href="<?= route_to('blog.movie.index') ?>" class="btn btn-secondary">Reset</a>
    </div>
</form>

<?= view('partials/_movies') ?>

<?= $pager->links() ?>

<script>
    document.querySelector('.category_id').addEventListener('change', (e) => {
        fetch('/blog/tags_by_category/' + document.querySelector('.category_id').value)
            .then(res => res.json())
            .then(data => {
                const tagSelect = document.querySelector('select[name="tag_id"]');
                tagSelect.innerHTML = '<option value="">Tag</option>';
                data.forEach(tag => {
                    const option = document.createElement('option');
                    option.value = tag.id;
                    option.textContent = tag.title;
                    tagSelect.appendChild(option);
                })
            })
    })

</script>
<?php $this->endSection() ?>

