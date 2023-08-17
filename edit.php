<?php

$server= "localhost";
$username= "root";
$password= "";
$database= "list";

$connection= new mysqli($server,$username,$password,$database);

$id="";
$name="";
$email="";
$phone="";
$gender="";

$errormessage= "";
$successmessage="";


if($_SERVER['REQUEST_METHOD']== 'GET') {

    if(!isset($_GET["id"])){
        
        header("location: /proj2/index.php");
        exit;
    }

    $id= $_GET["id"];

    $sql= "SELECT * FROM  names WHERE id=$id";
    $result= $connection->query($sql);
    $row= $result->fetch_assoc();

    if(!$row){
        header("location: /proj2/index.php");
        exit;
    }

    $name= $row["name"];
    $email=$row["email"];
    $phone=$row["phone"];
    $gender=$row["Gender"];


}
else{

    $id= $_POST["id"];
    $name= $_POST["name"];
    $email= $_POST["email"];
    $phone= $_POST["phone"];
    $gender= $_POST["Gender"];

    do {
        if ( empty($id) || empty($name) || empty($email) || empty($phone) || empty($gender)) {
            $errormessage= "all fields are required ";
            break;
        }

        $sql= "UPDATE names 
        SET name = '$name', email = '$email', phone= '$phone', Gender= '$gender' " .
        "WHERE id= $id";

        $result= $connection->query($sql);

        if(!$result){
            $errormessage="Invalid query";
            break;
          }

          $successmessage= "User Updated ";

          header("location: /proj2/index.php");
          exit;
  



} while(true);

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>people of wakanda</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Add a new User</h2>

<?php

if(!empty($errormessage)){

    echo"
    
    <div class= 'alert alert-warning alert-dismissible fade show' role = 'alert'>
    <strong>$errormessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>
  
    ";
}


?>



    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class= "row mb-3">
            <label class="col sm-3 col-form label">Name</label>
            <div class="col sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">

            </div>

        </div>

        <div class= "row mb-3">
            <label class="col sm-3 col-form label">Email</label>
            <div class="col sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email;  ?>">

            </div>

        </div>

        <div class= "row mb-3">
            <label class="col sm-3 col-form label">Phone</label>
            <div class="col sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;  ?>">

            </div>

        </div>

        <div class= "row mb-3">
            <label class="col sm-3 col-form label">Gender</label>
            <div class="col sm-6">
                <input type="text" class="form-control" name="Gender" value="<?php echo $gender ;?>">

            </div>

        </div>


        <?php

        if(!empty(@$successmessage)){
            echo"
            <div class='row mb-3'>
            <div class ='offset-sm-3 col-sm-6'>
            <div class= 'alert alert-success alert-dismissible fade show' role = 'alert'>
            <strong>$successmessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

           </div>
           </div>
           </div>
            ";
        }

        ?>

        <div class= "row mb-3">
            <div class="offset sm-3 col sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div class="col sm-3 d-grid">
               <a class="btn btn-outline-primary"href="/proj2/index.php" role="button">Cancel</a>

            </div>

        </div>

    </form>

</div>
    
</body>
</html>