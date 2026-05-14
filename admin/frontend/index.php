

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
  <section class="vh-30 gradient-custom">
  <div class="container py-5 h-25">
    <div class="row d-flex justify-content-center align-items-center h-50">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="../backend/login.php" method="post">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <?php
              
              session_start();

              if(isset($_SESSION['req'])){
                echo '<div class="alert alert-'.$_SESSION['req']['type'].'">'.$_SESSION['req']['message'].'</div>';
             unset($_SESSION['req']);
              }
           
              
              ?>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" class="form-control form-control-lg"  name="pass"/>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <!-- <div data-mdb-input-init class="form-outline form-white mb-4">
                <input type="name" id="typeEmailX" class="form-control form-control-lg" name="user_name" />
                <label class="form-label" for="typeEmailX">user_name</label>
              </div> -->


              <p class="small  pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <input type="submit" name="login" value="Login" class="btn btn-danger w-100">
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
