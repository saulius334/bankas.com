<?php
App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                Receive or Withdraw money for user: <?= $client['name'] ?>
            </div>
            <div class="card-body">
             <form action="<?= URL . 'add/money/' . $client['id'] ?>" method="POST">
                <div class="form-group">
                    Current Balance: <?= $client['money'] ?>
                </div>
                <div class="form-group">
                    <label>How much money to add ?</label>
                    <input type="number" class="form-control" name="money"/>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
             </form>
            </div>
        </div>
    </div>
  </div>
</div>

<?php
App\App::view('bottom');