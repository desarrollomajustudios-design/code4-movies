<label for="title">Movie Title</label>
<input type="text" name="title" placeholder="Title..." id="title" value="<?= old('title', $movie->title) ?>">

<label for="category_id">Category</label>
<select name="category_id" id="category_id">
    <option value=""></option>
    <?php foreach ($categories as $category) : ?>
        <option <?= $category->id !== old('category_id', $movie->category_id) ?: 'selected' ?>
                value="<?= $category->id ?>"><?= $category->title ?></option>
    <?php endforeach; ?>
</select>

<label for="description">Description</label>
<textarea name="description" id="description">
        <?= old('description', $movie->description) ?>
    </textarea>
<button type="submit"><?= $op ?></button>