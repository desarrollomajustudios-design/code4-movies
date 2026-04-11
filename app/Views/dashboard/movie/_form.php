<label for="title">Movie Title</label>
<input type="text" name="title" placeholder="Title..." id="title" value="<?= $movie['title'] ?>" required>
<label for="description">Description</label>
<textarea name="description" id="description">
        <?= $movie['description'] ?>
    </textarea>
<button type="submit"><?= $op ?></button>