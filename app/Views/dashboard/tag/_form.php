<label for="title">Tag Title</label>
<input type="text" name="title" placeholder="Title..." id="title" value="<?= old('title', $tag->title) ?>">

<label for="category_id">Category</label>
<select name="category_id" id="category_id">
    <option value=""></option>
    <?php foreach ($categories as $category) : ?>
        <option <?= $category->id !== old('category_id', $tag->category_id) ?: 'selected' ?>
                value="<?= $category->id ?>"><?= $category->title ?></option>
    <?php endforeach; ?>
</select>

<button type="submit"><?= $op ?></button>
