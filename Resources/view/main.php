<?php

App\App::view('top');
?>
<main class="container-home">
<h1 class="homeh1">Hello, <?= $_SESSION['player']['name'] ?></h1>
<h1 class="homeh1">What would you like to do today ?</h1>
<div class="container-home home-links">
<a href="<?= URL ?>client/list">Client list</a>
<a href="<?= URL ?>client/create">New Client</a>
</div>

</main>
<?php
App\App::view('bottom');