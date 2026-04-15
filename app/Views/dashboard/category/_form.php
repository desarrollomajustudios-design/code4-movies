<div class="mb-3">
    <label for="title">Category</label>
    <input class="form-control" type="text" name="title" placeholder="Title..." id="title"
           value="<?= old('title', $category->title) ?>">
    <button class="btn btn-primary my-2" type="submit"><?= $op ?></button>
</div>
