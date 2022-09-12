<?php

App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-9">
        <div class="card m-4">
            <div class="card-header">
                <h2>Client List</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <?php if ($client == []) : ?>
                        <div>
                            <p>There are no clients!</p>
                            <a href="<?= URL ?>client/create" type="button" class="btn btn-outline-success m-2">Create new client?</a>
                        </div>
                        <?php else : ?>
                    <?php foreach ($client as $clientInfo) : ?>
                    <li class="list-group-item">
                        <div class="line">
                            <div class="line__content">
                                <div class="line__content__email">
                                ID : <?= $clientInfo['identificationnumber'] ?>
                                </div>
                                <div class="line__content__name">
                                Name : <?= $clientInfo['name'] ?>
                                </div>
                                <div class="line__content__name">
                                Last name : <?= $clientInfo['lastname'] ?>
                                </div>
                                <div class="line__content__name">
                                Current Balance : <?= $clientInfo['money'] ?>
                                </div>
                                <div class="line__content__name">
                                IBAN : <?= $clientInfo['IBAN'] ?>
                                </div>
                                <?php if($clientInfo['VIP']) : ?>
                                <div class="line__content__member">VIP</div>
                                <?php endif ?>
                            </div>
                            <div class="line__buttons">
                                <a href="<?= URL . 'client/edit/' . $clientInfo['id']?>" type="button" class="btn btn-outline-success m-2">Edit</a>
                                <a href="<?= URL . 'edit/money/' . $clientInfo['id']?>" type="button" class="btn btn-outline-success m-2">Add money</a>
                                <form action="<?= URL ?>client/delete/<?= $clientInfo['id'] ?>" method="POST">
                                <button type="submit" class="btn btn-outline-danger m-2">Delete</button>
                                </form>
                            </div>
                        </div>
                        
                    </li>
                    <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
  </div>
</div>


<?php
App\App::view('bottom');