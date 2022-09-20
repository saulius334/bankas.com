<?php
App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card mt-5">
            <div class="card-header">
                New User
            </div>
            <div class="card-body">
             <form action=" <?= URL ?>register" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lastname"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="super"/>
                    <label class="form-check-label" for="exampleCheck1" >SuperAdmin?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= URL ?>"><button type="button" class="btn btn-primary">Go back</button></a>
             </form>
            </div>
        </div>
    </div>
  </div>
</div>

<?php
App\App::view('bottom');