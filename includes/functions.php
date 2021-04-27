<?php
    session_start();
    include_once('db.php');

//format arrays
function formatcode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
//Select statement for all courses 
function selectAll(){
    global $conn;
    $data = array();
    $stmt = $conn->prepare('SELECT * from courses');
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0)
    {
        echo ('No record found');
    }else {
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }
}

//Select single user statement
function selectSingleUser($id = NULL){
    global $conn;
    $stmt = $conn->prepare('SELECT * from tblusers WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0)
    {
        echo ('No record found');
    }else {
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
}

//Select single courses statement
function selectSingle($id = NULL){
    global $conn;
    $stmt = $conn->prepare('SELECT * from courses WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0)
    {
        echo ('No record found');
    }else {
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }
}

//insert statement
function insert($courseName = NULL, $courseTitle = NULL){
     global $conn;
     $stmt = $conn->prepare('INSERT INTO courses (courseName, courseTitle) VALUES (?, ?)');
     $stmt->bind_param('ss', $courseName, $courseTitle);
     $stmt->execute();
     $stmt->close();
     header('Location: index.php');
    }

// Register User statement
function signup($fname = NULL, $lname = NULL, $email = NULL, $password = NULL){
    global $conn;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO tblusers (fname, lname, email, password) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $fname, $lname, $email, $password);
    $stmt->execute();
    $stmt->close();

    header('Location: signin.php');
   }

//update statement
function update($courseName = NULL, $courseTitle = NULL, $id){
    global $conn;
    $stmt = $conn->prepare('UPDATE courses SET courseName = ?, courseTitle = ? WHERE id = ?');
    $stmt->bind_param('ssi', $courseName, $courseTitle, $id);
    $stmt->execute();

    if($stmt->affected_rows === 0) echo ('No course was updated');
    $stmt->close();
   }

//delate statement
function delete($id){
    global $conn;
    $stmt = $conn->prepare('DELETE FROM courses WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header('Location: index.php');
   }

//Login Statement
function userLogin($email  = NULL, $password = NULL){
    global $conn;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT * from tblusers WHERE email = ? AND password = ?');
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = mysqli_fetch_array($result);
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    if($row['email'] == $email && $row['password'] == $password){
        
        header('Location: index.php');
    }else {
        echo 'Invalid email or password';
    }
    $stmt->close();
}
