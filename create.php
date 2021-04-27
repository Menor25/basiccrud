<?php 
include('includes/functions.php');
if(!isset($_SESSION['fname'])){
  header('Location: signin.php');
}

include_once('layouts/header.php');
  

?>
<main class="form-signin">
<?php
    if(isset($_POST['addCourse'])) :
        insert($_POST['courseName'], $_POST['courseTitle']);
    
    endif;
?>
  <form action="" method="POST"> 
    <h1 class="h3 mb-3 fw-normal">Create Course</h1>

    <div class="form-floating">
      <input type="text" name="courseName" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Course Name</label>
    </div>
    <div class="form-floating">
      <input type="text" name="courseTitle" class="form-control" id="floatingInput" placeholder="Password">
      <label for="floatingInput">Course Title</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="addCourse">Add Course</button>
  </form>
</main>
<?php include_once('layouts/footer.php'); ?>