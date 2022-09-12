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
             <form action=" <?= URL ?>client/store" method="POST">
                <div class="form-group">
                    Current Balance: <?= $client['money'] ?>
                </div>
                <div class="form-group">
                    <label>Input</label>
                    <input type="number" class="form-control" name="money"/>
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