<?php
if (session('validation')) : ?>
    <div class="container w-25 mb-4">
        <?php foreach (session('validation')->getErrors() as $error) : ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    </div>
    <br>
<?php endif; ?>
