<?php

App\App::view('top');
?>

<h1 class="homeh1">Hello and welcome to Bankas</h1>
<a href="<?= URL ?>login">login</a>
<a href="<?= URL ?>register">Register</a>

<?php
App\App::view('bottom');