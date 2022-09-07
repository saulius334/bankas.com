<?php
App\App::view('top', ['title' => $title]);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                New Client
            </div>
            <div class="card-body">
             <form action=" <?= URL ?>user/create" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" class="form-control" name="lastname"/>
                </div>
                <div class="form-group">
                    <label>Identification number</label>
                    <input type="text" class="form-control" name="IDnumber"/>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="member"/>
                    <label class="form-check-label" for="exampleCheck1" >VIP?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
            </div>
        </div>
        <p>Sukurus nauja klienta jam sukursime asmenine banko saskaita</p>
    </div>
  </div>
</div>

<?php
App\App::view('bottom');