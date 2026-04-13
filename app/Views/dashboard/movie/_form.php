<label for="title">Movie Title</label>
<input type="text" name="title" placeholder="Title..." id="title" value="<?= old('title', $movie['title']) ?>">
<label for="description">Description</label>
<textarea name="description" id="description">
        <?= old('description', $movie['description']) ?>
    </textarea>
<button type="submit"><?= $op ?></button>