<?php 
include('includes/functions.php');

include_once('layouts/header.php'); 
?>
<main class="form-signin">
  <?php
      if(isset($_POST['signup'])) :
        signup($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);
      
      endif;
  ?>
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="text" name="fname" class="form-control" id="floatingInput" placeholder="menor" required>
      <label for="floatingInput">First Name</label>
    </div>

    <div class="form-floating">
      <input type="text" name="lname" class="form-control" id="floatingInput" placeholder="menor" required>
      <label for="floatingInput">Last Name</label>
    </div>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup">Sign up</button>
    <span>Already have an account? <a href="signin.php">Login</a></span>
  </form>
</main>
<?php include_once('layouts/footer.php'); ?>