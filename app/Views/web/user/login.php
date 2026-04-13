<?php $this->extend('layouts/web') ?>
<?php $this->section('header') ?>
Login
<?php $this->endSection() ?>
<?php $this->section('content') ?>
<?= view('partials/_form-error'); ?>
<form action="<?= route_to('user.login_user') ?>" method="post">
    <label for="email">Email or User</label>
    <input type="text" name="email" id="email" placeholder="Type your email or user">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
<?php $this->endSection(); ?>
