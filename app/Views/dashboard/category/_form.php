<label for="title">Category</label>
<input type="text" name="title" placeholder="Title..." id="title" value="<?= old('title', $category['title']) ?>">
<button type="submit"><?= $op ?></button>