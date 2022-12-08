 <div class="container">


     <div class="row">
         <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

             <div class="card border-0 shadow rounded-3 my-5">
                 <div class="card-body p-4 p-sm-5">

                     <h5 class="card-title text-center mb-5 fw-light fs-5">Login </h5>
                     <?php if (isset($model['error'])) { ?>
                         <div class="row">
                             <div class="alert alert-danger" role="alert">
                                 <?= $model['error'] ?>
                             </div>
                         </div>
                     <?php } ?>
                     <form method="post" action="/auth/login">
                         <div class="form-floating mb-3">
                             <input type="ext" class="form-control" name="username" id="floatingInput" placeholder="username" value="<?= $_POST['username'] ?? '' ?>">
                             <label for="floatingInput">username </label>
                         </div>
                         <div class="form-floating mb-3">
                             <input name="password" type="password" class="form-control" id="password" placeholder="password">
                             <label for="floatingPassword">Password</label>
                         </div>


                         <div class="d-grid">
                             <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                 in</button>
                         </div>
                         <hr class="my-4">

                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>