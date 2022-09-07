<?php

App\App::view('top');
?>
<main class="container-home">
<h1 class="homeh1">What would you like to do today ?</h1>
<div class="container-home home-links">
<a href="<?= URL ?>list">Client list</a>
<a href="<?= URL ?>user/create">New Client</a>
</div>

</main>
<?php
App\App::view('bottom');