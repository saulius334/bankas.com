<?php

App\App::view('top');
?>
<main class="container-home">
<h1 class="homeh1">Hello and welcome to</h1>
<img src="<?= URL ?>components/img/banklogo.png" alt="logo">
<div class="container-home home-links">
<a href="<?= URL ?>login">login</a>
<a href="<?= URL ?>register">Register</a>
</div>
</main>
<?php
App\App::view('bottom');