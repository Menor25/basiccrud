<?php 
include('includes/functions.php');
include_once('layouts/header.php'); 

?>
<main class="form-signin">
  <?php
    if(isset($_POST['signIn'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      userLogin($email, $password);
    }
  ?>
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="signIn">Sign in</button>
    <span>Dont have an account? <a href="signup.php">Register</a></span>
  </form>
</main>
<?php include_once('layouts/footer.php'); ?>