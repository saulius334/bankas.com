<?php
App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Log in</h2>
            </div>
            <div class="card-body">
             <form action=" <?= URL ?>login" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password"/>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
                <a href="<?= URL ?>"><button type="button" class="btn btn-primary">Go back</button></a>
             </form>
            </div>
        </div>
    </div>
  </div>
</div>
<?php
App\App::view('bottom');
