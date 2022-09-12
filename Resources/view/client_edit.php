<?php

App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                Edit Client
            </div>
            <form action=" <?= URL ?>client/update/<?= $client['id'] ?>" method="POST">
            <div>
                <fieldset class="client-info">
                    <legend>Client Info</legend>
                    <div>Client Full Name: <?=$client['name'] ?> <?= $client['lastname'] ?></div>
                    <div>Client ID: <?=$client['identificationnumber'] ?></div>
                    <div>Client Email: <?= $client['email'] ? $client['email'] : "Not Available" ?></div>
                    <div>VIP status: <?=$client['VIP'] ? 'Yes' : 'No' ?></div>
                </fieldset>
            </div>
            <div class="card-body">
                <div class="form-group">
                        <?php if (isset($client['email'])) : ?>
                        <label>Edit Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $client['email'] ?>"/>
                        <?php else : ?>
                        <label>Add Email?</label>
                        <input type="email" class="form-control" name="email"/>
                        <?php endif ?>
                </div>
                <div class="form-group">
                    <label>Edit Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $client['name'] ?>"/>

                </div>
                <div class="form-group">
                    <label>Edit Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?= $client['lastname'] ?>"/>

                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="VIP" <?= $client['VIP'] ? 'checked' : '' ?>/>
                    <label class="form-check-label" for="exampleCheck1" >VIP?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
            </div>
        </div>
    </div>
  </div>
</div>


<?php
App\App::view('bottom');