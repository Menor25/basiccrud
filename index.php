<?php 
include('includes/functions.php');

if(!isset($_SESSION['fname'])){
    header('Location: signin.php');
}

$allCourses = selectAll();


$Welcome = 'Welcome, '.$_SESSION['fname']. ' '.$_SESSION['lname'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Basic Authentication System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        header{
            padding: 20px 0;
        }
        header h3 {
            text-decoration: underline;
        }
      .text-right {
          text-align: right !important;
      }
      ul {
          display: flex !important;
          align-items: right !important;
          justify-content: center !important;
      }
      li {
          list-style: none;
          margin-left: 30px;
      }
    </style>

  </head>
<body>
<header>
      <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Zuri Training Hub</h3>
                </div>
                <div class="col-md-8 text-right">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="signout.php">Logout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
      </div>
</header>
<main>
    <div class="container">
        <h4 class="mt-3"><?php echo $Welcome; ?></h4>
        <a href="create.php" class="btn btn-success mt-5">Add Course</a>
        <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Course Name</th>
                    <th>Course Title</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php  
                    foreach ($allCourses as $courses){
                        echo '
                            <tr>
                                <td>'.$courses['id'].'</td>
                                <td>'.$courses['courseName'].'</td>
                                <td>'.$courses['courseTitle'].'</td>
                                <td class="text-right">
                                    <a href="update.php?id='.$courses['id'].'">Edit</a> |
                                    <a href="/delete.php?id='.$courses['id'].'" class="text-danger" onClick="return confirm(\'Are you sure you want to delete this course?\');">Delete</a>
                                </td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
  

</main>

<?php include_once('layouts/footer.php'); ?>