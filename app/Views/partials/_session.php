<?php
if (session('message')) : ?>
    <div>
        <?= session('message') ?>
    </div>
    <br>
<?php endif; ?>
