<?php 
include('includes/functions.php');

if(!isset($_SESSION['fname'])){
  header('Location: signin.php');
}

include_once('layouts/header.php');
    

?>
<main class="form-signin">
<?php
    if(isset($_POST['updateCourse'])) :
        update($_POST['courseName'], $_POST['courseTitle'], $_POST['id']);
    
    endif;

    $user =  (isset($_GET['id'])) ? selectSingle($_GET['id']) : false;

    if($user != false){
?>
  <form action="" method="POST"> 
    <h1 class="h3 mb-3 fw-normal">Update Course</h1>

    <div class="form-floating">
      <input type="hidden" name="id"value="<?php echo $user['id']; ?>">
    </div>
    <div class="form-floating">
      <input type="text" name="courseName" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $user['courseName']; ?>">
      <label for="floatingInput">Course Name</label>
      
    </div><div class="form-floating">
      <input type="text" name="courseTitle" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $user['courseTitle']; ?>">
      <label for="floatingInput">Course Name</label>
    </div>
    

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="updateCourse">Update Course</button>
  </form>

  <?php }else{
      echo "Invalid user, please login or register";
  }
  ?>
</main>
<?php include_once('layouts/footer.php'); ?>