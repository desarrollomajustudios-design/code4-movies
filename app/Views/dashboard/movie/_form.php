<label for="title">Movie Title</label>
<input class="form-control" type="text" name="title" placeholder="Title..." id="title"
       value="<?= old('title', $movie->title) ?>">

<label for="category_id">Category</label>
<select class="form-control" name="category_id" id="category_id">
    <option value=""></option>
    <?php foreach ($categories as $category) : ?>
        <option <?= $category->id !== old('category_id', $movie->category_id) ?: 'selected' ?>
                value="<?= $category->id ?>"><?= $category->title ?></option>
    <?php endforeach; ?>
</select>

<label for="description">Description</label>
<textarea class="form-control" name="description" id="description">
        <?= old('description', $movie->description) ?>
    </textarea>
<?php
if ($movie->id) : ?>
    <label for="image">Image</label>
    <input class="form-control" type="file" name="image" id="image">
<?php endif; ?>

<button class="btn btn-primary my-2" type="submit"><?= $op ?></button>