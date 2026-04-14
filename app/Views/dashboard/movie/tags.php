<?php $this->extend('layouts/dashboard') ?>

<?php $this->section('content') ?>
<form method="post" action="">
    <label for="category_id">Categories</label>
    <select name="category_id" id="category_id">
        <option value=""></option>
        <?php foreach ($categories as $category) : ?>
            <option <?= $category->id != $category_id ?: 'selected' ?>
                    value="<?= $category->id ?>"><?= $category->title ?></option>
        <?php endforeach; ?>
    </select>

    <label for="tag_id">Tags</label>
    <select name="tag_id" id="tag_id">
        <option value=""></option>
        <?php foreach ($tags as $tag) : ?>
            <option value="<?= $tag->id ?>"><?= $tag->title ?></option>
        <?php endforeach; ?>
    </select>
    <button id="send_button" type="submit">Save</button>
</form>

<script type="text/javascript">

    function disableButton() {
        document.querySelector('#send_button').disabled = document.querySelector('#tag_id').value === '';
    }

    document.querySelector('[name=category_id]').onchange = function (e) {
        window.location.href = '<?= route_to('movie.tags', $movie->id) ?>?category_id=' + this.value;
    }
    document.querySelector('[name=tag_id]').onchange = function (e) {
        disableButton();
    }


    disableButton()
</script>
<?php $this->endSection() ?>
