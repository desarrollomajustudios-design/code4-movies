<?php $this->extend('layouts/web') ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error'); ?>
<div class="container">
    <div class="card w-50 mx-auto">
        <div class="card-header text-center">
            <h1><?= $this->renderSection('header') ?>Login</h1>
        </div>
        <div class="card-body">
            <form action="<?= route_to('user.login_user') ?>" method="post">
                <label for="email">Email or User</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="Type your email or user">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                <button class="btn btn-success my-3 w-100" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
