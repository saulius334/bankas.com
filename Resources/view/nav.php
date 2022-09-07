<?php
if (App\Middleware\Auth::isLogged()) : ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>list">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL ?>user/create">New User</a>
                    </li>
                    <li class="nav-item">
                    <div class="user-nav">
                    <div class="name">Logged in as <?= $_SESSION['player']['name'] ?></div>
                    <form action="<?= URL ?>logout" method="POST">
                        <button type="submit" class="btn btn-outline-danger m-2">Logout</button>
                    </form>
                    </div>
                </li>
                    <?php else : ?>

                    <?php endif ?>
            </ul>
        </div>
    </div>
</div>