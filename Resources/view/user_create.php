<?php
App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                Register New User
            </div>
            <div class="card-body">
             <form action=" <?= URL ?>register" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"/>
                    <small class="form-text text-muted">User email</small>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"/>
                    <small class="form-text text-muted">User name</small>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="member"/>
                    <label class="form-check-label" for="exampleCheck1" >Member?</label>
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