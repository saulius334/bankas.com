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
                    <div class="name"><?= $_SESSION['player']['name'] ?></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>